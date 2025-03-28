<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['AdminID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

$records = mysqli_query($conn, "SELECT * FROM personalrecords");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Users & Admins</title>
</head>

<body>
    <h2>Users & Admins</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($records)) { ?>
            <tr>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Type']; ?></td>
                <td>
                    <a href="update_person.php?id=<?php echo $row['ID']; ?>">Edit</a> |
                    <a href="delete_person.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>