<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Craftopia</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'header.php'; ?>
    </header>

    <!-- Banner Image with November Discount -->
    <main>
        <div class="banner">
            <img src="product_images/karim-manjra-cW3nDFVpi10-unsplash.jpg" alt="banner">
            <div class="banner-content">
                <div class="discount-info">
                    <h2>November Special!</h2>
                    <p>Enjoy 10% off on all online orders throughout November. Don't miss out on our exclusive deals!</p>
                </div>
                <div class="cta">
                    <h1>Discover Unique Crafts</h1>
                    <h2>Handmade, Authentic, and One-of-a-Kind</h2>
                    <p>Explore our exclusive collection of artisanal crafts, perfect for any occasion. Whether you're looking for a special gift or something unique for your home, we have something for everyone.</p>
                    <a href="collections.php" class="cta-button">Shop Now</a>
                </div>
            </div>
        </div>

        <!-- Best Sellers -->
        <div class="section-header1">
            <h1>Best Sellers</h1>
        </div>

        <div class="content-container" id="best-sellers">
            <!-- Products will be dynamically inserted here -->
        </div>

        <!-- Shop by Category -->
        <div class="section-header2">
            <h1>Shop by Category</h1>
        </div>

        <div class="content-container" id="shop-by-category">
            <!-- Categories will be dynamically inserted here -->
        </div>

        <!-- What Are Customers Saying -->
        <div class="section-header2">
            <h1>What Are Customers Saying</h1>
        </div>

        <div class="review-carousel">
            <div class="carousel-container" id="carousel-container">
                <!-- Review items will be dynamically inserted here -->
            </div>

            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="javascript:void(0);" id="prev">&#10094;</a>
            <a class="carousel-control-next" href="javascript:void(0);" id="next">&#10095;</a>
        </div>

        <!-- Review Submission Form -->
        <div class="review-form-container">
            <h2>Leave a Review</h2>
            <form id="reviewForm">
                <input type="text" id="reviewerName" name="name" placeholder="Your name" required>
                <input type="number" id="reviewRating" name="rating" min="1" max="5" placeholder="Rating (1-5)" required>
                <textarea id="reviewText" name="review" rows="4" placeholder="Your review" required></textarea>
                <button type="submit">Submit Review</button>
                <div class="feedback" id="reviewFeedback"></div>
            </form>
        </div>
    </main>

    <script src="js/script.js"></script>
    <!-- Footer -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>
