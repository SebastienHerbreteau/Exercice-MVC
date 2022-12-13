<?php

namespace App;

require "vendor/autoload.php";


    use App\Controllers\CategoryController;
    use App\Controllers\HomeController;
    use App\Controllers\PostController;
    use App\Models\Database;
    use Dotenv\Dotenv;
  
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    Database::$host = $_ENV['DBHOST'];
    Database::$user = $_ENV['DBUSER'];
    Database::$pass = $_ENV['DBPASSWORD'];
    Database::$dbName = $_ENV['DBNAME'];
    Database::connect();


    // Router
    if (isset($_GET["post_id"])) {
        $controller = new PostController();
        if (empty($_GET["post_id"])) {
            echo $controller->ErrorPage();
        } else {
            echo $controller->showPost($_GET["post_id"]);
        }
    } elseif (isset($_GET["action"]) && $_GET["action"] === "posts") {
        $postController = new PostController();
        echo $postController->showAllPosts();

    } elseif (isset($_GET["action"]) && $_GET["action"] === "all_categories") {
        $categories = new CategoryController();
        echo $categories->showAllCategories();
        
    } elseif (isset($_GET["cat_id"])) {
        $controller = new CategoryController();

        if (empty($_GET["cat_id"])) {
            echo $controller->ErrorPage();
        } else {
            echo $controller->showAllPostsFromCategory($_GET["cat_id"]);
        }
    } else {
        $controller = new HomeController();
        echo $controller->showHome();
    }
    ?>

</body>

</html>