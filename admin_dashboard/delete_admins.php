<?php
session_start();
include "db_connect.php";

// Check if admin is logged in
if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

// Check if an ID is passed
if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid Admin ID.'); window.location='manage_admins.php';</script>";
    exit();
}

$id = intval($_GET['id']);

// Fetch admin details from the admin table
$result = mysqli_query($conn, "SELECT * FROM admin WHERE Admin_ID = $id");
$admin = mysqli_fetch_assoc($result);

if (!$admin) {
    echo "<script>alert('Admin not found.'); window.location='manage_admins.php';</script>";
    exit();
}

// Delete the admin record from the admin table
$query = "DELETE FROM admin WHERE Admin_ID = $id";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Admin deleted successfully!'); window.location='manage_admins.php';</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
