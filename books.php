<?php
include 'connection.php';

// Notes :
// global digunakan untuk mengakses variabel/item di luar sebuah fungsi
// msqli_fetch_assoc digunakan untuk mendapatkan array assosiatif sesuai baris yang diambil
// msqli_affected_rows digunakan untuk mengetahui row/baris yang berubah karena insert, delete, update

function loadBooks()
{
    global $conn;
    $query = mysqli_query($conn, 'SELECT * FROM `books`');

    $data = [];

    foreach ($query as $item) 
    {
        $data[] = $item;
    }

    return $data;
}

function insertBook($item) 
{
    global $conn;

    $title = htmlspecialchars($item['title']);
    $author = htmlspecialchars($item['author']);
    $publisher = htmlspecialchars($item['publisher']);

    if (empty($title) || empty($author) || empty($publisher)) 
    {
        return header('Location:index.php');
    }

    mysqli_query($conn, "INSERT INTO `books` (`title`, `author`, `publisher`) 
    VALUES ('$title', '$author', '$publisher')");

    if (mysqli_affected_rows($conn) > 0)
    {
        header('Location:index.php');
    } else
    {
        echo mysqli_error($conn);
    }
}

function detaiBook($id)
{
    global $conn;

    $data = mysqli_query($conn, "SELECT * FROM `books` WHERE id = $id");
    $item = mysqli_fetch_assoc($data);

    return $item;
}

function editBook($item,$id) 
{
    global $conn;

    $title = htmlspecialchars($item['title']);
    $author = htmlspecialchars($item['author']);
    $publisher = htmlspecialchars($item['publisher']);

    if (empty($title) || empty($author) || empty($publisher)) 
    {
        return header('Location:index.php');
    }

    mysqli_query($conn, "UPDATE `books` SET title = '$title',
    author = '$author',
    publisher = '$publisher' 
    WHERE id = $id");

    if (mysqli_affected_rows($conn) > 0)
    {
        header('Location:index.php');
    } else
    {
        echo mysqli_error($conn);
    }
}

function deleteBook($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM `books` WHERE id = $id");

    if (mysqli_affected_rows($conn) > 0)
    {
        header('Location:index.php');
    } else
    {
        echo mysqli_error($conn);
    }
}

function searchBook($keyword) 
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM `books` WHERE `title` LIKE '".'%'.$keyword.'%'."'");

    $data = [];

    foreach ($query as $item) 
    {
        $data[] = $item;
    }

    return $data;
}