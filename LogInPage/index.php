<?php 
require 'DBconfig/config.php';
session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <title>Sign-Up/Login Form</title>

<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css" />

 </head>

 <body>
 <form class="myform" action="index.php" method="post">
      

  <div class="form">

            <img src="imgs/logo.jpg"><br><br>
            <p> HAving is an app to bridge oieharoirheair </p><br>


          <form action="/" method="post">
            <input name="email" type="email" class="inputvalues" placeholder="Email" required/><br>
            <input name="password" type="password" class="inputvalues" placeholder="Password" required/><br>   <br>

          <input name="login" type="submit" id="btn" value="Log in!"/>
          </form><br><br>

          Don't have an account? Click <a href=register.php>here</a> to sign up!
      </div>

      <?php 
      if (isset($_POST['login']))   {
          $email=$_POST['email'];
          $password=$_POST['password'];

          $query="select * from userinfotable WHERE email='$email' AND password='$password'";

          $query_run = mysqli_query($con, $query);

          if (mysqli_num_rows($query_run)>0) {
            //if the user and password set exist in the current database
            $_SESSION['email']=$email;
            header('location:homepage.php');

          }
          else {
            echo '<script type="text/javascript"> alert("Invalid. Please register.") </script>';
          }
        }


      ?>


     
 </body>
 </html>