<?php

namespace App\Models;

use App\Models\Database;

class Category
{
    public function getCategory(int $id): bool|array
    {
        $params = [
            "id" => $id
        ];
        Database::connect();
        Database::prepReq("SELECT nom FROM category WHERE id = :id", $params);
        return Database::fetchData();
    }

    public function getPostCategory(int $post_id): bool|array
    {
        $params = [
            "id" => $post_id
        ];
        Database::connect();
        Database::prepReq("SELECT nom FROM category INNER JOIN post ON category.id = post.category_id  WHERE post.id = :id", $params);
        return Database::fetchData();
    }

    public function getAllPostFromCategory(int $cat_id): bool|array
    {
        $params = [
            "id" => $cat_id
        ];
        Database::connect();
        Database::prepReq("SELECT * FROM post INNER JOIN category ON post.category_id = category.id WHERE category_id = :id", $params);
        return Database::fetchData();
    }

    public function getAllCategory()
    {
        Database::connect();
        Database::prepReq("SELECT nom FROM category");
        return Database::fetchData();
    }
}
