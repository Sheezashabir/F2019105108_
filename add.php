<?php
include('connection.php');
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $userId = $_SESSION['id'];

        if($quantity < 10 || $price > 1000){
            echo "Invalid Details";
        }
        else{
            $result = mysqli_query($connection , "INSERT INTO product
  (Name , Price , Quantity , UserId) VALUES ('$name' , '$price' , '$quantity' , '$userId' )")
            or die("data Not Inserted");

            if(!empty($result)){
                header('Location:view.php');
            }



        }

    }

    else{

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form name="myForm" method="post" action="">

    Enter Name<input type="text" name="name" required></br>
    Enter Price <input type="number" name="price" required></br>
    Enter Quantity <input type="number" name="quantity" required></br>
    <input type="submit" value="Add Product" name="submit">
<!--    <button name="submit" value="New Product"-->

</form>

</body>
</html>
<?php } ?>