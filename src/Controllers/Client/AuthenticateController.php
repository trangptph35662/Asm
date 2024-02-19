<?php

namespace Admin\Asm\Controllers\Client ;
use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\User;

class AuthenticateController extends Controller{

    public function login(){
        if(!empty($_POST)){
            $_SESSION['error'] = [];

            $email = $_POST['email'];
            $password = $_POST['password'];

            if(empty($password)){

                $_SESSION['error']['password'] = 'Password không được trống' ;
            }
            if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error']['email'] = 'Email không hợp lệ';
            }

            $user = (new User) ->getByEmailAndPassword($_POST['email'], $_POST['password']) ;

            if(empty($user)){
                $_SESSION['error']['not-found'] = 'KHông tìm thấy tài khoản';

            }else{
                $_SESSION['user'] = $user ;

                header("Location: /");
                exit();
            }

        }

        return $this->renderViewClient(__FUNCTION__);
    }


    public function logout(){
        session_destroy();

        header("Location: / ");
        exit() ;
    }
}