<?php
session_start();
include "db_connect.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid user ID.'); window.location='view_records.php';</script>";
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM personalrecords WHERE ID = $id");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "<script>alert('User not found.'); window.location='view_records.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query1 = "UPDATE personalrecords SET Name='$name', Email='$email' WHERE ID=$id";

    if (mysqli_query($conn, $query1)) {
        if ($user['Type'] == 'User') {
            $query2 = "UPDATE users SET Name='$name', Email='$email' WHERE User_ID=$id";
        } else {
            $query2 = "UPDATE admin SET Name='$name', Email='$email' WHERE Admin_ID=$id";
        }

        if (mysqli_query($conn, $query2)) {
            echo "<script>alert('User updated successfully!'); window.location='view_records.php';</script>";
        } else {
            echo "Error updating users/admins: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating personal_records: " . mysqli_error($conn);
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
    <title>Edit User</title>
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

        /* Form Styling */
        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        label {
            font-family: "Libre Baskerville", serif;
            font-size: 18px;
            color: #7C0A02;
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Buttons */
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #7C0A02;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #DAA520;
            color: #7C0A02;
        }

        /* Back Link */
        a {
            display: block;
            margin-top: 15px;
            font-size: 18px;
            color: #7C0A02;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #DAA520;
        }
    </style>
</head>

<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['Name']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['Email']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
    <a href="view_records.php">Back</a>
</body>

</html>