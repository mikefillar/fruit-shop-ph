<?php
include 'connection.php';
if (isset($_POST['update'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE cart SET quantity = $quantity WHERE cart_id = $cart_id";
    mysqli_query($connection, $sql);
    echo "<script>alert('Cart updated!')</script>";
    echo "<script>window.location.href= 'viewcart.php';</script>";
}
