<?php
session_start();
include "db_connect.php";

// Check if the admin is logged in
if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

// Check if Admin_ID is passed in the URL
if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid admin ID.'); window.location='manage_admins.php';</script>";
    exit();
}

$id = $_GET['id'];

// Fetch admin details
$result = mysqli_query($conn, "SELECT * FROM admin WHERE Admin_ID = $id");
$admin = mysqli_fetch_assoc($result);

if (!$admin) {
    echo "<script>alert('Admin not found.'); window.location='manage_admins.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update the admin table
    $query = "UPDATE admin SET Name='$name', Email='$email' WHERE Admin_ID=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Admin updated successfully!'); window.location='manage_admins.php';</script>";
    } else {
        echo "Error updating admin table: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="../css/updateadmin.css">
    <title>Edit Admin</title>
</head>

<body>
    <div>
        <h2>Edit Admin</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $admin['Name']; ?>" required><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $admin['Email']; ?>" required><br>

            <button type="submit">Update</button>
        </form>
    </div>

    <div><a href="manage_admins.php" class="back-btn">Back</a></div>
</body>

</html>