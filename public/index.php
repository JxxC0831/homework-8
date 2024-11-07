<?php
require "../app/models/Post.php";
require "../app/controllers/PostController.php";
require "../app/models/User.php";
require "../app/controllers/UserController.php";

use app\controllers\PostController;
use app\controllers\UserController;

// Get URI without query string
$url = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $url);

// Routes for Users
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new UserController())->getUsers();
}
if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new UserController())->saveUser();
}
if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/users.html';
}

// Routes for Posts
if ($uriArray[1] === 'index.php/api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new PostController())->getPosts();
}
if ($uriArray[1] === 'index.php/api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new PostController())->savePost();
}
if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/search-post.html';
}
if ($uriArray[1] === 'add-post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-post.html';
}
