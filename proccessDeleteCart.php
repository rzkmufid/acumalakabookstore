<?php
    session_start();
    $koneksi = mysqli_connect('localhost','root','','acumalaka');
    
    $id = $_GET['id'];

    unset($_SESSION["cart"][$id]);
    header("location:cart.php");
?>