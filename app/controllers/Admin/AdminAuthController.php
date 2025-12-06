<?php
class AdminAuthController extends Controller {
    public function dashboard() {
        if (!Auth::isAdmin()) {
            $this->redirect('/admin/login');
            return;
        }
        $this->redirect('/admin/dashboard');
    }
    
    public function loginForm() {
        if (Auth::isAdmin()) {
            $this->redirect('/admin/dashboard');
            return;
        }
        $this->adminView('login');
    }
    
    public function login() {
        if (!$this->isPost()) {
            $this->redirect('/admin/login');
            return;
        }
        
        CSRF::check();
        
        $email = $this->sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $userModel = new User();
        $user = $userModel->findByEmail($email);
        
        if ($user && Auth::verifyPassword($password, $user['password']) && in_array($user['role'], ['super_admin', 'admin', 'product_manager', 'content_manager', 'order_manager'])) {
            Auth::login($user);
            Session::flash('success', 'Welcome, ' . $user['name'] . '!');
            $this->redirect('/admin/dashboard');
        } else {
            Session::flash('error', 'Invalid credentials or insufficient permissions');
            $this->redirect('/admin/login');
        }
    }
    
    public function logout() {
        Auth::logout();
        $this->redirect('/admin/login');
    }
}
