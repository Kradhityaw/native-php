<?php
include 'books.php';

if (isset($_POST['submit'])) {
    insertBook([
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'publisher' => $_POST['publisher']
    ]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="author">Author</label>
        <input type="text" name="author" id="author">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher">
        <input type="submit" value="Insert" name="submit">
    </form>
</body>
</html>