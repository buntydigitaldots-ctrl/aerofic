<?php
class DashboardController extends Controller {
    public function index() {
        Auth::requireAdmin();
        
        $orderModel = new Order();
        $productModel = new Product();
        $userModel = new User();
        $queryModel = new ContactQuery();
        
        $stats = [
            'products' => $productModel->count(),
            'orders' => $orderModel->count(),
            'users' => $userModel->count("role = 'customer'"),
            'enquiries' => $queryModel->count()
        ];
        
        $recentOrders = $orderModel->recent(5);
        $recentEnquiries = $queryModel->recent(5);
        
        $this->adminView('dashboard/index', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
            'recentEnquiries' => $recentEnquiries
        ]);
    }
}
