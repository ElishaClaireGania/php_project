<?php
session_start();
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
  <link rel="stylesheet" href="css/home_styles.css" />
  <link rel="stylesheet" href="css/scroll.css" />
  <script src="script/home.js" defer></script>
  <script src="script/functions.js" defer></script>
  <title>Home</title>
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

    <div class="btn-auth">
      <?php if (!isset($_SESSION['User_ID'])) : ?>
        <a class="signup" id="signup-btn" href="signup.php" target="_blank">Sign-Up</a>
        <a class="login" id="login-btn" href="login.php" target="_blank">Login</a>
      <?php else : ?>
        <a class="logout" id="logout-btn" href="logout.php">Logout</a>
      <?php endif; ?>
    </div>
  </nav>
</header>

<body>
  <div class="hero-container">
    <img src="images/library_hero.jpeg" alt="About Hero" class="hero-image" />
    <div class="overlay"></div>

    <div class="hero-content">
      <h1 class="hero-title">BIBLIO-SAGE</h1>
      <p class="hero-subtitle">
        <em>Where Wisdom Meets the Written Word!</em>
      </p>

      <div class="search-box">
        <input type="text" placeholder="Search" />
        <button type="submit">🔍</button>
      </div>
    </div>
  </div>

  <main>
    <section class="categories">
      <h2 class="section-heading">THIS IS A HEADING</h2>
      <p class="section-subheading">THIS IS A BODY TEXT</p>

      <div class="category-grid">
        <div class="category">
          <h3>✶ FICTION & LITERATURE</h3>
          <p>Classic and contemporary novels, short stories, and poetry.</p>
        </div>
        <div class="category">
          <h3>✶ SCIENCE & TECHNOLOGY</h3>
          <p>
            Books on physics, computer science, artificial intelligence, and
            innovations.
          </p>
        </div>
        <div class="category">
          <h3>✶ HISTORY & BIOGRAPHIES</h3>
          <p>
            Insights into historical events and life stories of influential
            people.
          </p>
        </div>
        <div class="category">
          <h3>✶ SELF-IMPROVEMENT & WELLNESS</h3>
          <p>Books on mental health, motivation, and personal growth.</p>
        </div>
        <div class="category">
          <h3>✶ EDUCATION & ACADEMICS</h3>
          <p>Study materials, research books, and educational guides.</p>
        </div>
        <div class="category">
          <h3>✶ SOCIAL ISSUES & CULTURE</h3>
          <p>
            Books covering politics, social movements, and cultural insights.
          </p>
        </div>
      </div>
    </section>

    <section>
      <div class="intro">
        <h2>WELCOME TO OUR E-LIBRARY</h2>
        <p class="library-desc">
          Discover a vast collection of books and resources covering diverse
          topics such as education, technology, mental health, relationships,
          climate change, and more. Whether you're looking for insightful
          research, inspiring stories, or practical guides, our eLibrary is
          designed to provide accessible and engaging content for all readers.
          Explore, learn, and expand your knowledge at your own pace.
        </p>
      </div>

      <div class="featured-books">
        <div class="carousel">
          <button class="prev">&#10094;</button> <!-- Left Arrow -->

          <div class="carousel-track">
            <!-- Slide 1 -->
            <div class="book-slide">
              <!-- Book Cover -->
              <div class="book-image">
                <img src="book_covers/good.png" alt="Really Good, Actually" />
              </div>

              <!-- Book Info -->
              <div class="book-info">
                <h3>10 Good Questions About Life and Death
                </h3>
                <p>by: Christopher Belshaw</p>
                <button class="borrow">BORROW</button>
                <button class="buy">BUY</button>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="book-slide">
              <div class="book-image">
                <img src="book_covers/pid.png" alt="Book 2" />
              </div>
              <div class="book-info">
                <h3>PID and Predictive Control of Electrical Drives and Power Converters using Matlab®/Simulink®</h3>
                <p>by: Liuping Wang (PhD), Shan Chai (PhD), Dae Yoo (PhD), Lu Gan (PhD), Ki Ng (PhD)</p>
                <button class="borrow">BORROW</button>
                <button class="buy">BUY</button>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="book-slide">
              <div class="book-image">
                <img src="book_covers/security.png" alt="Book 3" />
              </div>
              <div class="book-info">
                <h3>
                  Security in Wireless Communication Networks</h3>
                <p>by: Yi Qian, Feng Ye, Hsiao-Hwa Chen</p>
                <button class="borrow">BORROW</button>
                <button class="buy">BUY</button>
              </div>
            </div>

            <!-- Slide 4 -->
            <div class="book-slide">
              <div class="book-image">
                <img src="book_covers/language.png" alt="Book 4" />
              </div>
              <div class="book-info">
                <h3>Language Teaching Research and Language Pedagogy</h3>
                <p>by: Rod Ellis</p>
                <button class="borrow">BORROW</button>
                <button class="buy">BUY</button>
              </div>
            </div>

            <!-- Slide 5 -->
            <div class="book-slide">
              <div class="book-image">
                <img src="book_covers/quick.png" alt="Book 5" />
              </div>
              <div class="book-info">
                <h3>Quicksand</h3>
                <p>by: Nella Larsen</p>
                <button class="borrow">BORROW</button>
                <button class="buy">BUY</button>
              </div>
            </div>
          </div>

          <button class="next">&#10095;</button> <!-- Right Arrow -->
        </div>
      </div>
    </section>

    <section class="info-section">
      <div class="info-block">
        <div class="text">
          <h3>ENGAGE AND CONNECT</h3>
          <ol>
            <li>
              Join a growing community passionate about learning and
              meaningful discussions.
            </li>
            <li>
              Share your thoughts, insights, and ideas on important topics.
            </li>
            <li>
              Be part of a network that values awareness, education, and
              personal growth.
            </li>
          </ol>
        </div>
        <div class="image">
          <img src="images/engage_connect.jpg" alt="Engage Image" />
        </div>
      </div>

      <div class="info-block reverse">
        <div class="image">
          <img src="images/newsletter.jpg" alt="Newsletter Image" />
        </div>
        <div class="text">
          <h3>OUR NEWSLETTER</h3>
          <ol>
            <li>
              Explore thought-provoking articles on a wide range of topics.
            </li>
            <li>
              Discover innovative solutions to pressing societal issues.
            </li>
            <li>
              Gain valuable insights from real-world case studies, backed by
              accurate information and expert perspectives.
            </li>
          </ol>
        </div>
      </div>
    </section>

    <section class="quote">
      <div class="quote-section">
        <blockquote class="the-quote">
          "One glance at a book and you hear the voice of another person,
          perhaps someone dead for 1,000 years. To read is to voyage through
          time." - Carl Sagan
        </blockquote>
        <img
          class="logo-quote"
          src="images/logo_two.png"
          alt="Biblio-Sage Logo" />
      </div>
    </section>

    <section class="articles">
      <h2>Read More</h2>
      <div class="article">
        <div class="article-info">
          <a href="#">Python Programming</a>
          <p>by: Jones McArthur</p>
        </div>
        <div class="article-meta">
          <p>March 01, 2025 - by Elisha Claire A. Gania</p>
          <p>in Education & Academics</p>
        </div>
      </div>

      <div class="article">
        <div class="article-info">
          <a href="#">Romeo & Juliet</a>
          <p>by: William Shakespeare</p>
        </div>
        <div class="article-meta">
          <p>February 18, 2025 - by Shane C. Cordero</p>
          <p>in Literature & Fiction</p>
        </div>
      </div>

      <div class="article">
        <div class="article-info">
          <a href="#">Who Are We?</a>
          <p>by: Chloe Robison</p>
        </div>
        <div class="article-meta">
          <p>March 01, 2025 - by Aimee Li Marael S. Pangan</p>
          <p>in Literature & Fiction</p>
        </div>
      </div>

      <div class="article">
        <div class="article-info">
          <a href="#">Hear Me</a>
          <p>by: Lulu Valor</p>
        </div>
        <div class="article-meta">
          <p>December 23, 2025 - by Kimberly Clarisse P. Puno</p>
          <p>in Literature & Fiction</p>
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
      <form action="newsletter_signup.php" method="POST">
        <input type="text" name="name" placeholder="Enter your Name" required />
        <input type="email" name="email" placeholder="Enter your Email" required />
        <button type="submit">Subscribe</button>
      </form>
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