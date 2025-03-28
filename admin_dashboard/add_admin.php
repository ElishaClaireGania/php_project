<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO admin (Name, Email, Password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Admin added successfully!'); window.location='view_records.php';</script>";
    } else {
        echo "<script>alert('Error adding admin.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
</head>

<body>
    <h2>Add a New Admin</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Add Admin</button>
    </form>
</body>

</html>