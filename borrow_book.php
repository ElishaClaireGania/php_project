<?php
session_start();
include "admin_dashboard/db_connect.php";

if (!isset($_SESSION['User_ID'])) {
    echo "<script>alert('You must be logged in to borrow a book.'); window.location='login.php';</script>";
    exit();
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $query = "SELECT * FROM books WHERE Book_ID = '$book_id'";
    $result = mysqli_query($conn, $query);
    $book = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Invalid book ID.'); window.location='books.php';</script>";
    exit();
}

// Handle borrowing request
if (isset($_POST['borrow'])) {
    $user_id = $_SESSION['User_ID'];
    $borrow_date = date("Y-m-d");
    $return_date = date("Y-m-d", strtotime("+7 days"));
    $status = "Borrowed";


    if ($book['Quantity'] > 0) {
        $insert_query = "INSERT INTO borrowedbooks (User_ID, Book_ID, BorrowedDate, ReturnDate, Status) 
                         VALUES ('$user_id', '$book_id', '$borrow_date', '$return_date', '$status')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            mysqli_query($conn, "UPDATE books SET Quantity = Quantity - 1 WHERE Book_ID = '$book_id'");

            echo "<script>alert('Book borrowed successfully!'); window.location='books.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error borrowing the book.');</script>";
        }
    } else {
        echo "<script>alert('Sorry, this book is out of stock.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f1e4;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        .book-image img {
            width: 300px;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .book-details {
            text-align: left;
            max-width: 500px;
        }

        .book-details h2,
        .book-details h4,
        .book-details p {
            margin-bottom: 10px;
        }

        .buttons {
            margin-top: 20px;
        }

        .buttons button,
        .buttons a {
            background-color: #d4a017;
            border: none;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .buttons button:hover,
        .buttons a:hover {
            background-color: #b68212;
        }

        .pdf-viewer {
            margin-top: 50px;
        }

        iframe {
            width: 80%;
            height: 500px;
            border: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="book-image">
            <img src="<?php echo $book['ImageURL']; ?>" alt="<?php echo $book['Title']; ?>">
        </div>
        <div class="book-details">
            <h2><?php echo $book['Title']; ?></h2>
            <h4>by <?php echo $book['Author']; ?></h4>
            <p>Branch: <?php echo $book['Branch']; ?></p>
            <p><?php echo $book['Description']; ?></p>
            <p>Price: ₱<?php echo number_format($book['Price'], 2); ?></p>

            <div class="buttons">
                <a href="buy_book.php?book_id=<?php echo $book['BookID']; ?>">Buy Book</a>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="borrow">Borrow Book</button>
                </form>
            </div>
        </div>
    </div>

    <div class="pdf-viewer">
        <h3>Preview Book</h3>
        <iframe src="<?php echo $book['PDFURL']; ?>" width="100%" height="500px"></iframe>
    </div>

</body>

</html>