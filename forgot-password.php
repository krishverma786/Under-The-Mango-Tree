<?php
session_start();
include("config.php"); // Path to your database connection

$error_msg = "";
$success_msg = "";

// STEP 1: Handle Email Verification
if (isset($_POST['check_user'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $q = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($q) > 0) {
        $_SESSION['reset_user_email'] = $email; 
    } else {
        $error_msg = "Email address not found.";
    }
}

// STEP 2: Handle Password Update
if (isset($_POST['done_reset'])) {
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $user_to_reset = $_SESSION['reset_user_email'];

    if ($new_pass === $confirm_pass) {
        $hashed_pass = md5($new_pass); // Matches your user hashing method
        
        $update = mysqli_query($con, "UPDATE users SET password='$hashed_pass' WHERE email='$user_to_reset'");
        
        if ($update) {
            unset($_SESSION['reset_user_email']);
            echo "<script>alert('Password reset successfully!'); window.location.href='auth.php';</script>";
            exit();
        } else {
            $error_msg = "Something went wrong. Please try again.";
        }
    } else {
        $error_msg = "Passwords do not match!";
    }
}

// Handle Cancel Action (resets the wizard)
if (isset($_POST['cancel_reset'])) {
    unset($_SESSION['reset_user_email']);
    header("Location: forgot-password.php");
    exit();
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css?v=25.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">

<?php include("header.php"); ?> 

<div class="wrap">
    <div class="log">
        <h2>Reset Password</h2>
        
        <?php if (!empty($error_msg)) { ?>
            <p class="alert-text error"><?php echo $error_msg; ?></p>
        <?php } ?>

        <?php if (!isset($_SESSION['reset_user_email'])) { ?>
            <form method="POST">
                <p class="info-text">Enter your email to verify your identity.</p>
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" name="check_user">Next</button>
            </form>
        <?php } else { ?>
            <form method="POST">
                <p class="info-text">
                    Verifying account: <strong><?php echo htmlspecialchars($_SESSION['reset_user_email']); ?></strong>
                </p>
                <input type="password" name="new_pass" placeholder="Enter New Password" minlength="8" required>
                <input type="password" name="confirm_pass" placeholder="Confirm New Password" minlength="8" required>
                
                <div class="btn-group">
                    <button type="submit" name="done_reset">Reset</button>
                    <button type="submit" name="cancel_reset" class="btn-cancel">Cancel</button>
                </div>
            </form>
        <?php } ?>
        
        <div class="forgot-pass">
            <a href="auth.php">Back to Login</a>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<style>
    body { margin: 0; }
    
    /* ==========================================================================
       DESKTOP AUTH CONTEXT & CONTENT CONTAINERS
       ========================================================================== */
    .wrap { 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        min-height: calc(100vh - 60px); 
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("28.jpg");
        background-size: cover;
        background-position: center;
        padding: 50px 20px;
        box-sizing: border-box;
    }
    
    .log { 
        width: 100%; 
        max-width: 420px; 
        padding: 30px; 
        background: white; 
        border-radius: 15px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.3); 
        box-sizing: border-box; 
    }
    
    h2 { text-align: center; font-family: Arial, sans-serif; color: #f39c12; margin-bottom: 20px; font-size: 28px; }
    
    form { display: flex; flex-direction: column; gap: 15px; }
    form input { padding: 14px; border: 1px solid #ddd; border-radius: 8px; font-size: 16px; outline: none; transition: 0.3s; box-sizing: border-box; width: 100%; }
    form input:focus { border-color: #f39c12; box-shadow: 0 0 8px rgba(243,156,18,0.4); }
    
    form button { padding: 14px; border: none; border-radius: 8px; background: #f39c12; color: white; font-size: 18px; cursor: pointer; transition: 0.3s; width: 100%; }
    form button:hover { background: #d68910; }
    
    .btn-group { display: flex; gap: 10px; }
    .btn-cancel { background: #e74c3c; width: 100%; }
    .btn-cancel:hover { background: #c0392b; }

    .info-text { font-family: Arial, sans-serif; color: #666; font-size: 14px; text-align: center; margin-bottom: 10px; line-height: 1.4; }
    .alert-text { font-family: Arial, sans-serif; font-size: 14px; text-align: center; padding: 10px; border-radius: 5px; font-weight: bold; }
    .alert-text.error { background: #fadbd8; color: #78281f; }
    
    .forgot-pass { text-align: center; margin-top: 15px; }
    .forgot-pass a { color: #777; text-decoration: none; font-family: Arial; font-size: 14px; }
    .forgot-pass a:hover { color: #f39c12; text-decoration: underline; }

    /* ==========================================================================
       ANTI-CACHE NAV STRIPPER (Wrapped in media query to fix Laptop View)
       ========================================================================== */
    @media screen and (max-width: 1070px) {
        .nav-links ul, 
        .nav-links ul li {
            display: flex !important;
            flex-direction: column !important;
            align-items: stretch !important;
            width: 100% !important;
            clear: both !important;
        }

        .nav-links ul li a {
            text-align: left !important; 
            display: block !important;
            width: 100% !important;
            background: none !important; 
            background-color: transparent !important;
            border-radius: 0 !important; 
            margin: 0 !important;
            box-sizing: border-box !important;
        }

        .nav-links ul li a.book, 
        .nav-links ul li a.booktable,
        .nav-links ul li a[href*="logout"] {
            color: #f39c12 !important;
            font-weight: bold !important;
        }
    }

    /* ==========================================================================
       TABLETS & MEDIA LAYOUTS OVERRIDES (max-width: 1070px)
       ========================================================================== */
    @media screen and (max-width: 1070px) {
        .navbar {
            position: relative; 
            height: 60px;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #050b14; 
            z-index: 1005;
            box-sizing: border-box;
        }

        .menu-toggle {
            display: flex !important; 
            z-index: 1010;
        }

        .nav-links {
            position: absolute;
            top: 60px; 
            left: 0;
            width: 100%;
            background-color: #050b14;
            max-height: 0; 
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }

        .nav-links.active {
            max-height: max-content !important; 
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-links ul {
            flex-direction: column;
            align-items: stretch; 
            padding: 0;
            gap: 0;
            margin: 0; 
            width: 100%;
            display: flex;
            list-style: none;
        }

        .nav-links ul li {
            width: 100%;
            text-align: left; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.07); 
        }

        .nav-links ul li a {
            display: block;
            width: 100%;
            padding: 14px 24px;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff !important;
            text-transform: uppercase;
            text-decoration: none;
            box-sizing: border-box;
            transition: background 0.2s ease;
            border-radius: 0 !important; 
            margin: 0 !important;
            text-align: left !important;
        }

        .nav-links ul li a:hover { background-color: rgba(255, 255, 255, 0.03); }

        .nav-links ul li a.book, 
        .nav-links ul li a.booktable,
        .nav-links ul li a[href*="logout"] {
            background-color: transparent !important;
            color: #f39c12 !important; 
            font-weight: 700;
        }

        .nav-links ul li a.icon {
            background: transparent !important;
            color: #f39c12 !important;
            width: 100% !important;
            padding: 14px 24px !important;
            display: flex !important;
            align-items: center;
            gap: 8px;
        }

        .nav-links ul li a.icon::before {
            content: "Profile: "; 
            font-size: 14px;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
        }

        .menu-toggle.active .bar:nth-child(1) { transform: translateY(8px) rotate(45deg); }
        .menu-toggle.active .bar:nth-child(2) { opacity: 0; }
        .menu-toggle.active .bar:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
    }

    /* ==========================================================================
       HANDHELD SMARTPHONE OVERRIDES (max-width: 768px)
       ========================================================================== */
    @media screen and (max-width: 768px) {
        .wrap {
            padding: 20px 10px;
        }

        .log {
            width: 92vw; 
            padding: 25px 20px;
        }
        
        h2 {
            font-size: 24px;
        }

        .btn-group {
            flex-direction: column; /* Stacks Next/Cancel links sequentially vertically */
            gap: 12px;
        }

        /* Nav branding calibrations */
        .logo {
            display: flex;
            align-items: center;
            margin-left: -5px;
        }

        .logo-text a {
            color: #f39c12;
            font-size: 22px !important; 
            font-weight: bold;
            font-family: 'Birthstone', cursive;
        }

        .logo-img {
            width: 55px;
            height: auto;
        }

        .nav-links ul li a {
            padding: 12px 24px;
            font-size: 13px;
        }
        
        .nav-links ul li a.book,
        .nav-links ul li a.icon {
            padding: 12px 24px !important;
        }
    }
</style>