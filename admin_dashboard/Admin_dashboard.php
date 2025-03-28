<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Welcome, Admin!</h2>
    <ul>
        <li><a href="add_book.php">Add Book</a></li>
        <li><a href="edit_book.php">Update Books</a></li>
        <li><a href="delete_book.php">Delete Books</a></li>
        <li><a href="manage_books.php">Manage Books</a></li>
        <li><a href="add_admin.php">Add Admin</a></li>
        <li><a href="delete_person.php">Delete Users/Admins</a></li>
        <li><a href="view_users.php">View Users/Admins</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</body>

</html>