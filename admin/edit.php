<?php
$conn = mysqli_connect('localhost','root','','acumalaka');
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'"); 
session_start();
if (!isset($_SESSION["login"]) == true){
    header("location:../login");
    exit;
}else if ($_SESSION['level'] == 'user'){
    header("location:../");
    exit;
}

if (isset($_POST["Edit"]))
    {
        $judul=$_POST["judul"];
        $kategori=$_POST["kategori"];
        $penerbit=$_POST["penerbit"];
        $pengarang=$_POST["pengarang"];
        $halaman=$_POST["halaman"];
        $tanggalTerbit=$_POST["tanggalTerbit"];
        $berat=$_POST["berat"];
        $panjang=$_POST["panjang"];
        $lebar=$_POST["lebar"];
        $deskripsi=$_POST["deskripsi"];
        $harga=$_POST["harga"];
        $filename=$_FILES['gambarBuku']['name'];
        $stok=$_POST["stok"];

        $filetmpname=$_FILES['gambarBuku']['tmp_name'];
        $folder='../assets/img/';
        move_uploaded_file($filetmpname,$folder.$filename);
        // $harga=$_POST["harga"];

        $q="UPDATE buku SET judul ='$judul', kategori = '$kategori', penerbit = '$penerbit', pengarang = '$pengarang', halaman = '$halaman', tanggalTerbit = '$tanggalTerbit', berat = '$berat', panjang = '$panjang', lebar = '$lebar', deskripsi = '$deskripsi', harga = '$harga', gambarBuku = '$filename', stok = '$stok' WHERE id='$id'";
        mysqli_query($conn,$q);

        if(mysqli_affected_rows($conn)>0){
            // echo "<script>
            //     alert('Data Berhasil Disimpan');
            //     document.location.href='buku.php';
            // </script>" ;
        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | General Form Elements</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
	<!-- Theme style -->

    <link rel="stylesheet" href="https://kit.fontawesome.com/be8f875c1c.css" crossorigin="anonymous">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- <link rel="stylesheet" href="../style.css"> -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
			<img src="dist/img/user1-128x128.jpg" style="width: 30px;" alt="User Avatar" class="mr-2 img-circle">
			<?php echo $_SESSION['level']; ?>
          <!-- <i class="far fa-user"></i> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="../logout.php" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Logout
                  <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                </h3>
                <p class="text-sm">Keluar dari Akun</p>
                <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
     
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['level']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./" class="nav-link">
              <i class="nav-icon fas fa-tachometer"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
               <li class="nav-item">
            <a href="daftar.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tambah Pengguna
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Management Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
            <a href="buku.php" class="nav-link active">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Catalog Buku
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="tambah.php" class="nav-link">
              <i class="nav-icon fas fa-add"></i>
              <p>
                Tambah Catalog Buku
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
		   <li class="nav-item">
            <a href="transaksi.php" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan 
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Buku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home Admin</a></li>
              <li class="breadcrumb-item active">Edit Buku</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<div class="container-fluid">
<form action="" method="post" enctype="multipart/form-data">
<table class="container-fluid">
        <tr>
            <td>Judul buku</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="judul" value="<?php echo $row["judul"]; ?>"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="kategori" value="<?php echo $row["kategori"]; ?>"></td>
        </tr><tr>
            <td>Penerbit</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="penerbit" value="<?php echo $row["penerbit"]; ?>"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="pengarang" value="<?php echo $row["pengarang"]; ?>"></td>
        </tr>
        <tr>
            <td>Halaman</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="halaman" value="<?php echo $row["halaman"]; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal terbit</td>
            <td>:</td>
            <td><input class="form-control" type="date" name="tanggalTerbit" value="<?php echo $row["tanggalTerbit"]; ?>"></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="berat" value="<?php echo $row["berat"]; ?>"></td>
        </tr>
        <tr>
            <td>Panjang</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="panjang" value="<?php echo $row["panjang"]; ?>"></td>
        </tr>
        <tr>
            <td>Lebar</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="lebar" value="<?php echo $row["lebar"]; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>:</td>
            <td><textarea class="form-control" name="deskripsi" id="" cols="50" rows="12" placeholder=""><?php echo $row["deskripsi"]; ?></textarea></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="harga" value="<?php echo $row["harga"]; ?>"></td>
        </tr>
        <tr>
            <td>Gambar Buku</td>
            <td>:</td>
            <td><img width="100" 
            src="../assets/img/<?= $row['gambarBuku']; ?>" alt=""><br>
            <input class="form-control" type="file" name="gambarBuku"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="stok" value="<?= $row["stok"]; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit" style="float: right;" class="mt-5 mb-5 btn btn-primary" name="Edit">Editkan Lee</button>
                <a href="buku.php" type="submit" style="float: right;" class="mt-5 mr-2 mb-5 btn btn-secondary" name="Edit">Back</a>
            </td>
        </tr>
    </table>
</form>
</div>
<?php  endwhile; ?>
 
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="https://kit.fontawesome.com/be8f875c1c.js" crossorigin="anonymous"></script>
</body>

</html>