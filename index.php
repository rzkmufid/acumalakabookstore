<?php
  session_start();
  $conn = mysqli_connect('localhost','root','','acumalaka');
  
  
  $result = mysqli_query($conn,"SELECT * FROM buku");
  
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
        <div class="container" data-bs-theme="dark">
            <a class="navbar-brand" href="#"><img src="assets/svg/logo acumalaka.svg" alt="" /></a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" color="white">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalog.php">Catalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
                <div class="hello nav-item dropdown">


                    <?php
                
                if (isset($_SESSION["login"])){
                  $id = $_SESSION['id'];
                  $resulting = mysqli_query($conn,"SELECT * FROM pelanggan WHERE idPelanggan ='$id'");
                  $get = mysqli_fetch_array($resulting);
                  echo '<a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  >';
                  echo '<img src="assets/img/2.jpg" alt="" />';
                  echo ' '.$get["namaDepan"];
                  echo '</a>';
                }else{
                  echo '<a href="login" class="btn btn-dark">Login</a>';
                  // echo '<>';
                 }
              ?>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Wishlist</a></li>
                        <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="container">
        <div class="main">
            <div class="main-left">
                <div class="image-main-left">
                    <img src="assets/svg/main-img.svg" alt="" />
                </div>
                <article>
                    <h1>Transaksi Buku dengan Cepat dan Instan.</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
                        molestiae ut optio illum deleniti culpa incidunt possimus
                        voluptatibus, sit nostrum?
                    </p>
                    <button class="btn btn-dark">Explore</button>
                </article>
            </div>
            <div class="main-right"></div>
        </div>
    </section>
    <section class="container category-section mt-5">
        <h2>Categori</h2>
        <div class="category mt-3">
            <div class="category-list sastra mt-3">
                <p>Sastra</p>
            </div>
            <div class="category-list manga mt-3">
                <p>Manga</p>
            </div>
            <div class="category-list selfImprovement mt-3">
                <p>Self Improvement</p>
            </div>
            <div class="category-list teknologi mt-3">
                <p>Teknologi</p>
            </div>
            <div class="category-list sains mt-3">
                <p>Sains</p>
            </div>
        </div>
    </section>
    <section class="container recomendasi-section mt-5">
        <h2>Rekomendasi Buku</h2>
        <div class="rekomendasi mt-3">
            <?php  
          while($user_data = mysqli_fetch_array($result)) {         
              echo '<a href="details.php?id='.$user_data['id'].'" class="rekomendasi-list">';
              echo '<img src="assets/img/'.$user_data["gambarBuku"].'" alt="" />';
              // .$user_data['name'].
              echo '<h3 class="mt-3">'.$user_data['judul'].'</h3>';
              echo '<p>Rp.'.number_format($user_data['harga']).'</p>';
              echo '</a>';
            }
        ?>
        </div>
    </section>
    <footer class="container mt-3">
        <p>Build with 💜 by Kelompok 5</p>
    </footer>
    <!-- <script src="assets/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>

</html>