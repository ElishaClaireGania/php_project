<?php
session_start();
include "../db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f1e5;
            text-align: center;
        }

        .container {
            width: 90%;
            margin: auto;
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }

        th {
            background: goldenrod;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        img {
            width: 50px;
            height: 75px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Manage Books (Admin Panel)</h2>
        <a href="add_book.php">Add New Book</a>
        <table>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Branch</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>PDF</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><img src="<?php echo $row['ImageURL']; ?>" alt="Book Cover"></td>
                    <td><?php echo $row['Title']; ?></td>
                    <td><?php echo $row['Author']; ?></td>
                    <td><?php echo substr($row['Description'], 0, 50) . '...'; ?></td>
                    <td><?php echo $row['Branch']; ?></td>
                    <td>₱<?php echo number_format($row['Price'], 2); ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td><a href="<?php echo $row['PDFURL']; ?>" target="_blank">View PDF</a></td>
                    <td>
                        <a href="edit_book.php?id=<?php echo $row['BookID']; ?>">Edit</a> |
                        <a href="delete_book.php?id=<?php echo $row['BookID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>