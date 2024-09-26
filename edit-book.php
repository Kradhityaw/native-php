<?php
include 'books.php';

$data = detaiBook($_GET['id']);

if (isset($_POST['submit'])) {
    editBook([
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'publisher' => $_POST['publisher']
    ], $_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?= $data['title'] ?>">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" value="<?= $data['author'] ?>">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" value="<?= $data['publisher'] ?>">
        <input type="submit" value="Insert" name="submit">
    </form>
</body>
</html>