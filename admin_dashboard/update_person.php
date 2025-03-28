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
            $query2 = "UPDATE users SET Name='$name', Email='$email' WHERE UserID=$id";
        } else {
            $query2 = "UPDATE admin SET Name='$name', Email='$email' WHERE AdminID=$id";
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
    <title>Edit User</title>
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