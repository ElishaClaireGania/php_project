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
    $image_path = "../book_covers/" . basename($image_name);
    move_uploaded_file($image_tmp, $image_path);

    $pdf_name = $_FILES['book_pdf']['name'];
    $pdf_tmp = $_FILES['book_pdf']['tmp_name'];
    $pdf_path = "uploads/" . basename($pdf_name);
    move_uploaded_file($pdf_tmp, $pdf_path);

    // Insert into Database
    $query = "INSERT INTO books (Title, Author, Genre, Price, Quantity, ImageURL, PDFURL, Description) 
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <title>Add Book</title>
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

        /* Input Fields */
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Libre Baskerville', serif;
        }

        /* File Inputs */
        input[type="file"] {
            border: none;
            background: #f9f9f9;
            padding: 8px;
            font-size: 16px;
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
            font-family: "Cinzel", serif;
        }

        button:hover {
            background: #7C0A02;
            color: #f5f1e8;
        }
    </style>
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