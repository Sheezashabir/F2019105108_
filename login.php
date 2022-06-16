

<?php
session_start();
include ('connection.php');

if(isset($_POST['submit'])){
    $email = $_POST['userEmail'];
    $pass = $_POST['userPass'];

    if($email == '' ||$pass == ''){
        echo "One of the Field is missing or Empty";
    }
    else{
        $result = mysqli_query($connection , "SELECT * FROM users WHERE
          Email = '$email' AND Password = md5('$pass')");

        $row = mysqli_fetch_assoc($result);
        if(is_array($row)){
            $name = $row['Name'];
            $email = $row['Email'];
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $row['Id'];
            if(isset($_SESSION['name'])){
                header('Location:profile.php');
            }

            echo "Succeffully Login".$email;
        }
        else{
            echo "Invalid Email or Password";
        }

    }
}
else{ ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>

    </head>
    <body>

    <form name="myForm" method="post" action="">

        Enter User Email <input type="email" name="userEmail" required></br>
        Enter User Password <input type="password" name="userPass" required></br>
        <input type="submit" value="Create Account" name="submit">

    </form>

    </body>
    </html>

<?php }  ?>



