<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Models\Post;

class PostController extends Controller
{

    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function show($id)
    {
        $post = $this->post->getByID($id);

        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
            ]
        );
    }
}
