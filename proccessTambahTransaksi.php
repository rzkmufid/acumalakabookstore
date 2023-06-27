<?php
    session_start();
    $koneksi = mysqli_connect('localhost','root','','acumalaka');
    date_default_timezone_set("Asia/Jakarta");
    $TIME = date("h:i:s");
    $DATE = date("y-m-d");

    $DATA = $DATE.' '.$TIME;
    $sql = "INSERT INTO payment (date) values ('".$DATA."')";
    $query = mysqli_query($koneksi, $sql);
    $id_transaksi = mysqli_insert_id($koneksi);
    
    foreach($_SESSION["cart"] as $cart => $val){
        $sql = "INSERT INTO detailpayment values ('','".$id_transaksi."','".$val['id']."','".$_SESSION['id']."','".$val['jumlah']."')";
        $query = mysqli_query($koneksi, $sql);
        $fixStok = $val["stok"] - $val["jumlah"];
        $updateBuku = "UPDATE buku SET stok ='".$fixStok."' WHERE id='".$val['id']."'";
        mysqli_query($koneksi, $updateBuku);
    }

    unset($_SESSION["cart"]);
    header("location:cart.php");

?>