<?php
ob_start();
session_start();
require_once('inc/db.php');
if(isset($_POST['submit'])){
    $username= mysqli_real_escape_string($con, $_POST['matricule']);
    $password= mysqli_real_escape_string($con, $_POST['password_us']);

    $get_user="SELECT * FROM student where matricule='$username' AND password_us='$password'";
    $run_user= mysqli_query($con,$get_user);

    $check=mysqli_num_rows($run_user);
    if($check == 1){
        $_SESSION['user_name']=$username;
        echo "<script>window.open('result.php','_self') </script>";
    }else{
        echo "<script>alert('Email or Password Is not Correct') </script>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/logo.png" rel="icon" type="image/png" />
    <title>yooo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <style>
        body{
            font-family: 'Raleway',sans-serif;
        }
    </style>
    <script src="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" 
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>

  </head>
  <body>
        <div class="contaner-fluid">
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" class="" method="post">
                        <h2 class="text-dark">Please Sign In ( Student Area)</h2><hr>
                        <label class="text-dark"> Matricule</label>
                        <input type="text" class="form-control" name="matricule" placeholder="MATRICULE" required /><br>
                        <label class="text-dark">Password</label>
                        <input type="password" class="form-control" name="password_us" placeholder="PASSWORD" required /><br>
                        <div class="form-group row">
                        <button class="btn btn-dark btn-block" type="submit" name="submit">Submit</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
  </body>
</html>
 