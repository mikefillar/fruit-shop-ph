<?php
include 'connection.php';
$message = '';
$style = '';
if (isset($_POST['add'])) {
    $fruit_name = trim($_POST['fruit_name']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);
    $imageurl = $_FILES['imageurl']['name'];
    //temporary image
    $imageurltemp = $_FILES['imageurl']['tmp_name'];
    //imagefolder
    $imagefolder = 'src/img/' . $imageurl;
    $sql = "SELECT * FROM fruits WHERE fruit_name = '$fruit_name'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
    if ($row[0] > 0) {
        $message = 'Fruit existed!';
        $style = 'bg-red-500 text-white';
        echo "<script>window.location.href = 'addfruit.php'</script>";
    } else {
        $sql = "INSERT INTO fruits SET fruit_name = '$fruit_name', price = $price, quantity = $quantity, imageurl = '$imageurl'";
        mysqli_query($connection, $sql);
        move_uploaded_file($imageurltemp, $imagefolder);
        echo "<script>alert('Fruit successfully created.')</script>";
        echo "<script>window.location.href = 'dashboard.php'</script>";
    }
}
