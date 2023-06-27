<?php
    	session_start();
        $koneksi = mysqli_connect('localhost','root','','acumalaka');
        $idBuku = $_POST['idBuku'];
        $jumlahBuku = $_POST['jumlah'];

        $sql = "SELECT * FROM buku WHERE id = ".$idBuku;
        echo $sql;
        $query = mysqli_query($koneksi, $sql);

        $hasil = mysqli_fetch_object($query);
        echo  $hasil->judul;
        // echo  $hasil["judul"];

        $_SESSION["cart"][$idBuku] = [
            "id" => $idBuku,
            "judul" => $hasil->judul,
            "pengarang" => $hasil->pengarang,
            "penerbit" => $hasil->penerbit,
            "gambar" => $hasil->gambarBuku,
            "harga" => $hasil->harga, 
            "stok" => $hasil->stok,
            "jumlah" => $jumlahBuku
        ];

        // $_SESSION['data']['judul'] = $hasil->judul;
        // $_SESSION['data']['harga'] = $hasil->harga;

        header("location:cart.php");
?>