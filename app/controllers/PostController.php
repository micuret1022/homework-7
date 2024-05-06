<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{
    
public function getPost() {
        $postModel = new Post();

        $template = $this->twig->load('posts/showPosts.twig');
        $postData = [
            'posts' => $postModel->getAllPosts(),
        ];
        echo $template -> render([$postData]);
    }

}