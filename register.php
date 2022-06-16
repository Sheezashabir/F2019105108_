

<?php

include ('connection.php');

if(isset($_POST['submit'])){
    $email = $_POST['userEmail'];
    $pass = $_POST['userPass'];
    $name = $_POST['userName'];
    $phone = $_POST['userPhone'];

    if($email == '' ||$pass == '' ||$name == '' ||
        $phone == '' || strlen($name) < 6){
        echo "One of the Field is missing or Empty";
    }
    else{
        $result = mysqli_query($connection , "INSERT INTO users (Email , Password , Phone , Name)
        VALUE ('$email' , md5('$pass') , '$phone' , '$name')")
        or die("Unable to Insert Data");

        header('Location: index.php');


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
    Enter User Phone <input type="number" name="userPhone" required></br>
    Enter User Name <input type="text" name="userName" required></br>
    <input type="submit" value="Create Account" name="submit">

</form>

</body>
</html>

<?php }  ?>



