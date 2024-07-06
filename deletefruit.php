<?php
include 'connection.php';
if (isset($_POST['delete'])) {
    $fruit_id = $_POST['fruit_id'];
    $sql = "DELETE FROM fruits WHERE fruit_id = $fruit_id";
    mysqli_query($connection, $sql);
    echo "<script>alert('Fruit successfully deleted!')</script>";
    header('Location: dashboard.php');
}
