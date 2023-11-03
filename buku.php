<?php
include "./koneksi.php";

if(isset($_GET['idBuku'])){
$id = $_GET['id_buku'];
mysqli_query($con,"DELETE FROM buku WHERE id_buku = $id");
// header ("location:buku.php")
}
// if(isset($_GET['cari'])){
//     $pencarian = $_GET ['cari'];
//     $query = "SELECT * FROM buku WHERE judul_buku like '%".$pencarian."'%";
// } else {
//     $query = "SELECT * FROM buku";
// }
  
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
            <ul class="navbar-nav ms-auto">
            <a href="cari.php" class="btn" style="background-color : #4ABDAC;" role="button" aria-pressed="true">Search</a>
            </ul>
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
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      <h4 class="mt-4" style="color : #4ABDAC;">Input Buku</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Input Buku</div>
                        </div>
                        
                <!-- Form Input -->
                    <div class="card-body">
                    <div class="row justify-content-md-left">
                     <div class="col col-lg-8">
              <form role="form" action="data.php" class="text-start" method="POST">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="id_buku" type="text" class="form-control" name="judul_buku" placeholder="Judul Buku" autofocus>
                </div>
                <div class="form-group">
                <div class="input-group input-group-outline mb-3">
                    <select name="nama_kat" class="custom-select">
                        <option selected>Pilih Genre</option>
                        <?php
                        $qkat = mysqli_query($con,"SELECT * FROM genre ORDER BY nama_kat ASC");
                        while ($rkat= mysqli_fetch_array($qkat)){
                        ?>

                        <option value="<?= $rkat['nama_kat'] ?>" ><?= $rkat['nama_kat'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="id_buku" type="text" class="form-control" name="penulis" placeholder="Penulis" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="id_buku" type="text" class="form-control" name="penerbit" placeholder="Penerbit" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="id_buku" type="text" class="form-control" name="isbn" placeholder="ISBN" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <textarea id="id_buku" type="text" class="form-control" name="sinopsis" placeholder="Sinopsis" autofocus></textarea>
                </div>
                
                <div class="footer mb-5">
                    <button type="reset" class="btn btn-danger float-end"><i class="bi-x-circle"></i>
                        Batal</button>
                    <button type="submit" name="btnSimpan"  style="background-color : #4ABDAC;" class="btn float-end text-white me-1" ><i class="bi-save"></i>
                        Simpan</button>
                </div>

                    <!-- Tabel -->
            <div class="row justify-content-md-left">
        <div class="col col-lg-15">
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">ID Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Genre</th>
            <th scope="col">Penulis</th>
            <th scope="col">Penerbit</th>
            <th scope="col">ISBN</th>
            <th scope="col"colspan=4>Opsi</th>
            </tr>
           </thead>
        <tbody>
            <?php 
                include "./koneksi.php";
                $no = 1;
                $qrec = mysqli_query($con,"SELECT * FROM id_buku LEFT JOIN genre ON buku.nama_kat = genre.id_kat");
                // while ($rec = mysqli_fetch_array($qrec))
                $no = 1;
                $qrec = mysqli_query($con, "SELECT * FROM buku WHERE id_buku");
                //echo "SELECT * FROM genre WHERE id_kat";
                while ($rec = mysqli_fetch_array($qrec))
                {            
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $rec['id_buku'] ?></td>
                <td><?= $rec['judul_buku'] ?></td>
                <td><?= $rec['nama_kat'] ?></td>
                <td><?= $rec['penulis'] ?></td>
                <td><?= $rec['penerbit'] ?></td>
                <td><?= $rec['isbn'] ?></td>
                <td><a href="pdf.php?idBuku=<?= $rec[0] ?>"> Cerita </a> </td>
                <td><a href="gambar.php?idBuku=<?= $rec[0] ?>"> Gambar </a> </td>
                <td><a href="updatebuku.php?idBuku=<?= $rec[0] ?>"> Edit</a> </td>
                <td><a href="data.php?idBuku=<?= $rec[0] ?>"> Delete </a> </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
        </table>
            </div>
                 </div>
                </div>
            </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/datatables-simple-demo.js"></script>
    </body>
</html>
