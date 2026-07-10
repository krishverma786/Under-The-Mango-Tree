<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: auth.php");
    exit();
}

// 1. Get the parameters safely
$id = mysqli_real_escape_string($con, $_GET['id']);
$user_id = $_SESSION['user_id'];

// 2. ONLY delete if BOTH the booking ID AND user_id match!
mysqli_query($con, "DELETE FROM bookings WHERE id='$id' AND user_id='$user_id'");

header("Location: profile.php");
exit();
?>