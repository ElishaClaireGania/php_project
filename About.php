<?php
session_start();  // Ensure session is started at the top

if (isset($_SESSION['message'])) {
  echo "<div class='message {$_SESSION['message_type']}'>";
  echo $_SESSION['message'];
  echo "</div>";

  // Remove message after displaying
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
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
  <link rel="stylesheet" href="css/main_styles.css" />
  <link rel="stylesheet" href="css/about_styles.css" />
  <link rel="stylesheet" href="css/scroll.css" />
  <script src="script/functions.js" defer></script>
  <script src="script/newsletter.js" defer></script>
  <title>About Us</title>
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
    <img class="hero-image" src="images/abouthero.jpeg" alt="About Hero" />
    <div class="overlay"></div>
    <h1 class="hero-text">The Heart of Biblio-Sage</h1>
  </div>
  <main>
    <section class="about-head">
      <div class="about-content">
        <h2>About Biblio-Sage</h2>
        <p>
          At Biblio-Sage, we believe in the power of books to inspire,
          educate, and connect readers across the world. Our e-library is more
          than just a collection of books—it's a thriving community for
          lifelong learners, passionate readers, and knowledge seekers.
        </p>
        <p>
          This website is dedicated to providing a comprehensive e-library
          experience. It features four main navigation elements: Home, Blog,
          About, and Contact, allowing users to explore the platform with
          ease. With just a tap, you can discover what the e-library offers
          and find answers to your book-related questions.
        </p>
        <p>
          An e-library is a digital collection of books and resources,
          enabling users to read and learn from anywhere with an internet
          connection. It provides quick and effortless access to knowledge
          while also being environmentally friendly. Additionally, e-libraries
          are highly beneficial for students, offering a vast selection of
          academic resources, research articles, and study materials to
          support their learning.
        </p>
      </div>
      <div class="about-image">
        <img src="images/about_main.jpg" alt="About Main Image" />
      </div>
    </section>

    <section class="mission-section">
      <div class="mission-header">
        <h1>OUR <span>MISSION</span></h1>
      </div>

      <div class="mission-container">
        <div class="mission-box">
          <img src="icons/mission_icon.png" alt="Mission Icon" />
          <h2 id="mission">Mission</h2>
          <p>
            Our task is to make the e-library a top-notch resource. We'll
            focus on getting high-quality content, making it easy to navigate,
            and reaching out to as many people as possible, so that the joy of
            learning through digital books is within everyone's reach.
          </p>
        </div>

        <div class="mission-box">
          <img src="icons/vision_icon.png" alt="Vision Icon" />
          <h2 id="vision">Vision</h2>
          <p>
            We hope for a world where the e-library is the key to unlocking
            knowledge for everyone. It's a place where people can gain new
            skills and let their imaginations expand freely, all with just a
            few taps on a screen. We envision a future where digital libraries
            bridge the gap between curiosity and discovery, making learning
            seamless and inclusive. By embracing innovation, we strive to
            create a platform that nurtures intellectual growth and inspires a
            lifelong passion for reading.
          </p>
        </div>

        <div class="mission-box">
          <img src="icons/values_icon.png" alt="Values Icon" />
          <h2>Values</h2>
          <p>
            We believe that knowledge should be accessible to everyone,
            fostering a love for lifelong learning through a diverse and
            well-curated collection of books. Our e-library is built to create
            a strong reading community where individuals can connect, share
            insights, and grow together. Through accessibility, engagement,
            and empowerment, we strive to make reading an enriching experience
            for all.
          </p>
        </div>
      </div>
    </section>

    <section class="genres">
      <div class="genre-circle center">GENRES</div>
      <div class="genre-circle science">SCIENCE</div>
      <div class="genre-circle fiction">FICTION</div>
      <div class="genre-circle wellness">WELLNESS</div>
      <div class="genre-circle education">EDUCATION</div>
      <div class="genre-circle culture">CULTURE</div>
      <div class="genre-circle history">HISTORY</div>

      <div></div>
    </section>

    <section id="meet-team" class="meet-team">
      <section class="team-intro">
        <h2>MEET THE BIBLIOPHILES</h2>
        <p>
          In doing this website, we are a team of four members. Each person
          has unique skills that are crucial to the project. Our diverse
          backgrounds and experiences bring a wide range of ideas to the fold.
        </p>
      </section>

      <div class="team-container">
        <!-- Shane Cordero -->
        <div class="team-member">
          <img src="path-to-image" alt="Cordero" />
          <h3>Cordero, Shane C.</h3>
          <p>
            19 years old, born on July 30, 2005, is an IT student at Holy
            Angel University. She loves singing, dancing, traveling, and
            photography. Before college, she planned to be a medical
            technologist but later pursued IT out of curiosity. Now, she
            enjoys designing and creating websites despite its challenges. One
            day, she hopes to be successful and live a stable life, whether in
            IT or another field.
          </p>
        </div>

        <!-- Elisha Gania -->
        <div class="team-member">
          <img src="path-to-image" alt="Gania" />
          <h3>Gania, Elisha Claire A.</h3>
          <p>
            19 years old, born on September 19, 2005, she enjoys playing
            online games, singing, and reading faith-related books. She is a
            second-year IT student specializing in website development.
            Initially, she wanted to be a pediatrician but later realized IT
            was her true calling. She now finds joy in programming and
            building websites. In the future, she envisions herself as a
            professional web developer.
          </p>
        </div>

        <!-- Aimee Pangan -->
        <div class="team-member">
          <img src="path-to-image" alt="Pangan" />
          <h3>Pangan, Aimee Li Marael</h3>
          <p>
            19 years old, born on July 12, 2005, is an IT Web Development
            student at Holy Angel University. She is passionate about building
            user-friendly websites and learning new technologies. Her main
            focus is front-end and back-end development with an interest in
            UI/UX design. She enjoys coding and improving her skills. Her goal
            is to create innovative web experiences and grow in her field.
          </p>
        </div>

        <!-- Kimberly Puno -->
        <div class="team-member">
          <img src="path-to-image" alt="Puno" />
          <h3>Puno, Kimberly Clarisse P.</h3>
          <p>
            20 years old, born on November 02, 2004, is a second-year IT
            student specializing in Web Development. She initially chose IT
            for the salary but later discovered a passion for designing and
            building websites. She enjoys learning new things, traveling, and
            visiting amusement parks. She aims to be successful and
            financially stable while enjoying life. While still exploring her
            career path.
          </p>
        </div>
      </div>
    </section>

    <section class="newsletter">
      <div class="home-overlay"></div>
      <h2>Join the Biblio-Sage Community!</h2>
      <p>
        Stay connected with the world of books! Join the Biblio-Sage community
        and be the first to discover new releases, exclusive recommendations,
        and insightful articles. Subscribe now to fuel your passion for
        reading!
      </p>
      <?php
      if (isset($_SESSION['message'])) {
        echo "<div id='floating-message' class='{$_SESSION['message_type']}'>";
        echo $_SESSION['message'];
        echo "</div>";

        // Remove message after displaying
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
      }
      ?>
      <form action="newsletter_signup.php" method="POST">
        <input type="text" name="name" placeholder="Enter your Name" required />
        <input type="email" name="email" placeholder="Enter your Email" required />
        <button type="submit">Subscribe</button>
      </form>
    </section>

    <!-- Scroll to Top Button -->
    <button id="back-to-top" onclick="scrollToTop()">↑</button>
  </main>
</body>
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