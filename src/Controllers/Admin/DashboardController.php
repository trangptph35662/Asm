<?php 

namespace Admin\Asm\Controllers\Admin ;
use Admin\Asm\Commons\Controller;

class DashboardController extends Controller 
{
    public function index() {
        return $this->renderViewAdmin('dashboard');
    }
}