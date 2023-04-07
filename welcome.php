<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true){
header("location:login.php");
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP Login system!</title>
  </head>
  <body>
 <nav class="navbar sticky-top navbar-light bg-light">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="https://png.pngitem.com/pimgs/s/174-1747814_php-logo-programmer-computer-software-elephant-php-logo.png" alt="" width="80" height="60">
    PHP WEBSITE 
    <ul class="nav justify-content-end">
     <li class="nav-item">
      <a class="navbar-brand" aria-current="page" href="#">
        <img src="https://cdn.iconscout.com/icon/free/png-256/user-1909-879837.png?f=avif&w=128" alt="" width="70" height="50"> <?php echo $_SESSION['username']?>
    </a>
     </li>
    </ul>
   </div>
  </nav>
  <div class="container mt-4">
  <p class="text-center fs-1"><?php echo "Welcome ". $_SESSION['username']?>!</p>  
  <p class="text-center fs-1">You can now use this website</p>  
  <div class="d-grid gap-2 col-6 mx-auto" >
  <a class="btn btn-primary me-md-2" href="logout.php" role="button" >logout</a>
</div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>