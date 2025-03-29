<?php
session_start();
include "db_connect.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid user ID.'); window.location='view_records.php';</script>";
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM personalrecords WHERE Record_ID = $id");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<script>alert('User not found.'); window.location='view_records.php';</script>";
    exit();
}

$query1 = "DELETE FROM personal_records WHERE Record_ID = $id";
if (mysqli_query($conn, $query1)) {

    if ($user['Type'] == 'User') {
        $query2 = "DELETE FROM users WHERE User_ID = $id";
    } else {
        $query2 = "DELETE FROM admin WHERE Admin_ID = $id";
    }

    if (mysqli_query($conn, $query2)) {
        echo "<script>alert('User deleted successfully!'); window.location='view_records.php';</script>";
    } else {
        echo "Error deleting from users/admins: " . mysqli_error($conn);
    }
} else {
    echo "Error deleting from personal_records: " . mysqli_error($conn);
}
