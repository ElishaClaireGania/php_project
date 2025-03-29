<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM books");
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
    <link rel="stylesheet" href="../css/managebook.css">
    <title>Manage Books</title>
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
                <th>Genre</th>
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
                    <td><?php echo $row['Genre']; ?></td>
                    <td>₱<?php echo number_format($row['Price'], 2); ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td><a href="<?php echo $row['PDFURL']; ?>" target="_blank">View PDF</a></td>
                    <td>
                        <a href="edit_book.php?id=<?php echo $row['Book_ID']; ?>">Edit</a> |
                        <a href="delete_book.php?id=<?php echo $row['Book_ID']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>