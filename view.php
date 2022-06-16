<?php

echo "ALL PRODUCTS</br>";

echo "<a href='logout.php'>Logout</a>";
include ('connection.php');
session_start();
$userId = $_SESSION['id'];

$query = "SELECT * FROM product WHERE UserId  = '$userId'";
$result = mysqli_query($connection , $query);
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            table ,tr ,th, td{
                border:  2px solid blue;
            }
        </style>
        <meta charset="UTF-8">
        <title>Title</title>

    </head>
    <body>

    <table width="70%">

        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
<?php
while($row = mysqli_fetch_assoc($result)){
        echo  "<tr>";
        echo  "<td>$row[Name]</td>";
        echo  "<td>$row[Price]</td>";
        echo  "<td>$row[Quantity]</td>";
        echo  "<td><a href='edit.php?id=$row[Id]'>Update Record</a></td>";
        echo  "</tr>";
}
?>





    </table>

</form>

</body>
</html>

