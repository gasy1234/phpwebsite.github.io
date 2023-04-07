<?php

require_once "config.php";

$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err="";
if($_SERVER['REQUEST_METHOD']=="POST"){

    //CHECK IF USER NAME IS EMPTY
    if(empty(trim($_POST["username"]))){
        $username_err="username cannot be blank";
    }
    else{
        $sql="SELECT id FROM users WHERE username=?";
        $stmt=mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"s",$param_username);
            
            //set the value param username
            $param_username=trim($_POST['username']);

            //Try to execute the statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err="This username is already taken";
                     
                }
                else{
                    $username=trim($_POST['username']);
                }
            }
            else{
                echo "something went wrong";
            }
        }
        
    }
    mysqli_stmt_close($stmt);

//check for password
if(empty(trim($_POST['password']))){
    $password_err="password cannot be blank";
}
elseif(strlen(trim($_POST['password']))<10){

    $password_err="password cannot be less than 10 characters";

}
else{
    $password=trim($_POST['password']);
}
//check for confirm password field
if(trim($_POST['password'])!= trim($_POST['confirm_password'])){
    $password_err="passwords should match";
}


//If there were no errors go ahead and insert into the datebase
if(empty($username_err) && empty($pasword_err) && empty($confirm_password_err)){
  
    $sql ="INSERT INTO USERS (username,password) values (?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);
        
        //Set these parameters
        $param_username=$username;
        $param_password=password_hash($password,PASSWORD_DEFAULT);
        
        //Try to execute the query
        if(mysqli_stmt_execute($stmt)){
            header("location:login.php");
        }
        else{
            echo "something went wrong....cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);   
} 
mysqli_close($conn);
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
    <img src="https://png.pngitem.com/pimgs/s/174-1747814_php-logo-programmer-computer-software-elephant-php-logo.png" alt="" width="80" height="50">
    PHP WEBSITE      
    <a class="nav-link" href="login.php">Login</a>
    </a>
  </div>
</nav>
<div class="container">
<h2>Please Register Here</h2>
<hr>
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" >Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter username ">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password"id="exampleInputPassword1" placeholder="Password should be more than 10 characters">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="pa
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">I AGREE TO THE TERMS AND CONDITIONS</label>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
    
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








