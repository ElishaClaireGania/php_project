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
    <title>Manage Books</title>
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

        /* Container */
        .container {
            max-width: 95%;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Add New Book Link */
        .container a {
            display: inline-block;
            background: #DAA520;
            color: #7C0A02;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .container a:hover {
            background: #7C0A02;
            color: #f5f1e8;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #7C0A02;
            color: white;
            font-family: "Libre Baskerville", serif;
        }

        td {
            background: #fff;
            font-family: "Libre Baskerville", serif;
            color: #333;
        }

        /* Book Cover */
        td img {
            max-width: 60px;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Action Links */
        td a {
            text-decoration: none;
            font-weight: bold;
            padding: 5px 8px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        td a:first-child {
            background: #DAA520;
            color: #7C0A02;
        }

        td a:first-child:hover {
            background: #7C0A02;
            color: #f5f1e8;
        }

        td a:last-child {
            background: #7C0A02;
            color: white;
        }

        td a:last-child:hover {
            background: #DAA520;
            color: #7C0A02;
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