<?php
include "admin_dashboard/db_connect.php";

$book = null;
$bookId = $_GET['book_id'] ?? $_GET['book'];

if (isset($bookId) && is_numeric($bookId)) {
  // Debugging: Check if book_id is received correctly
  error_log("Book ID received: " . $bookId);

  // Fetch book details from the database
  $stmt = $conn->prepare("SELECT * FROM books WHERE Book_ID = ?");
  $stmt->bind_param("i", $bookId);
  $stmt->execute();
  $result = $stmt->get_result();
  $book = $result->fetch_assoc();
  $stmt->close();

  // Debugging: Check if book data is fetched
  if ($book) {
    error_log("Book found: " . print_r($book, true));
  } else {
    error_log("No book found for ID: " . $bookId);
  }
} else {
  error_log("Invalid or missing book_id.");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bookdetails.css">
  <script src="script/book_details.js" defer></script>

  <title>Book Details</title>
</head>

<body>
  <h2>Explore Our Collection</h2>

  <div class="book-container">
    <div class="book-info">
      <?php if ($book) { ?>
        <!-- Database Book Details -->
        <div class="book-info">
          <h2 id="book-title"><?= htmlspecialchars($book['Title']); ?></h2>
          <p id="book-description"><?= htmlspecialchars($book['Description']); ?></p>
        </div>
      <?php } else { ?>
    </div>

    <!-- Hardcoded book details will be loaded via JavaScript -->
    <div class="book-info">
      <h2 id="book-title"></h2>
      <p id="book-description"></p>
    </div>
  <?php } ?>
  </div>
</body>

</html>