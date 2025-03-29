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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <title>Add Admin</title>
    <style>
        /* General Styles */
        body {
            font-family: "Cinzel", serif;
            background-color: #f5f1e8;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            font-family: "Engravers MT", serif;
            color: #7C0A02;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Form Container */
        form {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Input Fields */
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Button */
        button {
            max-width: 150px;
            width: 100%;
            background-color: #DAA520;
            color: #7C0A02;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            font-family: "Cinzel", serif;
        }

        button:hover {
            background: #7C0A02;
            color: #f5f1e8;
        }
    </style>
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