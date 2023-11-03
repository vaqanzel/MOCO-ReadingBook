<?php
include "./koneksi.php";

if(isset($_GET['idBuku'])) {
   $id = $_GET['idBuku'];
$qBuku = mysqli_query($con,"SELECT * FROM buku WHERE id_buku ='$id'");
$recBuku = mysqli_fetch_array($qBuku);
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
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn" style="background-color : #4ABDAC;" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
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
                            <a class="nav-link" href="cerita.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Input Cerita
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h4 class="mt-4" style="color : #4ABDAC;">Update Buku</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Update Buku</div>
                        </div>
                        
        <!-- Page Wrapper -->
    <div id="wrapper">
    
    <div class="container-fluid">
        <div class="row justify-content-md-center">
        <div class="col col-lg-13">

        <form action="data.php" method="POST" >
                
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input type="text" name="judul_buku" id="" class="form-control" placeholder="" value="<?= $recBuku['judul_buku'] ?>">
              </div>   
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input type="text" name="nama_kat" id="" class="form-control" placeholder="" value="<?= $recBuku['nama_kat'] ?>">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label> 
                  <input type="text" name="penulis" id="" class="form-control" placeholder="" value="<?= $recBuku['penulis'] ?>">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label> 
                  <input type="text" name="penerbit" id="" class="form-control" placeholder="" value="<?= $recBuku['penerbit'] ?>">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label> 
                  <input type="text" name="isbn" id="" class="form-control" placeholder="" value="<?= $recBuku['isbn'] ?>">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label> 
                  <input type="text" name="sinopsis" id="" class="form-control" placeholder="" value="<?= $recBuku['sinopsis'] ?>">
                </div>
                <input type="hidden" name="idBuku" value="<?= $recBuku['id_buku'] ?>" />

                <input type="submit" style="background-color : #4ABDAC;" class="btn float-end text-white" name="UpBuku" value="Update Buku" >
                </form>
            </div>
        </div>
    </div>
    </div>
        </div>
            </main>
        <!--Footer  -->
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