<?php
session_start();
include "admin_dashboard/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and prevent undefined key errors
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $type = isset($_POST['account_type']) ? trim($_POST['account_type']) : '';

    // Check if all fields are filled
    if (empty($name) || empty($email) || empty($password) || empty($type)) {
        echo "<script>alert('All fields are required!'); window.location='signup.php';</script>";
        exit();
    }

    // Ensure password is at least 8 characters long
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long!'); window.location='signup.php';</script>";
        exit();
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    if ($type === "Admin") {
        $check_query = "SELECT * FROM admin WHERE Email = ?";
    } else {
        $check_query = "SELECT * FROM users WHERE Email = ?";
    }

    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already registered! Try logging in.'); window.location='signup.php';</script>";
        exit();
    }

    // Insert into the correct table
    if ($type === "Admin") {
        $query = "INSERT INTO admin (Name, Email, Password) VALUES (?, ?, ?)";
    } else {
        $query = "INSERT INTO users (Name, Email, Password, Type) VALUES (?, ?, ?, ?)";
    }

    $stmt = mysqli_prepare($conn, $query);

    if ($type === "Admin") {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashed_password, $type);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration successful! Please log in.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error in registration. Please try again.'); window.location='signup.php';</script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
