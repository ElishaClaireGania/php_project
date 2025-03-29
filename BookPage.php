<?php
session_start();
include "admin_dashboard/db_connect.php";

// Fetch books from the database
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/main_styles.css" />
    <link rel="stylesheet" href="css/books_styles.css" />
    <link rel="stylesheet" href="css/scroll.css" />
    <script src="script/functions.js" defer></script>
    <script src="script/book_details.js" defer></script>
    <title>Books</title>
</head>

<header>
    <div>
        <a href="Home.php"><img class="logo" src="images/logo.png" alt="Biblio-Sage Logo" /></a>
    </div>
    <nav>
        <a class="home" href="Home.php">Home</a>
        <a class="books" href="BookPage.php">Books</a>
        <a class="blog" href="Blog.html">Blog</a>
        <a class="about" href="About.php">About</a>
        <a class="contact" href="Contact.php">Contact</a>
    </nav>
</header>

<body>
    <div class="hero-container">
        <img class="hero-image" src="images/bookshero.jpg" alt="About Hero" />
        <div class="overlay"></div>
        <h1 class="hero-text">Expand Your Mind, One Book at a Time</h1>
    </div>

    <div class="category-container">
        <h3>Category</h3>
        <a href="#">A</a>
        <a href="#">B</a>
        <a href="#">C</a>
    </div>
    <div>
        <h2 class="featured-books">Featured Books</h2>
    </div>
    <div class="book-list">
        <div class="book">
            <img src="book_covers/assembly.png" alt="Assembly Language Programming: ARM Cortex-M3" />
            <h2>Assembly Language Programming: ARM Cortex-M3</h2>
            <p> by: Vincent Mahout</p>
            <a href="Book_details.php?book=assembly_language">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/black.png" alt="Black is Beautiful: A Philosophy of Black Aesthetics" />
            <h2>Black is Beautiful: A Philosophy of Black Aesthetics</h2>
            <p>by: Paul C. Taylor</p>
            <a href="Book_details.php?book=black_beauty">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/creative.png" alt="Creative Management of Complex Systems" />
            <h2>Creative Management of Complex Systems</h2>
            <p>by: Jean-Alain Héraud, Fiona Kerr, Thierry Burger-Helmchen</p>
            <a href="Book_details.php?book=creative_management">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/decision.png" alt="Decision Analytics and Optimization in Disease Prevention and
                Treatment" />
            <h2>
                Decision Analytics and Optimization in Disease Prevention and
                Treatment
            </h2>
            <p>by: NAN KONG, PhD</p>
            <a href="Book_details.php?book=decision_analytics">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/enable.png" alt="Enabling Technologies for High Spectral-Efficiency Coherent Optical
                Communication Networks" />
            <h2>
                Enabling Technologies for High Spectral-Efficiency Coherent Optical
                Communication Networks
            </h2>
            <p>by: Xiang Zhou</p>
            <a href="Book_details.php?book=enable_tech">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/geo.jpg" alt="Evolution of Geologic Sciences" />
            <h2>Evolution of Geologic Sciences</h2>
            <p>by: John P. Rafferty</p>
            <a href="Book_details.php?book=geo_science">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/knowledge.png" alt="Knowledge in Risk Assessment and Management" />
            <h2>Knowledge in Risk Assessment and Management</h2>
            <a href="Book_details.php?book=knowledge_risk">View Book Details</a>
            <p>by: TERJE AVEN, PhD</p>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/simulation.png" alt="Simulation and Analysis of Mathematical Methods in Real-Time
                Engineering Applications" />
            <h2>
                Simulation and Analysis of Mathematical Methods in Real-Time
                Engineering Applications
            </h2>
            <p>by: T. Ananth Kumar</p>
            <a href="Book_details.php?book=simulation_analysis">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>

        <div class="book">
            <img src="book_covers/yeast.png" alt="Yeast: Molecular and Cell Biology" />
            <h2>Yeast: Molecular and Cell Biology</h2>
            <p>by: Horst Feldmann</p>
            <a href="Book_details.php?book=yeast">View Book Details</a>
            <div class="button-container">
                <a href="borrow_book.php"><button class="borrow">BORROW</button></a>
                <a href="buy_book.php"><button class="buy">BUY</button></a>
            </div>
        </div>
    </div>

    <div class="book-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="book">
                <img src="<?= !empty($row['ImageURL']) ? 'book_covers/' . $row['ImageURL'] : 'images/default-book.jpg' ?>"
                    alt="<?= htmlspecialchars($row['Title']); ?>">
                <h2><?= htmlspecialchars($row['Title']); ?></h3>
                    <p>by: <?= htmlspecialchars($row['Author']); ?></p>
                    <a href="Book_details.php?book_id=<?= $row['Book_ID']; ?>">View Book Details</a>
                    <p>Available: <?= (int)$row['Quantity']; ?></p>
                    <div class="button-container">
                        <?php if ((int)$row['Quantity'] > 0) { ?>
                            <a href="borrow_book.php?book_id=<?= $row['Book_ID']; ?>"><button class="borrow">BORROW</button></a>
                        <?php } else { ?>
                            <button disabled>Out of Stock</button>
                        <?php } ?>

                        <?php if ((int)$row['Quantity'] > 0) { ?>
                            <a href="buy_book.php?book_id=<?= $row['Book_ID']; ?>"><button class="buy">BUY</button></a>
                        <?php } else { ?>
                            <button disabled>Out of Stock</button>
                        <?php } ?>
                    </div>
            </div>
        <?php } ?>
    </div>
</body>
<!-- Scroll to Top Button -->
<button id="back-to-top" onclick="scrollToTop()">↑</button>
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h3>ABOUT</h3>
            <ul>
                <li><a href="#meet-team">Developers</a></li>
                <li><a href="#mission">Mission</a></li>
                <li><a href="#vision">Vision</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>POLICY</h3>
            <ul>
                <li>
                    <a href="footer/terms_and_conditions.html" target="_blank">Terms and Conditions</a>
                </li>
                <li>
                    <a href="footer/privacy_policy.html" target="_blank">Privacy Policy</a>
                </li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>BLOG</h3>
            <ul>
                <li><a href="#">Reading Tips & Guides</a></li>
                <li><a href="#">Literary Genres</a></li>
                <li><a href="#">Research & Education</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>GET HELP</h3>
            <ul>
                <li><a href="footer/FAQS.html" target="_blank">FAQs</a></li>
                <li>
                    <a href="footer/customersupport.html" target="_blank">Customer Support</a>
                </li>
                <li>
                    <a href="footer/borrowbuyguide.html" target="_blank">Borrow/Buy Guide</a>
                </li>
                <li>
                    <a href="footer/payment_pricing.html" target="_blank">Payment & Pricing</a>
                </li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>FOLLOW US</h3>
            <div class="social-icons">
                <a href="#" target="_blank"><img src="icons/fb.png" /></a>
                <a href="#" target="_blank"><img src="icons/twitter.png" /></a>
                <a href="#" target="_blank"><img src="icons/insta.png" /></a>
                <a href="#" target="_blank"><img src="icons/linkedin.png" /></a>
            </div>
        </div>
    </div>
</footer>

</html>
<?php mysqli_close($conn); ?>