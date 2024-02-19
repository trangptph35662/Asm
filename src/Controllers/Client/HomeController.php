<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;

use Admin\Asm\Models\Post;

class HomeController extends Controller
{

    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $postFirstLatest = $this->post->getFirstLatest();
        $postTop6 = $this->post->getTop6();
        $postTop6Chunk = array_chunk($postTop6, 3);
        $lastes = $this->post->getLastes() ;
        
        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTop6Chunk' => $postTop6Chunk,
                'lastes' => $lastes 
            ]

        );
    }
}
