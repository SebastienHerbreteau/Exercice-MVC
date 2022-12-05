<?php

namespace App\Views;

$post = $data["post"];
$cat = $data["category"][0];

?>

<article>
    <h1><?= $post["title"] ?></h1>
    <time><?= $post["created_at"] ?></time>
    <p><?= $cat["nom"] ?></p>
    <p><?= $post["content"] ?></p>
</article>