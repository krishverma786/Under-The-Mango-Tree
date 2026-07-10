<div class="footer">
        <div class="footer-up">
            <div class="left-footer">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="story.php">Story</a></li>
                    <li><a href="menu.php">Menu</a></li>

                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="booktable.php">Book a Table</a></li>
                    <?php if(isset($_SESSION['user_id'])) { ?>

    <li><a href="profile.php">Profile</a></li>

<?php } else { ?>

    <li><a href="auth.php">Login</a></li>

<?php } ?>

                </ul>
            </div>
            
            <div class="right-footer">
                <h3>Contact Info</h3>
                <p>
                    Address:  Plot no.100, The Mall Rd, opp. Kunal Tower, Civil Lines, Ludhiana, Punjab 141001<br>
                    Phone: <a href="tel:+919872011111">+91 98720 11111</a><br>
                    Social: <a href="https://www.instagram.com/underthemangotree_ldh/" target="_blank">Instagram</a>
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Under The Mango Tree. All rights reserved.</p>
        </div>
    </div>