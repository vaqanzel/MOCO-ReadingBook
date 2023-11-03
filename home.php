<?php
include "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
  <title>MOCO - Reading Digital Book</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" type="image/png" href="./assets/img/trans-profile-1.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="blog-author bg-gray-200">

  <!-- Navbar Light -->
<nav
  class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="" rel="tooltip" title="Designed by MOCO" data-placement="bottom" target="_blank">
    <h2 class="fs-4" style="color : #4ABDAC;">MOCO.</h2>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav navbar-nav-hover mx-auto">
      <li class="nav-item px-3">
          <a class="nav-link font-weight-bold" href="">
            Home
          </a>
        </li>
      <li class="nav-item dropdown dropdown-hover">
      <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center font-weight-bold" id="dropdownMenuPages8" data-bs-toggle="dropdown" aria-expanded="false">
       <i class="material-icons opacity-6 me-2 text-md"></i>
              Genre
              <img src="assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-2 d-lg-block d-none">
            </a>
            <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages8">
              <div class="d-none d-lg-block">
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                  Genre
                </h6>
                <a href="genreromantis.php" class="dropdown-item border-radius-md">
                  <span>Romantis</span>
                </a>
                <a href="genrefiksi.php" class="dropdown-item border-radius-md">
                  <span>Fiksi</span>
                </a>
                <a href="genrefantasi.php" class="dropdown-item border-radius-md">
                  <span>Fantasi</span>
                </a>
                <a href="genrehoror.php" class="dropdown-item border-radius-md">
                  <span>Horor</span>
                </a>
                <a href="genremisteri.php" class="dropdown-item border-radius-md">
                  <span>Thriller/Misteri</span>
                </a>
                </div>
            </div>
          </li>   
      </ul>

      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <a href="logout.php" class="btn bg-gradient-dark mb-0">Logout</a>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->


</div>
  <!--Jumbotron area-->
  <header>
  <div class="bg-light">
      <div class="container-fluid min-height-500 py-7 p-8 mt-6" style="background-image: url('./assets/img/cover-1.png')">
        <h1 class="display-5 fw-bold" style="color : #000000;">Hi, we're <span style="color : #4ABDAC">MOCO.</h1>
        <p class="col-md-8 fs-4">E-Book Gratis. Mari membaca!</p>
      </div>
    </div>
  </header>

  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="position-relative">
    <div class="container">
      <div class="section text-center mb-5 mt-6">
        <h3 class="title" style="color : #000000;">Buku Terbaru</h3>
        </div>
      </div>
      
      <!-- Buku Terbaru -->
      <?php
      include "koneksi.php";
      $qnew = mysqli_query($con, "SELECT * FROM `buku` LEFT JOIN tgambar
      ON buku.id_buku =  tgambar.id_buku GROUP by tgambar.id_buku order by buku.id_buku DESC limit 1");
      while($recBuku = mysqli_fetch_array($qnew)){
      ?>
        <section class="py-1">
            <div class="container px-4 px-lg-8 my-5 mt-2">
                <div class="row gx-4 gx-lg-5 center">
                    <div class="col-auto"><img class="bd-placeholder-img mb-3 mb-md-0 rounded" src="./gambarcerita/<?= $recBuku['gambar']?>" width="250" height="375" alt="..." /></div>
                    <div class="col-md-8">
                    <div class="col-12 py-3 mt-3 text-sm">
                      <span class="badge bg-gradient-primary mb-3"><?= $recBuku['nama_kat']?></span>
                        <h3 class="title" style="color : #000000;"><?= $recBuku['judul_buku'] ?></h3>
                        <p class="lead-sm"><?php echo substr($recBuku['sinopsis'], 0, 250)?>...</p>
                        <div class="col-lg-6 ms-auto text-lg-end text-center">
                        <p class="mb-2 text-lg text-dark font-weight-bold"></p>
                        <a href="detailbuku.php?idBuku=<?= $recBuku['id_buku']?>" class="" style="color : #000000">Read More</a>
                        </div>
                        
                    </div>
                </div>
            </div>  
    <?php } ?>
      </div>
    </section>
    
    </section>
  </div>

    <!-- Card Section -->
    <!-- Buku -->
    <section class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
          <h4 class="pb-2 border-bottom mb-3 mt-3" style="color : #000000;">Buku Pilihan MOCO.</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-0 col-sm-0">
            <div class="card card-plain">
              <div class="card-header p-0 position-relative">
              </div>
              <div class="card-body px-0">
              </div>
            </div>
          </div>
          <?php
          $qnew = mysqli_query($con, "SELECT * FROM `buku` LEFT JOIN tgambar
          ON buku.id_buku =  tgambar.id_buku GROUP by tgambar.id_buku order by buku.id_buku DESC limit 8");
        while($recBuku = mysqli_fetch_array($qnew)){
          ?>
          <div class="col-md">
              <div class="card mb-5" style="width: 13rem;">
                <img src="./gambarcerita/<?= $recBuku['gambar']?>" class="card-img-top-not-rounded" alt="...">
                <div class="card-body">
                <a class="card-title"> 
                <a href="detailbuku.php?idBuku=<?= $recBuku['id_buku']?>" class="link" style="color : #4ABDAC;">
                  <p><strong class="text-sm"><?= $recBuku['judul_buku']?></strong></p>   
                  <p class="mb-0 mt-0 text-xs text-muted">
                    <?= $recBuku['penerbit']?>
                  </p>
                </a>
                </a>
                </div>
              </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </section>
  
  
         
  <!-- Footer -->
  <footer class="footer py-5 bg-white">
    <div class="container z-index-1 position-relative">
      <div class="row">
        <div class="col-lg-4 me-auto mb-lg-0 mb-4 text-lg-start text-center">
        <a href="index.php">
              <img src="./assets/img/trans-profile.png" class="mb-3 footer-logo" alt="main_logo">
            </a>
          <h6 class="fw-bold text-uppercase mb-lg-4 mb-3">MOCO</h6>
          <ul class="nav flex-row ms-n3 justify-content-lg-start justify-content-center mb-4 mt-sm-0">
            <li class="nav-item">
              <a class="nav-link text-dark opacity-8" href="" target="_blank">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark opacity-8" href="" target="_blank">
                About
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark opacity-8" href="" target="_blank">
                Blog
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark opacity-8" href="" target="_blank">
                Services
              </a>
            </li>
          </ul>
          <p class="text-sm text-dark opacity-8 mb-0">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Designed by MOCO.
          </p>
        </div>
        <div class="col-lg-6 ms-auto text-lg-end text-center">
          <p class="mb-5 text-lg fw-bold" style="color : #000000;">
            MOCO. Solusi bagi mereka para peminat buku yang tidak ingin membeli buku.
          </p>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
            <span class="fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
            <span class="fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-dark opacity-5">
            <span class="fab fa-github"></span>
          </a>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
