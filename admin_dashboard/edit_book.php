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
    <link rel="stylesheet" href="../css/editbook.css">
    <title>Edit Book</title>
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