<?php include('../php/header.php'); 

$dashboard_link = '';
if (isset($_SESSION['login_source'])) {
    if ($_SESSION['login_source'] == 'admin') {
        $dashboard_link = '../php/admdb.php'; // Admin dashboard
    } elseif ($_SESSION['login_source'] == 'user') {
        $dashboard_link = '../php/dashboard.php'; // User dashboard
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETourna - Home</title>
    <link rel="stylesheet" href="../Assets/logstyle.css">
</head>
<body>
 
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="../images/etourn.png" alt="ETourna Logo">
            </div>
            <div class="spacer"></div>
            <nav class="nav-links">
                <!-- Dynamic Dashboard link based on role -->
                <a href="<?php echo $dashboard_link; ?>" class="dashboard-btn">Dashboard</a>
                <a href="#features">Features</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
               <?php if ($isLoggedIn): ?>
                    <a class="username"><?php echo $username; ?></a>
                    <a href="../php/logout.php" class="login-btn">Logout</a>
                <?php else: ?>
                    <a href="../php/login.php" class="login-btn">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="../sliderimg/img1.jpeg" alt="">
                </div>
                <div class="item">
                    <img src="../sliderimg/img2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="../sliderimg/img3.png" alt="">
                </div>
                <div class="item">
                    <img src="../sliderimg/img4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="../sliderimg/img5.jpg" alt="">
                </div>
            </div>
            <div class="buttons">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="hero-content">
            <h1>Welcome to <span class="highlight">ETourna</span></h1>
            <p>Your one-stop solution for managing and participating in eSports tournaments!</p>
            <a href="register.html" class="cta-btn">Get Started</a>
        </div>
    </section>

    <script src="../scripts/slide.js"></script>

    <section class="features" id="features">
        <h2>Features</h2>
        <div class="features-container">
            <div class="feature-item">
                <h3>Easy Registration</h3>
                <p>Seamlessly register your team or players for tournaments.</p>
            </div>
            <div class="feature-item">
                <h3>Live Match Tracking</h3>
                <p>Track scores, updates, and standings in real time.</p>
            </div>
            <div class="feature-item">
                <h3>Team Management</h3>
                <p>Manage your team, view stats, and track your progress.</p>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-content">
            <h2>About ETourna</h2>
            <p>ETourna is dedicated to providing a platform for hosting and managing online and offline tournaments. We aim to simplify the process of registration, scheduling, and result tracking for both players and organizers.</p>
        </div>
    </section>


    <section class="contact" id="contact">
        <h2>Contact Us</h2>
        <form action="/contact.php" method="POST" class="contact-form">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="contact-btn">Send Message</button>
        </form>
    </section>


    <footer class="footer">
        <p>&copy; 2024 ETourna. All rights reserved.</p>
    </footer>
</body>
</html>
