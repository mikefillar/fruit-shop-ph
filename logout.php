<?php
include 'connection.php';
session_start();

$_SESSION['status'] = 'invalid';
unset($_SESSION['first_name']);
header('Location: admin.php');
mysqli_close($connection); //closing database
session_destroy(); //closing session
