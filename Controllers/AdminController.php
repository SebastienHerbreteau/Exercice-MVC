<?php

namespace App\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function showAdminPosts($data=2)
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

        return $this->render("showAdminPosts.twig", compact("posts", "message"));
  
    }

    public function showAdminCategories($data=2)
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

        return $this->render("showAdminCategories.twig", compact("categories", "message"));
    }

    public function showAdminUsers($data=2)
    {
        $users = new User();
        $users = $users->getAllUsers();
        $message["status"] = "none";
        if ($data === 1){
            $message["status"] = "succes";
            $message["content"] = "La suppression a été exécutée avec succès";
        }

        if ($data === 0){
            $message["status"] = "fail";
            $message["content"] = "La suppression n'a pas été exécutée, la catégorie contient des articles.";
        }

        return $this->render("showAdminUsers.twig", compact("users", "message"));
    }
    
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

    public function deleteUser($user_id)
    {
        $user = new User();
        $user = $cat->deleteUser($user_id);
        return $user;
    }

    
    
}
