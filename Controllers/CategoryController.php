<?php

namespace App\Controllers;


use App\Models\Category;

class CategoryController extends Controller
{
    public function showAllPostsFromCategory($cat_id)
    {
        $posts = new Category();
        $posts = $posts->getAllPostsFromCategory($cat_id);
        if (empty($posts)) {
            return $this->errorPage();
        }else{
        return $this->render("posts.twig", compact("posts"));}
    }
    public function showAllCategories()
    {
        $categories = new Category();
        $categories = $categories->getAllCategories();
        if (empty($categories)) {
            return $this->errorPage();
        }else{
        return $this->render("categories.twig", compact("categories"));
    }
}
}