<?php
session_start();

class Database
{
    // Database Connection
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "library_records";
    public $conn;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

class ContactForm
{
    private $db;
    public $name;
    public $email;
    public $message;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function setData($name, $email, $message)
    {
        $this->name = trim($name);
        $this->email = trim($email);
        $this->message = trim($message);
    }

    private function validate()
    {
        if (empty($this->name) || empty($this->email) || empty($this->message)) {
            $_SESSION['error'] = "All fields are required.";
            return false;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Invalid email format.";
            return false;
        }
        return true;
    }

    public function submit()
    {
        if ($this->validate()) {
            $messageDate = date("Y-m-d H:i:s");

            // Ensure table name is correct
            $stmt = $this->db->conn->prepare("INSERT INTO ContactForm (MessageDate, Name, Email, Message) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $messageDate, $this->name, $this->email, $this->message);

            if ($stmt->execute()) {
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let messageBox = document.createElement('div');
                        messageBox.innerHTML = 'Your message has been sent successfully!';
                        messageBox.style.cssText = 'position:fixed;top:20px;left:50%;transform:translateX(-50%);background:#7C0A02;color:#E1C16E;padding:10px;border-radius:10px;z-index:1000;';
                        document.body.appendChild(messageBox);
                        
                        setTimeout(function() {
                            messageBox.style.display = 'none';
                        }, 3000); // Disappear after 3 seconds
                    });
                </script>";
            } else {
                echo "<p class='error'>Error submitting the form. Please try again.</p>";
            }
        }
    }
}

$database = new Database();
$contactForm = new ContactForm($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactForm->setData($_POST["name"], $_POST["email"], $_POST["message"]);
    $contactForm->submit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/main_styles.css">
    <link rel="stylesheet" href="css/contact_styles.css">
    <link rel="stylesheet" href="css/scroll.css" />
    <script src="script/functions.js" defer></script>
    <title>Contact Us</title>
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
        <img class="hero-image" src="images/contacthero.jpg" alt="Contact Hero" />
        <div class="overlay"></div>
        <h1 class="hero-text">Questions? We're Here to Help!</h1>
    </div>

    <main>
        <section>
            <?php if (isset($_SESSION['success'])): ?>
                <p class="success"><?= $_SESSION['success']; ?></p>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?= $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </section>

        <section class="contact-section">
            <div class="contact-card">
                <h3>LET'S TALK BOOKS!</h3>
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                </p>
                <p class="phone">+01 3263 644 65</p>
                <a href="#" class="contact-link">VIEW GLOBAL NUMBERS</a>
            </div>

            <div class="contact-card">
                <h3>CONTACT CUSTOMER SUPPORT</h3>
                <p>
                    Need help with your account, book orders, or general inquiries? Our support team is available 24/7 to assist you. Reach out to us for quick resolutions and expert guidance.
                </p>
                <button class="contact-btn">CUSTOMER SUPPORT</button>
            </div>
        </section>

        <section class="contact-form1">
            <div class="contact-overlay"></div>
            <h2>REACH OUT - WE'D LOVE TO HEAR FROM YOU</h2>
            <form action="Contact.php" method="POST" class="contact-form">
                <div class="form-group">
                    <input class="for_name" type="text" name="name" placeholder="Enter your Name" required>
                </div>

                <div class="form-group">
                    <input class="for_email" type="email" name="email" placeholder="Enter Email" required>
                </div>

                <div class="form-group">
                    <textarea class="message" name="message" placeholder="Message" required></textarea>
                </div>

                <button type="submit" class="submit-btn">SUBMIT</button>
            </form>
        </section>

        <section class="contact-location">
            <h2>Let's Talk Books! Visit Us On:</h2>
            <p>123 Sitio Anupul, Bamban, Tarlac, Philippines<br>
                (63) 456-7890</p>

            <div class="map-container">
                <iframe
                    src="https://maps.google.com/maps?q=library&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>

    </main>
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