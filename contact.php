<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css?v=20.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Birthstone&display=swap" rel="stylesheet">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'; ?>



    <section class="contact">

  <!-- LEFT SIDE -->
  <div class="contact-info">

    <h2>Contact Info</h2>

    <div class="info-box">
      <h4>📍 Address Location</h4>
      <p>Plot no.100, The Mall Rd, opp. Kunal Tower, Civil Lines, Ludhiana, Punjab 141001</p>
    </div>

    <div class="info-box">
      <h4>🕒 Open Time</h4>
      <p>Mon - Sun | 12:00 AM - 11:30 PM</p>
    </div>

    <div class="info-box">
      <h4>📞 Phone Number</h4>
      <p>+91 98720 11111</p>
    </div>

  </div>

  <!-- RIGHT SIDE FORM -->
  <div class="contact-form">

    <h2>Contact Form</h2>

    <form method="POST">

    <input type="text" placeholder="Your Name*" name="cname">
    <input type="email" placeholder="Email" name="cemail">
    <input type="tel" placeholder="Phone*" name="cphone">
    <textarea placeholder="Message" name="cmessage"></textarea>

    <button type="submit" name="ok">Submit</button>

</form>

  </div>

</section>
    <?php
        include 'config.php';
        if(isset($_POST['ok'])){
            $name=$_POST['cname'];
            $email=$_POST['cemail'];
            $phone=$_POST['cphone'];
            $message=$_POST['cmessage'];

            $insert=mysqli_query($con,"INSERT INTO contact(name,email,phone,message) VALUES('$name','$email','$phone','$message')");
            if($insert){
                echo "<script>alert('Message Sent Successfully');</script>";
            }
            else{
                echo "<script>alert('Message Not Sent');</script>";
            }
        }
        ?>



    <?php include 'footer.php'; ?>
</body>
</html>