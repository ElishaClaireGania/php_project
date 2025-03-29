<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $branch = htmlspecialchars($_POST['genre']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $description = htmlspecialchars($_POST['description']);

    // File upload validation
    $allowed_image_types = ['image/jpeg', 'image/png', 'image/gif'];
    $allowed_pdf_types = ['application/pdf'];

    if (!in_array($_FILES['book_image']['type'], $allowed_image_types)) {
        die("<script>alert('Invalid image format. Please upload a JPG, PNG, or GIF.'); window.history.back();</script>");
    }

    if (!in_array($_FILES['book_pdf']['type'], $allowed_pdf_types)) {
        die("<script>alert('Invalid file format. Please upload a PDF.'); window.history.back();</script>");
    }

    // Generate unique file names
    $image_ext = pathinfo($_FILES['book_image']['name'], PATHINFO_EXTENSION);
    $pdf_ext = pathinfo($_FILES['book_pdf']['name'], PATHINFO_EXTENSION);
    $image_name = uniqid("book_", true) . "." . $image_ext;
    $pdf_name = uniqid("book_", true) . "." . $pdf_ext;

    // Define file paths
    $image_path = "../book_covers/" . $image_name;
    $pdf_path = "uploads/" . $pdf_name;

    // Move files
    move_uploaded_file($_FILES['book_image']['tmp_name'], $image_path);
    move_uploaded_file($_FILES['book_pdf']['tmp_name'], $pdf_path);

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO books (Title, Author, Genre, Price, Quantity, ImageURL, PDFURL, Description) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssddsss", $title, $author, $branch, $price, $quantity, $image_path, $pdf_path, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Book added successfully!'); window.location='add_book.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
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
    <link rel="stylesheet" href="../css/addbook.css">
    <title>Add Book</title>
</head>

<body>
    <h2>Add a New Book</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Book Title:</label><br>
        <input type="text" name="title" id="title" required><br>

        <label for="author">Author:</label><br>
        <input type="text" name="author" id="author" required><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="5" required></textarea><br>

        <label for="genre">Genre:</label><br>
        <input type="text" name="genre" id="genre" required><br>

        <label for="price">Price:</label><br>
        <input type="number" name="price" id="price" step="0.01" required><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" id="quantity" required><br>

        <label for="book_image">Book Cover Image:</label><br>
        <input type="file" name="book_image" id="book_image" accept="image/*" required><br>

        <label for="book_pdf">Book PDF:</label><br>
        <input type="file" name="book_pdf" id="book_pdf" accept="application/pdf" required><br>

        <button type="submit">Add Book</button>
    </form>

</body>

</html>