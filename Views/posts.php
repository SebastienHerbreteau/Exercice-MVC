<?php

namespace App\Views;

$posts = $data["posts"];

foreach ($posts as $post) {

?>

    <article>

        <img src="https://picsum.photos/400/300">
        <h1><?= $post["title"] ?></h1>
        <p>Ecrit par <?= $post["author"] ?></p>
        <time>Ajouté le <?= $post["created_at"] ?></time>
        <p><?= substr($post["content"], 0, 200) ?></p>
    </article>

<?php
}

?>