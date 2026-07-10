<?php
session_start();
include("config.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css?v=25.0">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">
<?php

include("config.php");
if (isset($_POST['login'])) {
    // Wrap inputs to escape malicious characters
    $email = mysqli_real_escape_string($con, $_POST['login_email']);
    $password = md5($_POST['login_password']); // Note: md5 is old, but this secures the SQL string
    
    $q = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($q) > 0) {
        $row = mysqli_fetch_array($q);
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        header("location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username/Password');</script>";
    }
}

?>

<?php

include("config.php");

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");
    echo "<script>alert('Registration Successful');</script>";
}

?>

<link rel="stylesheet" href="style.css">

<?php 
include("header.php");
?>

<section class="auth-section">
<div class="container">
<div class="toggle">
    <button id="loginToggleBtn" class="toggle-btn active" onclick="showLogin()">Login</button>
    <button id="registerToggleBtn" class="toggle-btn" onclick="showRegister()">Register</button>
</div>

<form method="POST" id="loginForm" class="login-form active">
    <h2>Login</h2>
    <input type="email" name="login_email" placeholder="Enter your email" required>
    <input type="password" name="login_password" placeholder="Enter your password" required>
    <button type="submit" name="login">Login</button>
    <div class="forgot-pass">
            <a href="forgot-password.php">Forgot Password?</a>
        </div>

</form>

<form method="POST" id="registerForm" class="register-form">
    <h2>Register</h2>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" minlength="8" required>
    <button type="submit" name="register">Register</button>
</form>
</div>
</section>

<?php include ("footer.php");
?>

<style>
body {
    margin: 0;
}

/* ==========================================================================
   DESKTOP AUTHENTICATION GRAPHICS & CONTEXT CONTAINERS
   ========================================================================== */
.auth-section {
    min-height: calc(100vh - 60px); 
    background: linear-gradient(
        rgba(0,0,0,0.5),
        rgba(0,0,0,0.5)
    ),
    url("28.jpg");
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
    box-sizing: border-box;
}

.container {
    width: 420px; 
    max-width: 100%;
    padding: 30px;
    background: white; 
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    box-sizing: border-box;
}

/* Toggle Buttons */
.toggle {
    display: flex;
    margin-bottom: 25px;
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #ddd;
}

.toggle-btn {
    flex: 1;
    padding: 14px;
    border: none;
    cursor: pointer;
    background: #f5f5f5;
    font-size: 18px;
    transition: 0.3s;
    color: #333;
}

.toggle-btn.active {
    background: #f39c12;
    color: white;
}

/* Forms Visibility Toggle Engine */
.login-form,
.register-form {
    display: none;
    flex-direction: column;
    gap: 15px;
}

.login-form.active,
.register-form.active {
    display: flex;
}

form h2 {
    text-align: center;
    color: #333;
    margin-bottom: 15px;
    font-size: 28px;
}

form input {
    padding: 14px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: 0.3s;
    width: 100%;
    box-sizing: border-box;
}

form input:focus {
    border-color: #f39c12;
    box-shadow: 0 0 8px rgba(243,156,18,0.4);
}

/* Main Form Buttons */
form button[type="submit"] {
    padding: 14px;
    border: none;
    border-radius: 8px;
    background: #f39c12;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s;
    width: 100%;
}

form button[type="submit"]:hover {
    background: #d68910;
    transform: translateY(-2px);
}

.forgot-pass {
    text-align: center;
    margin-top: 15px;
}

.forgot-pass a {
    color: #777;
    font-size: 14px;
    text-decoration: none;
    transition: 0.2s;
    font-family: Arial, sans-serif;
}

.forgot-pass a:hover {
    color: #f39c12;
    text-decoration: underline;
}

/* ==========================================================================
   ANTI-CACHE SPECIFIC NAV STRIPPER (Wrapped in media query to fix Laptop View)
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
   GLOBAL TABLET & LAPTOP MOBILE OVERRIDES (max-width: 1070px)
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

    .nav-links ul li a:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

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
   HANDHELD MOBILE SMARTPHONE OVERRIDES (max-width: 768px)
   ========================================================================== */
@media screen and (max-width: 768px) {
    .auth-section {
        padding: 20px 10px;
    }

    .container {
        width: 92vw; 
        padding: 25px 20px;
    }

    form h2 {
        font-size: 24px;
    }

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

<script>
function showLogin() {
    document.getElementById("loginForm").classList.add("active");
    document.getElementById("registerForm").classList.remove("active");
    document.getElementById("loginToggleBtn").classList.add("active");
    document.getElementById("registerToggleBtn").classList.remove("active");
}

function showRegister() {
    document.getElementById("registerForm").classList.add("active");
    document.getElementById("loginForm").classList.remove("active");
    document.getElementById("registerToggleBtn").classList.add("active");
    document.getElementById("loginToggleBtn").classList.remove("active");
}
</script>