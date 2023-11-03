<?php
include "koneksi.php";
if(isset($_GET['idBuku'])){
    $id = $_GET['idBuku'];
    $qBuku = mysqli_query($con, "SELECT * FROM buku, `file` WHERE buku.id_buku = `file`.id_buku AND buku.id_buku = $id");
    $recBuku= mysqli_fetch_array($qBuku);
    
    }
  
    if(isset($_GET['idPdf'])){
      $idpdf = $_GET['idPdf'];
      $qPdf = mysqli_query($con, "SELECT * FROM `file` WHERE id_buku = $id");
      $recPdf= mysqli_fetch_array($qPdf);
  
      header('Content-Type: application/pdf');
      echo $idpdf;
      }
//     $jmlgambar = mysqli_query($con,"SELECT count(DISTINCT id_gam) AS gambar FROM tgambar WHERE id_buku = $id");
//     $dtjmlgambar = mysqli_fetch_array($jmlgambar);
//   $qgambar = mysqli_query($con, "SELECT * FROM tgambar WHERE id_buku = '$id'  ");
//   $recGambar = mysqli_fetch_array($qgambar);
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
          <a class="nav-link font-weight-bold" href="home.php">
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
  

      
      <!-- Buku Terbaru -->
      <?php
      include "./koneksi.php";
      $qnew = mysqli_query($con, "SELECT * FROM `buku` LEFT JOIN tgambar
      ON buku.id_buku =  tgambar.id_buku GROUP by tgambar.id_buku order by buku.id_buku DESC limit 1");
      while($recBuku = mysqli_fetch_array($qnew)){
      ?>
    <?php } ?>
    <?php
    if(isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $qrec = mysqli_query($con, "SELECT * FROM `buku` LEFT JOIN genre 
        ON buku.nama_kat = genre.id_kat WHERE buku.judul_buku LIKE '%$cari%' ");
        $no = 1;
            while ($rec = mysqli_fetch_array($qrec)){            
        ?>
       
<?php } ?>
        <?php } ?>
      </div>
  </div>
  

   <!-- Detail Buku -->
   <section class="py-1">
            <div class="container px-4 px-lg-10 my-2 mt-2">
                <div class="row gx-4 gx-lg-5 center">
                    <div class="col-auto"><img class="bd-placeholder-img mb-3 mb-md-0 rounded" src="./gambarcerita/<?= $recGambar['gambar']?>" width="230" height="345" alt="..." /></div>
                    <div class="col-md-6">
                    <div class="col-12 py-3 mt-3 text-sm">
                        <h3 class="title" style="color : #000000;"><?= $recBuku['judul_buku'] ?></h3>
                        <dl class="row" style="color : #000000;">
                          <dt class="col-sm-3">Penulis</dt>
                          <dd class="col-sm-9"><?= $recBuku['penulis'] ?></dd>

                          <dt class="col-sm-3">Penerbit</dt>
                          <dd class="col-sm-9"><?= $recBuku['penerbit'] ?></dd>

                          <dt class="col-sm-3">ISBN</dt>
                          <dd class="col-sm-9"><?= $recBuku['isbn'] ?> </dd>
                        </dl>
                        <a href="./pdf/<?= $recBuku['pdf'] ?>" class="btn bg-gradient-dark w-auto mt-5" role="button" aria-pressed="true">
                        <div class="d-flex align-items-center">
                            <i class="material-icons me-2" aria-hidden="true">book</i>
                            Mulai Baca
                        </div>
                      </a>
                        
                    </div>
                </div>
            </div>
      </div>
    </section>
    </div>

    <!--Deskripsi Buku-->
    <section class="py-5">
    <div class="container">
    <div class="row justify-content-start">
      <div class="col-md-6">
      <p class="h5" style="color : #000000;">Deskripsi Singkat</p>
      </div>
          <div class="d-flex justify-content-between align-items-center">
            <p class="mb-1 text-sm" style="color : #000000;">
              <?= $recBuku['sinopsis']?>
               </p>
            </div>
          </div>
        </div>
      </div>
      </section>
</body>
  
         
  

</html>
