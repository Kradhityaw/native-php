<?php
include 'books.php';
$item = detaiBook($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    <ul>
        <li>Title : <?= $item['title'] ?></li>
        <li>Author : <?= $item['author'] ?></li>
        <li>Publisher : <?= $item['publisher'] ?></li>
    </ul>
</body>
</html>