<?php

$conn = mysqli_connect('localhost','root','','ukhil') or die('connection failed');

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $date = $_POST['date'];

   $insert = mysqli_query($conn, "INSERT INTO `appointment`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

   if($insert){
      $message[] = 'appointment made successfully!';
   }else{
      $message[] = 'appointment failed';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ukille Khujee
   </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center justify-content-between">

         <a href="#home" class="logo">Ukille<span>Khuje.</span></a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#reviews">reviews</a>
            <a href="#contact">contact</a>
         </nav>

         
         <a href="../login.php" class="link-btn">Admin Login
         </a>
         <a href="../View/login.php" class="link-btn">Civil Lawyer Login
         </a>
         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

   </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row min-vh-100 align-items-center">
         <div class="content text-center text-md-left">
            <h3>let us Take Care About Your Legal activities</h3>
            <p>A Trasted and easy way to  do the legal  work</p>
            <a href="#contact" class="link-btn">make appointment</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">

         <div class="col-md-6 image">
            <img src="images/about-img.jpg" class="w-100 mb-5 mb-md-0" alt="">
         </div>

         <div class="col-md-6 content">
            <span>about us</span>
            <h3>True Service For Your Protection</h3>
            <p>We must hire lawyers for various legal works. For example, car accident cases, land issues, taxation etc. But in Bangladesh it is very difficult to hire lawyers.
                We must go to the courts or chambers of the lawyers to hire them. But it comes with very high fees and sometimes there is a shortage of time and lawyers also. 
                For that reason, sometimes poor people cannot afford it. This problem is so important to consider because there are a lot of hassles in legal work in Bangladesh.
               It costs people valuable time and money. Sometimes due to ignorance and not consulting a proper lawyer people have to deal with many problems.
               Often, they fall victim to unwanted circumstances. </p>
            
         </div>

      </div>

   </div>

</section>

<!-- about section ends -->

<!-- services section starts  -->

<section class="services" id="services">

   <h1 class="heading">our services</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/icon-1.svg" alt="">
         <h3>Criminal specialist</h3>
         <p> Criminal specialists may also provide expert testimony in court proceedings and provide advice to law enforcement agencies.</p>
      </div>

      <div class="box">
         <img src="images/icon-2.svg" alt="">
         <h3>Civil Lawyer specialist</h3>
         <p>Civil lawyers may also provide advice on a variety of legal matters, such as contracts,
             real estate transactions, business formation, and other matters. 
            They may also draft legal documents, such as wills and trusts.</p>
      </div>

      <div class="box">
         <img src="images/icon-3.svg" alt="">
         <h3>subscription Plans</h3>
         <p>choice subscription for Solve you legal Issue</p>
      </div>
      
      <div class="box">
         <img src="images/icon-5.svg" alt="">
         <h3>Live Intraction advisory</h3>
         <p>24/7 Live client Service</p>
      </div>
   </div>

</section>

<!-- services section ends -->

<!-- process section starts  -->

<section class="process">

   <h1 class="heading">work process</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/process-1.png" alt="">
         <h3>Login/Signup</h3>
         <p>Login For Explore More Feature</p>
      </div>

      <div class="box">
         <img src="images/process-2.png" alt="">
         <h3>search Ukile</h3>
         <p>Look For Your Reated ukile on our site</p>
      </div>

      <div class="box">
         <img src="images/process-3.png" alt="">
         <h3>Take Service and Leave review </h3>
         <p>take a subscriptions and make your Work done</p>
      </div>

   </div>

</section>

<!-- process section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> satisfied clients </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>They make my life too easy,and it's Time efficent and easy to do .and they treat me like a family </p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Pranta Das</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>I am so pleased with the service I received from your company. The staff was friendly and helpful, and the product was exactly what I was looking for. I will definitely be recommending your company to my friends and family. Thank you for your excellent service!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Meem Mizbah</h3>
         <span>satisfied client</span>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>I'm so glad I found Ukile! Their website is easy to use and their customer service is top-notch. They have a great selection of products and their prices are very competitive. I highly recommend Ukile for anyone looking for quality Service at a great price.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Salman</h3>
         <span>satisfied client</span>
      </div>

   </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <h1 class="heading">make appointment</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <?php 
         if(isset($message)){
            foreach($message as $message){
               echo '<p class="message">'.$message.'</p>';
            }
         }
      ?>
      <span>your name :</span>
      <input type="text" name="name" placeholder="enter your name" class="box" required>
      <span>your email :</span>
      <input type="email" name="email" placeholder="enter your email" class="box" required>
      <span>your number :</span>
      <input type="number" name="number" placeholder="enter your number" class="box" required>
      <span>appointment date :</span>
      <input type="datetime-local" name="date" class="box" required>
      <input type="submit" value="make appointment" name="submit" class="link-btn">
   </form>  

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p>+123-999-666</p>
         <p>+111-222-333</p>
      </div>
      
      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p>Bashundhura,Dhaka</p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p>00:07am to 10:00pm</p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p>Salman00hossain@gmail.com</p>
         <p>Pranta@gmail.com</p>
      </div>

   </div>

   <div class="credit"> &copy; copyright @ <?php echo date('Y'); ?> by <span>Ukile Khuje</span>  </div>

</section>

<!-- footer section ends -->










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>