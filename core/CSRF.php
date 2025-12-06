<?php
class CSRF {
    public static function generate() {
        if (!Session::has('csrf_token')) {
            Session::set('csrf_token', bin2hex(random_bytes(32)));
        }
        return Session::get('csrf_token');
    }
    
    public static function field() {
        return '<input type="hidden" name="csrf_token" value="' . self::generate() . '">';
    }
    
    public static function verify($token = null) {
        $token = $token ?? ($_POST['csrf_token'] ?? '');
        return hash_equals(Session::get('csrf_token', ''), $token);
    }
    
    public static function check() {
        if (!self::verify()) {
            http_response_code(403);
            die('Invalid CSRF token');
        }
    }
}
