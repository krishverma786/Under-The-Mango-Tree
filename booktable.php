<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: auth.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css?v=2.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Table</title>

    <style>
        /* Base desktop setting for the hamburger lines */
        .menu-toggle {
            display: none; 
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .menu-toggle .bar {
            display: block !important;
            width: 25px !important;
            height: 3px !important;
            background-color: white; /* Made it golden-orange so it stands out clearly */
            transition: all 0.3s ease-in-out;
            border-radius: 2px;
        }

        /* SCREEN RESPONSIVENESS TRIGGER (1070px and below) */
        @media screen and (max-width: 1070px) {
    .navbar {
        position: relative; 
        height: 60px; /* Slim, elegant header height */
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #050b14; /* Deep premium dark blue/black */
        z-index: 1005;
    }

    .menu-toggle {
        display: flex !important; 
        z-index: 1010;
    }

    /* COMPACT ACCORDION DROPDOWN CONTAINER */
    .nav-links {
        position: absolute;
        top: 60px; /* Snaps perfectly right under the slim navbar */
        left: 0;
        width: 100%;
        background-color: #050b14; /* Matches the navbar color exactly */
        max-height: 0; 
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        z-index: 1000;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    /* Let it dynamically size to fit the tight list height */
   .nav-links.active {
    max-height: max-content; /* Dynamically hugs all links perfectly */
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

    .nav-links ul {
        flex-direction: column;
        align-items: stretch; /* Stretches the rows fully across the screen width */
        padding: 0; /* Clear out empty top/bottom space */
        gap: 0; /* Remove gaps so rows sit flush against each other */
        margin: 0; 
        width: 100%;
        display: flex;
        list-style: none;
    }

    .nav-links ul li {
        width: 100%;
        text-align: left; /* Left-align like the reference image */
        border-bottom: 1px solid rgba(255, 255, 255, 0.07); /* Subtle row divider lines */
    }

    /* CLEAN FULL-WIDTH ROW LINKS */
    .nav-links ul li a {
        display: block;
        width: 100%;
        padding: 14px 24px; /* Generous side padding for easy mobile clicking */
        font-size: 14px;
        font-weight: 600;
        color: #ffffff !important;
        text-transform: uppercase; /* Clean professional look */
        text-decoration: none;
        box-sizing: border-box;
        transition: background 0.2s ease;
    }

    /* Subtle highlight when tapping a menu item */
    .nav-links ul li a:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    /* REMOVED BIG GOLD BUTTONS: Making "Book a Table" & "Logout" match normal rows */
    .nav-links ul li a.book, 
    .nav-links ul li a.booktable {
        background-color: transparent !important;
        color: #f39c12 !important; /* Elegant gold text color highlight instead of block background */
        font-weight: 700;
        width: 100% !important;
        padding: 14px 24px !important;
        border-radius: 0 !important;
        margin: 0 !important;
    }

    /* CLEAN FIXED ROW FOR USER ICON */
    .nav-links ul li a.icon {
        background: transparent !important;
        color: #f39c12 !important;
        width: 100% !important;
        height: auto !important;
        border-radius: 0 !important;
        padding: 14px 24px !important;
        display: block !important;
        border: none !important;
        line-height: normal !important;
        font-size: 16px !important;
    }

    /* Simple fallback layout helper if your avatar uses a sub-tag */
    .nav-links ul li a.icon::before {
        content: "Profile: "; /* Adds crisp context next to the icon on mobile row layouts */
        font-size: 14px;
        color: #fff;
        font-weight: 600;
    }
    .logo-text a {
    color: #f39c12;
    font-size: 30px;
    font-weight: bold;
    font-family: 'Birthstone', cursive;
}

.logo-img {
    width: 75px;
    height: auto;
}

    /* Hamburger Animation Transform Vectors */
    .menu-toggle.active .bar:nth-child(1) { transform: translateY(8px) rotate(45deg); }
    .menu-toggle.active .bar:nth-child(2) { opacity: 0; }
    .menu-toggle.active .bar:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
}

/* ==========================================================================
   2. PHONE INTERFACES MEDIA QUERY (max-width: 768px)
   ========================================================================== */
@media screen and (max-width: 768px) {
    .menu-toggle {
        display: flex !important;
    }
    .logo {
    display: flex;
    align-items: center;
        margin-left: -20px;
}
    .logo-text a {
    color: #f39c12;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Birthstone', cursive;
}

.logo-img {
    width: 70px;
    height: auto;
}
    .nav-links.active {
        max-height: 280px; /* <-- Keeps it small and compact on mobile phones */
    }

    .menu-toggle {
        display: flex !important;
    }

    /* Keep row heights uniform on tiny screen variants */
    .nav-links ul li a {
        padding: 10px 20px; /* Shrunk from 14px to 10px */
        font-size: 13px;
    }
    
    .nav-links ul li a.book,
    .nav-links ul li a.icon {
        padding: 10px 20px !important;
    }

    /* Rest of your existing page sections section layout properties... */
    .hero-box:nth-child(1),
    .hero-box:nth-child(3) { display: none; }
    .hero-box:nth-child(2) { flex: 1; width: 100%; }
    .hero { height: 70vh; }
    .hero-text { width: 95%; }
    .hero-text h1 { font-size: 40px; }
    .italic { font-size: 35px; }
    .hero-text p { font-size: 15px; }
    .hide { display: none; }
    .about-img img { width: 100%; height: 350px; }
    .about-text { text-align: center; flex: none; width: 100%; }
    .gallery h2 { text-align: center; font-size: 30px; }
    .gallery-images {
        width: 90vw;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, 200px);
    }
    .gallery-grid {
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: repeat(12, 250px);
        gap: 10px;
    }
    .map { width: 90vw; height: 35vh; }
    .footer-up { flex-direction: column; gap: 30px; text-align: center; }
    .left-footer { display: none; }
    .right-footer { text-align: center; }
    .contact { flex-direction: column; text-align: center; padding: 40px 5%; }
    .contact-form { width: 100%; }
    .booktable { padding: 40px 5%; }
    .booktable-overlay { padding: 30px 20px; }
    .form-group {
        display: flex;
        flex-direction: row;
        justify-content: space-between; 
        align-items: center;
        gap: 15px;
        width: 100%;
        box-sizing: border-box;
    }
    .form-group label {
        width: 35%; 
        text-align: left;
        font-size: 16px;
        color: white;
        white-space: normal; 
        line-height: 1.2;
    }
    .form-group input {
        width: 60%; 
        padding: 12px;
        border-radius: 5px;
        border: none;
        outline: none;
        box-sizing: border-box;
    }
}
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <img class="logo-img" src="logo.png" alt="Logo"/>
            <h2 class="logo-text"><a href="index.php">Under The Mango Tree</a></h2>
        </div>
        
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="nav-links" id="mobile-nav">
            <ul>
                <li><a href="story.php">Story</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a class="book" href="booktable.php">Book a Table</a></li>
                <?php if(isset($_SESSION['user_id'])) { ?>
                    <li><a class="icon" href="profile.php">👤</a></li>
                <?php } else { ?>
                    <li><a class="book" href="auth.php">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <section class="booktable">
        <div class="booktable-overlay">
            <h2>Book a Table</h2>
            <p>Reserve your spot at Under The Mango Tree and experience the perfect blend of nature and luxury dining. Whether it's a romantic dinner, a family gathering, or a celebration with friends, we are here to make your dining experience unforgettable.</p>
            <div class="booktable-form">
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required placeholder="Enter name">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required>
                    </div>

                    <div class="form-group">
                        <label for="guests">Number of Guests:</label>
                        <input type="number" id="guests" name="guests" min="1" max="20" required>
                    </div>

                    <button type="submit" name="ok">Book Now</button>
                </form>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['ok'])) {
    include 'config.php';
    $user_id = $_SESSION['user_id'];
    
    // Escape all values safely
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $guests = mysqli_real_escape_string($con, $_POST['guests']);
    
    $insert = mysqli_query($con, "INSERT INTO bookings(user_id,name,email,phone,date,time,guests) VALUES('$user_id','$name','$email','$phone','$date','$time','$guests')");
    if (!$insert) {
        echo "<script>alert('Booking Failed');</script>";
    } else {
        echo "<script>alert('Booking Successful');</script>";
    }
}
    ?>
        
    <?php include 'footer.php'; ?>

    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('mobile-nav');

        if(mobileMenu && navLinks) {
            mobileMenu.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
                navLinks.classList.toggle('active');
            });

            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                    navLinks.classList.remove('active');
                });
            });
        }
    </script>
</body>
</html>