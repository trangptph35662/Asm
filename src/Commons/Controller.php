<?php 

namespace Admin\Asm\Commons ;
use eftec\bladeone\BladeOne ;

class Controller {
    public function renderViewClient($view, $data=[]){

        $templatePath = __DIR__ . '/../Views/Client' ;
        $blade = new BladeOne($templatePath);// MODE_DEBUG allows to pinpoint troubles.
        echo $blade->run($view, $data); // it calls /views/hello.blade.php
    }
    public function renderViewAdmin($view, $data=[]){

        $templatePath = __DIR__ . '/../Views/Admin' ;
        $blade = new BladeOne($templatePath);// MODE_DEBUG allows to pinpoint troubles.
        echo $blade->run($view, $data); // it calls /views/hello.blade.php
    }
}