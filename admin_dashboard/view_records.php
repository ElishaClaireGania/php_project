<?php
session_start();
include "db_connect.php";

// Check if Admin is logged in
if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

// Fetch users & admins, ensuring the query runs successfully
$query = "SELECT Record_ID, Name, Email, Type FROM personalrecords";
$records = mysqli_query($conn, $query);

if (!$records) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <title>View Users & Admins</title>
    <style>
        /* Table Styles */
        body {
            font-family: "Cinzel", serif;
            background-color: #f5f1e8;
            text-align: center;
        }

        h2 {
            font-family: "Engravers MT", serif;
            color: #7C0A02;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            font-family: "Libre Baskerville", serif;
        }

        th {
            background: #7C0A02;
            color: white;
        }

        tr:nth-child(even) {
            background: #f5f1e8;
        }

        a {
            color: #7C0A02;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            color: #DAA520;
        }
    </style>
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
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td><?php echo htmlspecialchars($row['Email']); ?></td>
                <td><?php echo htmlspecialchars($row['Type']); ?></td>
                <td>
                    <a href="update_person.php?id=<?php echo $row['Record_ID']; ?>">Edit</a> |
                    <a href="delete_person.php?id=<?php echo $row['Record_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>