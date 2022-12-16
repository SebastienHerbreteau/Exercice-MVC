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
        Database::prepReq("SELECT post.*, category.nom as cat_name  FROM post INNER JOIN category ON category.id = post.category_id");
        return Database::fetchData();
    }

    public function deletePost(int $id): int
    {
        $params = [
            "id" => $id
        ];
        Database::connect();
        $data = Database::prepReq("DELETE FROM post WHERE post.id = :id", $params);
        return $data->rowCount();
       
    }
}
