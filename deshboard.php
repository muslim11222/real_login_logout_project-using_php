<?php 

session_start();

if(!empty($_SESSION['login'])) {
     echo $_SESSION['login'];
} else {
     header("location:user.php");
}


?>
<a href="user.php">Logout</a>