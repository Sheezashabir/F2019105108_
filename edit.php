<?php

include ('connection.php');

$id = $_GET['id'];
echo $id;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $res = mysqli_query($connection , "UPDATE product SET Name = '$name' , Price = '$price '
       , Quantity = '$quantity' WHERE Id = '$id'");

    if(!empty($res)){
        echo "Data Updated Successfully";
        header('Location:view.php');
    }
}


$result = mysqli_query($connection , "SELECT * FROM product WHERE Id = '$id'");
$row = mysqli_fetch_assoc($result);

if(!empty($row)){
    $name = $row['Name'];
    $price = $row['Price'];
    $quantity = $row['Quantity'];

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>

    <form name="myForm" method="post" action="">

        Enter Name<input value="<?php echo $name ?>" type="text" name="name" required></br>
        Enter Price <input value="<?php echo $price  ?>" type="number" name="price" required></br>
        Enter Quantity <input value="<?php echo $quantity ?>" type="number" name="quantity" required></br>
        <input type="submit" value="Update Product" name="submit">
        <!--    <button name="submit" value="New Product"-->

    </form>

    </body>
    </html>
<?php } ?>


