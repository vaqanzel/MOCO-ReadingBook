<?php
include "./koneksi.php";
if(isset($_GET['idBuku'])){
    $id = $_GET['idBuku'];
    $qBuku = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = $id");
    $recBuku= mysqli_fetch_array($qBuku);
}
// if (isset($_GET['btnGambar'])) {
//    $id = $_GET['idBuku'];
//    $idBuku= $_GET['id_buku'];
//    mysqli_query($con, "DELETE FROM `tgambar` WHERE id_gam = $id");
//    header("location: gambar.php?idBuku=$idBuku");
// }
if (isset($_POST['btnGambar'])) {
   $id = $_GET['idBuku'];
   $gambar = $_FILES['gambar']['name'];

   $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
       $nama = $_FILES['gambar']['name'];
       $x = explode('.', $nama);
       $ekstensi = strtolower(end($x));
       $ukuran	= $_FILES['gambar']['size'];
       $file_tmp = $_FILES['gambar']['tmp_name'];
       if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
           // echo 'satu';
           if($ukuran < 90044070){	
                       // echo 'dua';
           move_uploaded_file($file_tmp,'./gambarcerita/'.$nama);
           $query = mysqli_query($con, "INSERT INTO tgambar VALUES (NULL, $id, '$nama')");
               if($query){
                   echo "<script>
                       alert('Gambar berhasil ditambahkan!');
                       document.location.href = 'gambar.php?idBuku=$_GET[idBuku]';
                       </script>";
               }else{
                   echo "<script>r
                       alert('Gambar gagal ditambahkan!');
                       document.location.href = 'gambar.php?idBuku=$_GET[idBuku]';
                       </script>";
               }
               
           }
           else{
                   echo "<script>
                       alert('Ukuran fle terlalu besar!');
                       document.location.href = 'gambar.php?idBuku=$_GET[idBuku]';
                       </script>";
           }
       }
       else{
                   echo "<script>
                       alert('Ekstensi file yang ditambahkan tidak diperbolehkan!');
                       document.location.href = 'gambar.php?idBuku=$_GET[idBuku]';
                       </script>";
       }


       
   }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link rel="shortcut icon" href="./assets/img/trans-profile-1.png" type="image/x-icon">  
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h6 class="navbar-brand ps-3" style="color : #4ABDAC" href="index.php"><img src="./assets/img/trans-profile.png" class="img-fluid rounded-circle me-2" style="height : 35px; padding-right : 1px; padding-bottom:1px;">MOCO</h6>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Input</div>
                            <a class="nav-link" href="buku.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Input Buku
                            </a>
                            <a class="nav-link" href="genre.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Input Genre
                            </a>
                            <a class="nav-link" href="gambar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Input Gambar
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4" style="color : #4ABDAC;">Input Gambar</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Input Gambar</div>
                        </div>
                        
                        
            <!-- Input Gambar -->
            <div class="card-body">
            <div class="row justify-content-md-left">
        <div class="col col-lg-8">
              <form method="post" action="" enctype="multipart/form-data" role="form" class="text-start"> 
              <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input name="idBuku" type="text" readonly="readonly" class="form-control" 
                    value="<?= $recBuku['judul_buku']?>">
                </div>
                <div class="form-group text-sm">
                    <label >Input Gambar </label>
                    <input name="gambar" type="file" class="form-control" placeholder="Input Gambar">
                <!-- type = "file" -->
                </div>
            </div>
                <input type="hidden" value="<?= $recBuku['id_buku'] ?>" name="idBuku" />
                <input type="hidden" value="<?= $recBuku['judul_buku'] ?>" name="judul_buku" />
                <div class="footer">
                <div class="col col-lg-8 mt-3">
                <input type="submit" style="background-color : #4ABDAC;" class="btn float-end text-white" name="btnGambar" value="Tambah Gambar" >
                 </form>
             </div>
        </div>
    </main>
    <div class=container>
        <div class="row" style="margin-top : 20px; padding : 20px; border : solid 1px #aaa;" >
        <?php
            $qgambar = mysqli_query($con, "SELECT * FROM tgambar WHERE id_buku = '$id'  ");
            while($recGambar = mysqli_fetch_array($qgambar)){
        ?>
            <div class="col col-lg-3">
                <div class="card">
                    <img src="./gambarcerita/<?= $recGambar['gambar'] ?>" class="img-fluid" alt="Responsive image" class="card-img-top" />
                    <div class="card-body">
                         <a href="data.php?idGambar=<?= $recGambar['id_gam']?>&id_buku=<?= $id ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        </div>

<!-- Footer -->
<footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Moco</div>
                        <div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</div>
<!-- End of Main Content -->

                    
                   <!-- end Tabel INPUT BUKU -->
                        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


   <!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scripts.js"></script>
<!-- end script -->
</body>

</html>