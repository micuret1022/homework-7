<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;


$url = $_SERVER["REQUEST_URI"];

//test comment 


$path = parse_url($url, PHP_URL_PATH);

$mainController = new MainController();
$postController = new PostController();
$userController = new UserController();

switch ($path) {
  case "/":
    $mainController -> homepage();
    break;
  case "/posts":
    $postController -> getPost();
    echo json_encode($posts);
    break;
  default:
    $mainController -> notFound();
    break;
}


?>