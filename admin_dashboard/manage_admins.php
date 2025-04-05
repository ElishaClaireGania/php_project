<?php
session_start();
include "db_connect.php";

// Check if the admin is logged in
if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

// Fetch all admins from the admin table
$result = mysqli_query($conn, "SELECT * FROM admin");
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
    <link rel="stylesheet" href="../css/manage.css">
    <title>Manage Admins</title>
</head>

<body>
    <div class="container">
        <h2>Manage Admins (Admin Panel)</h2>
        <a href="add_admin.php">Add New Admin</a>
        <table>
            <tr>
                <th>Admin ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['Admin_ID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td>
                        <a href="update_admins.php?id=<?php echo $row['Admin_ID']; ?>">Edit</a> |
                        <a href="delete_admins.php?id=<?php echo $row['Admin_ID']; ?>" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div><a href="Admin_dashboard.php" class="back-btn">Back</a></div>
</body>

</html>