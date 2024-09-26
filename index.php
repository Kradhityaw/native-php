<?php
include 'books.php';

if (isset($_GET['search'])) {
    $data = searchBook($_GET['search']);
} else {
    $data = loadBooks();
}

// empty($_GET['search']) ? $data = loadBooks() : $data = $key;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="" method="get">
        <label for="search">Search</label>
        <input type="text" name="search" id="search">
        <button type="submit">Cari</button>
    </form>
    <a href="insert-book.php"><button>Insert</button></a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $idx => $item) : ?>
                <tr>
                    <th><?= $idx + 1 ?></th>
                    <td><?= $item['title'] ?></td>
                    <td><?= $item['author'] ?></td>
                    <td><?= $item['publisher'] ?></td>
                    <td>
                        <a href="detail-book.php?id=<?= $item['id'] ?>"><button>Detail</button></a>
                        <a href="edit-book.php?id=<?= $item['id'] ?>"><button>Edit</button></a>
                        <a onclick="return confirm('Apakah kamu yakin?')" href="delete-book.php?id=<?= $item['id'] ?>"><button>Delete</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>