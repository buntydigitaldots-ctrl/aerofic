<?php
class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }
    
    public static function has($key) {
        return isset($_SESSION[$key]);
    }
    
    public static function remove($key) {
        unset($_SESSION[$key]);
    }
    
    public static function destroy() {
        session_destroy();
        $_SESSION = [];
    }
    
    public static function flash($key, $value = null) {
        if ($value !== null) {
            $_SESSION['flash'][$key] = $value;
        } else {
            $val = $_SESSION['flash'][$key] ?? null;
            unset($_SESSION['flash'][$key]);
            return $val;
        }
    }
    
    public static function hasFlash($key) {
        return isset($_SESSION['flash'][$key]);
    }
}
