<?php
session_start();
include "admin_dashboard/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $query = "SELECT Admin_ID, Name, Email, Password FROM admin WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin = mysqli_fetch_assoc($result);

    if ($admin) {
        $stored_password = $admin['Password'];

        if (password_verify($password, $stored_password) || $stored_password === md5($password)) {
            if ($stored_password === md5($password)) {
                $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $update_query = "UPDATE admin SET Password = ? WHERE Admin_ID = ?";
                $update_stmt = mysqli_prepare($conn, $update_query);
                mysqli_stmt_bind_param($update_stmt, "si", $new_hashed_password, $admin['Admin_ID']);
                mysqli_stmt_execute($update_stmt);
                mysqli_stmt_close($update_stmt);
            }

            $_SESSION['Admin_ID'] = $admin['Admin_ID'];
            $_SESSION['Email'] = $admin['Email'];
            $_SESSION['Name'] = $admin['Name'];
            $_SESSION['Type'] = "Admin";

            header("Location: admin_dashboard/Admin_dashboard.php");
            exit();
        }
    }

    $query = "SELECT User_ID, Name, Email, Password, Type FROM users WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($password, $user['Password'])) {
            $_SESSION['User_ID'] = $user['User_ID'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Name'] = $user['Name'];
            $_SESSION['Type'] = $user['Type'];

            header("Location: Home.php");
            exit();
        }
    }

    echo "<script>alert('Wrong email or password!'); window.location='login.php';</script>";

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
