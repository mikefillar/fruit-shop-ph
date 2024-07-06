<?php
include 'connection.php';

$_SESSION['status'] = 'invalid';
unset($_SESSION['first_name']);
mysqli_close($connection); //closing database
session_destroy(); //closing session
header('Location: admin.php');
