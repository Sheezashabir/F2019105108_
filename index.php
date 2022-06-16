<?php
session_start();

if(isset($_SESSION['id'])){
    header('Location:profile.php');
}
echo "<a href='register.php'>Create New Account</a></br>";
echo "<a href='login.php'>Login to Your Account</a></br>";