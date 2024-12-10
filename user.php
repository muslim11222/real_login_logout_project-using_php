<?php 
     $hostname = 'localhost';
     $username = 'root';
     $password = '';
     $db_name = 'db_database';

     $conn = mysqli_connect($hostname, $username, $password, $db_name);

     if(isset($_POST['submit'])) {
          $user_first_name = $_POST['user_first_name'];
          $user_last_name = $_POST['user_last_name'];
          $user_email = $_POST['user_email'];
          $user_password = $_POST['user_password'];
          $user_password_again = $_POST['user_password_again'];


          if(!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again)){
               $sql = "INSERT INTO user_login (user_first_name, user_last_name, user_email, user_password) VALUES ('$user_first_name','$user_last_name', '$user_email','$user_password')";

               if($conn->query($sql) == true) {
                    header("location:login.php?user_created");
               } else {
                    echo "mysqli_error";
               }
          } else {
               echo 'error';
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

               <div class="col-4" style="margin-top: 40px">

                    <form action="user.php" method="POST">

                         <div class="mt-3">
                              <label class="form-label"> First Name </label>
                              <input type="text" class="form-control" name="user_first_name" value="<?php if(isset($_POST['submit'])) {echo $user_first_name;} ?>" placeholder="Enter your first name" required>
                         </div>

                         <div class="mt-3">
                              <label class="form-label"> Last Name </label>
                              <input type="text" class="form-control" name="user_last_name" value="<?php if(isset($_POST['submit'])) {echo $user_last_name;} ?>" placeholder="Enter your last name" required>
                         </div>

                         <div class="mt-3">
                              <label class="form-label"> Email </label>
                              <input type="text" class="form-control" name="user_email" value="<?php if(isset($_POST['submit'])) {echo $user_email;} ?>" placeholder="Enter your email" required>
                         </div>

                         <div class="mt-3">
                              <label class="form-label"> Password </label>
                              <input type="password" class="form-control" name="user_password" placeholder="Enter your password" required>
                         </div>

                         <div class="mt-3">
                              <label class="form-label"> Password Again </label>
                              <input type="password" class="form-control" name="user_password_again" placeholder="Enter your password" required>
                         </div>

                         <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">

                    </form>
                    <p>Have An Account? <a href="login.php">Login</a> </p>

               </div>

               <div class="col-4">

               </div>
          </div>
     </div>
</body>
</html>