<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css?v=2.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="hero">

  <!-- Left media -->
  <div class="hero-box">
    <video autoplay muted loop>
      <source src="6.mp4" type="video/mp4">
    </video>
  </div>

  <!-- Center media -->
  <div class="hero-box">
    <video autoplay muted loop>
      <source src="4.mp4" type="video/mp4">
    </video>
  </div>

  <!-- Right media -->
  <div class="hero-box">
    <video autoplay muted loop>
      <source src="8.mp4" type="video/mp4">
    </video>
  </div>

  <!-- Center Text Overlay -->
  <div class="hero-text">
    <h2 class="italic">Welcome to</h2>
    <h1>Under The Mango Tree</h1>
    <p>Where every meal is a celebration of nature's bounty</p>
  </div>

</section>

    <div class="about">
        <div class="about-text">
            <h3>Welcome to Under The Mango Tree</h3>
            <h1>About Us</h1>
            <p>Under The Mango Tree is a premium fine-dining and lounge destination offering a perfect blend of great food, handcrafted cocktails, and curated music. From relaxed dinners to vibrant DJ nights, the space seamlessly transforms from a calm dining experience to a lively social scene—ideal for celebrations, parties, and memorable evenings.</p>
        </div>
        <div class="about-img">
            <img class="hide" src="3.jpg"/>
            <img class="hide" src="2.jpg"/>
        </div>
    </div>

    <div class="gallery">
        <h3>Gallery</h3>
        <h2>Experience the Essence of Under The Mango Tree</h2>
        <div class="gallery-images">
            <img src="5.jpg"/>
            <img src="10.jpg"/>
            <img src="11.jpg"/>
            <img src="9.jpg"/>
            <img src="13.jpg"/>
            <img src="12.jpg"/>
        </div>
        <a href="gallery.php">View More</a>
    </div>

    <section class="location">
        <h3>Our Location</h3>
        <h2>Find Us Here</h2>
        <div class="location-container">
            <!-- Map -->
            <div class="map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3423.3126799836195!2d75.83719207504446!3d30.90588307724472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a832f927d3707%3A0x11fc141832393daf!2sUnderTheMangoTree_ludhiana!5e0!3m2!1sen!2sin!4v1780639207807!5m2!1sen!2sin"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
        
</body>
</html>