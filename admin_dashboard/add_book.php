<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $branch = $_POST['branch'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $image_name = $_FILES['book_image']['name'];
    $image_tmp = $_FILES['book_image']['tmp_name'];
    $image_path = "uploads/" . basename($image_name);
    move_uploaded_file($image_tmp, $image_path);

    $pdf_name = $_FILES['book_pdf']['name'];
    $pdf_tmp = $_FILES['book_pdf']['tmp_name'];
    $pdf_path = "uploads/" . basename($pdf_name);
    move_uploaded_file($pdf_tmp, $pdf_path);

    // Insert into Database
    $query = "INSERT INTO books (Title, Author, Branch, Price, Quantity, ImageURL, PDFURL, Description) 
              VALUES ('$title', '$author', '$branch', '$price', '$quantity', '$image_path', '$pdf_path', 'description')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Book added successfully!'); window.location='add_book.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Book</title>
</head>

<body>
    <h2>Add a New Book</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Book Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
        <input type="text" name="description" placeholder="Description" required><br>
        <input type="text" name="branch" placeholder="Branch" required><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <input type="number" name="quantity" placeholder="Quantity" required><br>
        <input type="file" name="book_image" accept="image/*" required><br>
        <input type="file" name="book_pdf" accept="application/pdf" required><br>
        <button type="submit">Add Book</button>
    </form>
</body>

</html>