<?php
session_start();
include "db_connect.php";

if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Please log in as an admin.'); window.location='../login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $query = "SELECT * FROM books WHERE Book_ID = $book_id";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Book not found!'); window.location='manage_books.php';</script>";
    exit();
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image_url = $_POST['image_url'];
    $pdf_url = $_POST['pdf_url'];

    $update_query = "UPDATE books SET Title='$title', Author='$author', Description='$description', 
                     Genre='$genre', Price='$price', Quantity='$quantity', ImageURL='$image_url', 
                     PDFURL='$pdf_url' WHERE Book_ID = $book_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Book updated successfully!'); window.location='manage_books.php';</script>";
    } else {
        echo "<script>alert('Error updating book.');</script>";
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
    <title>Edit Book</title>
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
            max-width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 40px auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Labels */
        label {
            font-family: 'Libre Baskerville', serif;
            font-size: 16px;
            font-weight: bold;
            color: #7C0A02;
            display: block;
            margin-top: 10px;
            text-align: left;
            width: 90%;
        }

        /* Input Fields */
        input,
        textarea {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Libre Baskerville', serif;
        }

        /* Textarea Styling */
        textarea {
            height: 100px;
            resize: vertical;
        }

        /* Button */
        button {
            max-width: 200px;
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
            margin-top: 15px;
        }

        button:hover {
            background: #7C0A02;
            color: #f5f1e8;
        }
    </style>
</head>

<body>
    <h2>Edit Book</h2>
    <form method="POST">
        <label>Title:</label> <input type="text" name="title" value="<?php echo $book['Title']; ?>" required><br>
        <label>Author:</label> <input type="text" name="author" value="<?php echo $book['Author']; ?>" required><br>
        <label>Description:</label> <textarea name="description" required><?php echo $book['Description']; ?></textarea><br>
        <label>Genre:</label> <input type="text" name="genre" value="<?php echo $book['Genre']; ?>" required><br>
        <label>Price:</label> <input type="number" step="0.01" name="price" value="<?php echo $book['Price']; ?>" required><br>
        <label>Quantity:</label> <input type="number" name="quantity" value="<?php echo $book['Quantity']; ?>" required><br>
        <label>Image URL:</label> <input type="text" name="image_url" value="<?php echo $book['ImageURL']; ?>" required><br>
        <label>PDF URL:</label> <input type="text" name="pdf_url" value="<?php echo $book['PDFURL']; ?>" required><br>
        <button type="submit" name="update">Update Book</button>
    </form>
</body>

</html>