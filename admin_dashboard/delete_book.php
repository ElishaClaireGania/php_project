<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $delete_query = "DELETE FROM books WHERE Book_ID = $book_id";

    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('Book deleted successfully!'); window.location='manage_books.php';</script>";
    } else {
        echo "<script>alert('Error deleting book.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location='manage_books.php';</script>";
}
