<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
        $allPosts = [
            [
                'id' => '1',
                'title' => 'Introduce yourself',
                'content' => 'Hi, Im fordham student'
            ],
            [
                'id' => '2',
                'title' => 'What year?',
                'content' => 'Senior'
            ],
        ];

        if (!empty($params['title'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                return stripos($post['title'], $params['title']) !== false; // Case-insensitive match
            });
        }

        return $allPosts;
    }

    public function savePost($title, $content) {
        return [
            'id' => uniqid(),
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content)
        ];
    }
}
