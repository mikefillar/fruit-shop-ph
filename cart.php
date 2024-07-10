<?php
include 'connection.php';

//add to cart
if (isset($_POST['cart'])) {
    $fruit_name = $_POST['fruit_name'];
    $imageurl = $_POST['imageurl'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $price * $quantity;
    //fetch data from cart for duplicate data
    $sql = "SELECT * FROM cart WHERE fruit_name = '$fruit_name'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_fetch_row($result) > 0) {
        echo "<script> alert('Error! Fruit is already added to cart.') </script>";
        echo "<script> window.location.href='shop.php' </script>";
        // header('Location: shop.php');
    } else {;
        mysqli_query($connection, "INSERT INTO cart SET fruit_name = '$fruit_name', imageurl = '$imageurl', price = $price, quantity = $quantity");
        mysqli_query($connection, "INSERT INTO orders (fruit_name,price,quantity,total,imageurl) VALUES ('$fruit_name',$price,$quantity,$total,'$imageurl') ");
        echo "<script> alert('Fruit added to cart!') </script>";
        echo "<script> window.location.href='shop.php' </script>";
    }
}
