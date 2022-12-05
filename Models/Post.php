<?php

namespace App\Models;

use App\Models\Database;

class Post
{
    public function getPost(int $id): bool|array
    {
        $params = [
            "id" => $id
        ];
        Database::connect();
        Database::prepReq("SELECT * FROM post WHERE id = :id", $params);
        return Database::fetchData();
    }

    public function getAllPost()
    {
        Database::connect();
        Database::prepReq("SELECT * FROM post");
        $posts = Database::fetchData();
        foreach ($posts as $post) {

            $cat = new Category($post[category_id]);
        }
        return $posts;
    }
}
