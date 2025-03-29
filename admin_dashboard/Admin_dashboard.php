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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/admindash.css">
    <title>Admin Dashboard</title>

</head>

<body>
    <div class="container">
        <h2>Welcome, Admin!</h2>
        <ul class="nav-list">
            <li><a href="add_book.php">Add Book</a></li>
            <li><a href="manage_books.php">Manage Books</a></li>
            <li><a href="add_admin.php">Add Admin</a></li>
            <li><a href="view_records.php">View Users/Admins</a></li>
        </ul>
        <div class="logout">
            <a href="../logout.php">Logout</a>
        </div>
    </div>
</body>

</html>