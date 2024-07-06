<?php
include 'connection.php';
include 'session.php';
$email = $_POST['email'];
$password = $_POST['password'];
//confirming email and passowrd
$sql = "SELECT * FROM accounts WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$first_name = $row['first_name'];
if ($row['password'] !== $password) {
    echo "<script>alert('Email or password is incorrect. Try again!')</script>";
    echo "<script>window.location.href = 'admin.php'</script>";
} else {
    $_SESSION['first_name'] = $first_name;
    $_SESSION['status'] = 'valid';
    echo "<script>window.location.href = 'dashboard.php'</script>";
}
