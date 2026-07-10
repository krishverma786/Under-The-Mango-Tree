<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>
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

<script>
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.getElementById('mobile-nav');

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
</script>