<?php

namespace app\controllers;
use app\models\Post;

class PostController {
    public function getPosts() {
        $params = [
            'title' => $_POST['title'] ?? null,
            'content' => $_POST['content'] ?? null
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        // Retrieve POST data
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $errors = [];

        // Validate title
        if (strlen($title) < 3) {
            $errors['title'] = 'Title must be at least 3 characters long.';
        }

        // Validate content
        if (strlen($content) < 10) {
            $errors['content'] = 'Content must be at least 10 characters long.';
        }

        // If there are validation errors, respond with a 400 error and the error messages
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        $postModel = new Post();
        $newPost = $postModel->savePost($title, $content);
        echo json_encode($newPost);
        exit();
    }
}
