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
        Database::prepReq("SELECT *, category.nom AS cat_name  FROM post INNER JOIN category ON category.id = post.category_id  WHERE post.id = :id", $params);
        return Database::fetchData();
    }

    public function getAllPost()
    {
        Database::connect();
        Database::prepReq("SELECT *  FROM post INNER JOIN category ON category.id = post.category_id");
        return Database::fetchData();
    }
}
