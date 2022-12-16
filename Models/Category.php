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

    public function getAllPostsFromCategory(int $cat_id): bool|array
    {
        $params = [
            "id" => $cat_id
        ];
        Database::connect();
        Database::prepReq("SELECT post.*, category.nom as cat_name FROM post INNER JOIN category ON post.category_id = category.id WHERE category_id = :id", $params);
        return Database::fetchData();
    }

    public function getAllCategories()
    {
        Database::connect();
        Database::prepReq("SELECT nom,id FROM category");
        return Database::fetchData();
    }

    public function deleteCategory(int $cat_id): int
    {
        $params = [
            "id" => $cat_id
        ];
        Database::connect();
        $result = Database::prepReq("SELECT post.*FROM post INNER JOIN category ON post.category_id = category.id WHERE category_id = :id", $params);
        $result = $result->rowCount();
        $data = 0;
        
        if($result === 0){
            $data = Database::prepReq("DELETE FROM category WHERE id = :id", $params);
            return $data->rowCount();
        }else{
            return $data;
        }
        

        
    }
}
