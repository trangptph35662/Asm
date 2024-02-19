<?php
namespace Admin\Asm\Controllers\Client ;
use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Categories;

class ClientCategoryController extends Controller{

    private Categories $categories ;

    public function  __construct() {
        $this->categories = new Categories ;
    }

    public function show($id){
        $categories = $this->categories->getPostsByCategory($id);
        
        return $this->renderViewClient('post-category',
        ['categories' => $categories,
        
        ]
    );
    }

    
}