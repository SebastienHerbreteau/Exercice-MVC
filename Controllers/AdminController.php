<?php

namespace App\Controllers;


use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function showAdmin($data=2)
    {
        $posts = new Post();
        $posts = $posts->getAllPost();
        $message["status"] = "none";
        if ($data === 1){
            $message["status"] = "succes";
            $message["content"] = "La suppression a été exécutée avec succès";
        }

        if ($data === 0){
            $message["status"] = "fail";
            $message["content"] = "La suppression n'a pas été exécutée";
        }

        return $this->render("showArticles.twig", compact("posts", "message"));
  
    }

    public function showCategories($data=2)
    {
        $categories = new Category();
        $categories = $categories->getAllCategories();
        $message["status"] = "none";
        if ($data === 1){
            $message["status"] = "succes";
            $message["content"] = "La suppression a été exécutée avec succès";
        }

        if ($data === 0){
            $message["status"] = "fail";
            $message["content"] = "La suppression n'a pas été exécutée, la catégorie contient des articles.";
        }

        return $this->render("showCategories.twig", compact("categories", "message"));
    }
    
    // public function showUsers()
    // {
    //     $categories = new Category();
    //     $categories = $categories->getAllCategories();
    //     return $this->render("showCategories.twig", compact("categories"));
    // }

    public function deletePost($post_id)
    {
        $post = new Post();
        $post = $post->deletePost($post_id);
        return $post;
    }

    public function deleteCategory($cat_id)
    {
        $cat = new Category();
        $cat = $cat->deleteCategory($cat_id);
        return $cat;
    }

    
    
}
