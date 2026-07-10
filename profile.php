<?php
session_start();
include("config.php");

// Set your correct local timezone so accurate time comparison works
date_default_timezone_set('Asia/Kolkata'); 

if(!isset($_SESSION['user_id'])){
    header("Location: auth.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$q = mysqli_query($con, "SELECT * FROM bookings WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css?v=2.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">

    <style>
        .profile {
            margin-top: 30px;
            display: flex;
            justify-content: flex-start; 
            align-items: center;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 60px;
            min-height: 100vh; 
            height: auto;      
            padding: 0 20px;
            box-sizing: border-box;
        }
        
        .wel {
            font-family: 'Birthstone', cursive;
            color: #f39c12;
            font-size: 80px;
            text-align: center;
        }
        
        .profile-heading {
            text-align: center;
            margin-top: 10px;
            font-size: 40px;
            color: #353434;
        }

        .profile-table {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-table th {
            background: #f39c12;
            color: white;
            padding: 15px;
            font-size: 18px;
            text-align: center;
        }

        .profile-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 16px;
        }

        .profile-table tr:hover {
            background: #fff8ec;
        }

        .cancel {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 16px;
            display: inline-block;
        }

        .cancel:hover {
            background: #c0392b;
        }

        /* Styling for completed/passed bookings text */
        .completed {
            color: #7f8c8d;
            font-weight: bold;
            font-style: italic;
            font-size: 14px;
        }

        .logout-btn {
            background-color: #333;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.2s;
            margin-top: 10px;
        }
        
        .logout-btn:hover {
            background-color: #555;
        }

        /* ==========================================================================
           RESPONSIVE MOBILE BREAKPOINTS
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
                max-height: max-content; 
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
            }

            .nav-links ul li a:hover {
                background-color: rgba(255, 255, 255, 0.03);
            }

            .nav-links ul li a.book, 
            .nav-links ul li a.booktable {
                background-color: transparent !important;
                color: #f39c12 !important; 
                font-weight: 700;
                width: 100% !important;
                padding: 14px 24px !important;
                border-radius: 0 !important;
                margin: 0 !important;
            }

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

            .nav-links ul li a.icon::before {
                content: "Profile: "; 
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

            .menu-toggle.active .bar:nth-child(1) { transform: translateY(8px) rotate(45deg); }
            .menu-toggle.active .bar:nth-child(2) { opacity: 0; }
            .menu-toggle.active .bar:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
        }

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
                max-height: 280px; 
            }

            .nav-links ul li a {
                padding: 10px 20px; 
                font-size: 13px;
            }
            
            .nav-links ul li a.book,
            .nav-links ul li a.icon {
                padding: 10px 20px !important;
            }

            .profile {
                min-height: 80vh; 
                height: auto !important;
                margin-top: 20px;
                gap: 10px;
            }

            .wel {
                font-size: 55px; 
            }

            .profile-heading {
                font-size: 28px;
            }

            .profile-table {
                width: 100%;
            }

            .profile-table th, 
            .profile-table td {
                padding: 10px 5px; 
                font-size: 14px;
            }

            .cancel {
                padding: 6px 10px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

    <?php include("header.php"); ?>

    <div class="profile">
        <div class="namee">
            <h2 class="wel">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></h2>
        </div>
        
        <h2 class="profile-heading">My Bookings</h2>

        <table class="profile-table">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Action</th>
            </tr>

            <?php 
            while($row = mysqli_fetch_assoc($q)){ 
                // Convert database values into a standardized timestamp format
                // Assumes $row['date'] looks like 'YYYY-MM-DD' and $row['time'] looks like 'HH:MM'
                $booking_datetime_string = $row['date'] . ' ' . $row['time'];
                $booking_timestamp = strtotime($booking_datetime_string);
                $current_timestamp = time();
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['time']); ?></td>
                <td><?php echo htmlspecialchars($row['guests']); ?></td>
                <td>
                    <?php if ($current_timestamp < $booking_timestamp) { ?>
                        <a class="cancel" href="cancel_booking.php?id=<?php echo $row['id']; ?>">
                            Cancel
                        </a>
                    <?php } else { ?>
                        <span class="completed">Completed</span>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table> <br>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>