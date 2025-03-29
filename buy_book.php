<?php
session_start();
include "admin_dashboard/db_connect.php";

if (!isset($_SESSION['User_ID'])) {
    echo "<script>alert('You must be logged in to purchase a book.'); window.location='login.php';</script>";
    exit();
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $query = "SELECT * FROM books WHERE Book_ID = $book_id";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Book not found!'); window.location='books.php';</script>";
    exit();
}

if (isset($_POST['purchase'])) {
    $user_id = $_SESSION['User_ID'];
    $purchase_date = date("Y-m-d H:i:s");

    $insert_query = "INSERT INTO purchasedbooks (User_ID, Book_ID, PurchasedDate) 
                     VALUES ('$user_id', '$book_id', '$purchase_date')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        echo "<script>alert('Book purchased successfully!'); window.location.href = 'e_book/{$book['PDFURL']}';</script>";
        exit();
    } else {
        echo "<script>alert('Error processing purchase.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f1e5;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            margin-top: 50px;
        }

        .book-card {
            background: black;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .book-card img {
            width: 200px;
            height: 300px;
            border-radius: 5px;
        }

        .description {
            max-width: 500px;
            text-align: left;
        }

        .button {
            background: goldenrod;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            display: block;
            width: 200px;
            margin: 10px auto;
            border: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="book-card">
            <img src="<?= !empty($book['ImageURL']) ? 'book_cover/' . $book['ImageURL'] : 'images/default-book.jpg'; ?>" 
                 alt="<?= htmlspecialchars($book['Title']); ?>">
            <h3><?= htmlspecialchars($book['Title']); ?></h3>
            <p>by: <?= htmlspecialchars($book['Author']); ?></p>
        </div>
        <div class="description">
            <h2>Overview:</h2>
            <p><?= htmlspecialchars($book['Description']); ?></p>
            <h3>Price: Php <?= number_format($book['Price'], 2); ?></h3>
            <h3>Payment Methods</h3>

            <form method="POST">
                <button class="button" type="submit" name="purchase">CREDIT/DEBIT CARD</button>
                <button class="button" type="submit" name="purchase">GCASH</button>
                <button class="button" type="submit" name="purchase">PAYPAL</button>
                <button class="button" type="submit" name="purchase">MAYA</button>
            </form>

        </div>
    </div>
</body>

</html>
