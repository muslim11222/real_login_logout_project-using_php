<?php 

     session_start();

     $hostname = 'localhost';
     $username = 'root';
     $password = '';
     $db_name = 'db_database';

     $conn = mysqli_connect($hostname, $username, $password, $db_name);

     if(isset($_POST['submit'])) {
          $user_email = $_POST['user_email'];
          $user_password = $_POST['user_password'];

          if(!empty($user_email) && !empty($user_password)) {
               
               $sql = "SELECT * FROM user_login WHERE user_email = '$user_email' AND user_password = '$user_password' ";

               $query = $conn->query($sql);
               if($query->num_rows> 0) {
                    $_SESSION['login'] = 'login successful';
                    header("location:deshboard.php");
               } else {
                    echo 'user not found';
               }
          }
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Page</title>
     <!-- Bootstrap css link here -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-4">

               </div>

               <div class="col-4" style="margin-top: 150px">

                    <?php 

                         if(isset($_GET['user_created'])) {
                              echo 'user_created_successfully';                    
                         }

                    ?>
                    <form action="login.php" method="POST">
                         <div class="mt-3">
                              <label class="form-label"> Email </label>
                              <input type="text" class="form-control" name="user_email" placeholder="Enter your email" required>
                         </div>

                         <div class="mt-3">
                              <label class="form-label"> Password </label>
                              <input type="password" class="form-control" name="user_password" placeholder="Enter your password" required>
                         </div>
                         <input type="submit" name="submit" value="Login" class="btn btn-primary mt-3 mb-3">
                    </form>
                    <p> Not have Account? <a href="user.php">Register Now</a> </p>

               </div>

               <div class="col-4">

               </div>
          </div>
     </div>
</body>
</html>