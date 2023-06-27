<?php
session_start();
if (!isset($_SESSION["login"]) == true){
    header("location:../login");
    exit;
}else if ($_SESSION['level'] == 'user'){
    header("location:../");
    exit;
}
    $koneksi = mysqli_connect('localhost','root','','acumalaka');
    $query = "SELECT  payment.idPayment, pelanggan.idPelanggan, pelanggan.username , pelanggan.namaDepan as 'Nama Pelanggan', buku.judul, buku.gambarBuku,buku.harga, detailpayment.jumlah ,payment.date
    FROM detailpayment
    INNER JOIN payment
    ON detailpayment.idPayment = payment.idPayment
    INNER JOIN pelanggan
    ON detailpayment.idUser = pelanggan.idPelanggan
    INNER JOIN buku
    ON detailpayment.idBuku = buku.id;
    ";
    $result = mysqli_query($koneksi, $query); 
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <h1>Laporan Transaksi Pembelian Buku</h1>

<table class="table ">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Transaksi</th>
        <th scope="col">Nama User</th>
        <th scope="col">Judul Buku</th>
        <!-- <th scope="col">Cover Buku</th> -->
        <th scope="col">Jumlah</th>
        <th scope="col">Total Pembayaran</th>
        <th scope="col">Tanggal Transaksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;  
    $grandTotal = 0;
    while ($row = mysqli_fetch_assoc($result)): 
            $total= $row["harga"] * $row["jumlah"];
            $grandTotal += $total;
        ?>
    <tr>
      <th scope="row"><?= $i?></th>  
      <td><?= $row["idPayment"]; ?></td>
        <td><?= $row["Nama Pelanggan"]; ?></td>
        <td><?= $row["judul"]; ?></td>
        <!-- <td><img width="100" src="../assets/img/<?= $row["gambarBuku"]; ?>" alt=""></td> -->
        <td><?= $row["jumlah"]; ?></td>
        <td>Rp. <?= number_format($total) ?></td>
        <td><?= $row["date"]; ?></td>
    </tr>
    <?php $i++; endwhile; ?>
    <tr>
        <th colspan="5">TOTAL</th>
        <th>Rp. <?= number_format($grandTotal)?></th>
        <th></th>
    </tr>
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script>
        window.print();
    </script>
</body>

</html>