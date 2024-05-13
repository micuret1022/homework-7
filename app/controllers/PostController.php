<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{

    private $postModel;
    public function __construct(Post $postModel) {
        $this->postModel = $postModel;
    }
    public function getPost() {
            $postModel = new Post();

            $template = $this->twig->load('posts/showPosts.twig');
            $postData = [
                'posts' => $postModel->getAllPosts(),
            ];
            echo $template -> render([$postData]);
    }

//    HOMEWORK 8

    public function createPost($postData) {
        $errors = [];

        // Validate post data
        if (empty($postData['postName'])) {
            $errors[] = "Post name is required.";
        }
        if (empty($postData['postDescription'])) {
            $errors[] = "Post description is required.";
        }

        // If there are errors, send back an error response
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(["errors" => $errors]);
            return;
        }

        // If successful, return a success message
        $successMessage = "Post created successfully!";
        $template = $this->twig->load('posts/showPosts.twig');
        $postData = [
            'posts' => $this->postModel->getAllPosts(),
            'successMessage' => $successMessage
        ];
        echo $template->render($postData);
    }




}