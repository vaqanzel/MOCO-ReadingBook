<?php 
 include "./koneksi.php";
 if(isset($_GET['idBuku'])){
     $id = $_GET['idBuku'];
     $qBuku = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = $id");
     $recBuku= mysqli_fetch_array($qBuku);
}
//  if (isset($_GET['idCerita'])) {
//     $id = $_GET['idCerita'];
//     $idBuku = $_GET['id_buku'];
//     mysqli_query($con, "DELETE FROM `pdf` WHERE id_pdf = $id");
//     header("location: pdf.php?idBuku=$idBuku");
// }
if (isset($_POST['btnPdf'])) {
    $id = $_GET['idBuku'];
    $pdf = $_FILES['pdf']['name'];
    // echo $pdf;
    // die;
    $ekstensi_diperbolehkan	= array('pdf');
        $nama = $_FILES['pdf']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['pdf']['size'];
        $file_tmp = $_FILES['pdf']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            // echo 'satu';
            // die();
            if($ukuran < 90044070){	
            //             echo 'dua';
            // die();

            move_uploaded_file($file_tmp,'./pdf/'.$nama);
            $query = mysqli_query($con, "INSERT INTO `file` VALUES (NULL, $id, '$nama')");
           
                if($query){
                    echo "<script>
                        alert('File pdf berhasil ditambahkan!');
                        document.location.href = 'pdf.php?idBuku=$_GET[idBuku]';
                        </script>";
                }else{
                    echo "<script>
                        alert('File pdf gagal ditambahkan!');
                        document.location.href = 'pdf.php?idBuku=$_GET[idBuku]';
                        </script>";

                }
                
            }
            else{
                    echo "<script>
                        alert('Ukuran fle terlalu besar!');
                        document.location.href = 'pdf.php?idBuku=$_GET[idBuku]';
                        </script>";
            }
        }
        else{
                    echo "<script>
                        alert('Ekstensi file yang ditambahkan tidak diperbolehkan!');
                        document.location.href = 'pdf.php?idBuku=$_GET[idBuku]';
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
            <ul class="navbar-nav ms-auto ">
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
                        <h4 class="mt-4" style="color : #4ABDAC;">Input Cerita</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Input Cerita</div>
                        </div>

                <!-- Form Input -->
                <div class="card-body">
            <div class="row justify-content-md-left">
        <div class="col col-lg-8">
              <form method="post" action="" enctype="multipart/form-data" role="form" class="text-start"> 
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input name="idBuku" type="text" readonly="readonly" class="form-control" 
                    value="<?= $recBuku['judul_buku']?>">
                </div>
                <div class="form-group">
                    <label >Input PDF </label>
                    <input name="pdf" type="file" class="form-control" placeholder="File Pdf">
                </div>
                <input type="hidden" value="<?= $recBuku['id_buku'] ?>" name="idBuku" />
                <input type="hidden" value="<?= $recBuku['judul_buku'] ?>" name="judul_buku" />
                <input type="submit" style="background-color : #4ABDAC;" class="btn text-white float-end mt-3" name="btnPdf" value="Tambah File" >
              </form>
             </div>
    
    <div class="row justify-content-md-left">
        <div class="col col-lg-15">
        <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">ID File</th>
            <th scope="col">File</th>
            <th scope="col"colspan=1>Opsi</th>
            </tr>
           </thead>
        <tbody>
        <?php 
                include "./koneksi.php";
                // $no = 1;
                // $qrec = mysqli_query($con,"SELECT * FROM id_pdf LEFT JOIN genre ON buku.nama_kat = genre.id_kat");
                // while ($rec = mysqli_fetch_array($qrec))
                $no = 1;
                $qrec = mysqli_query($con, "SELECT * FROM `file` WHERE id_buku = '$id' ");
                while ($rec = mysqli_fetch_array($qrec))
                {            
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $rec['id_pdf'] ?></td>
                <td><?= $rec['pdf'] ?></td>
                <td><a href="data.php?idPdf=<?= $rec[0] ?>"> Delete </a> </td>
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
    <!-- <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Moco</div>
                        <div>
                            </div>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
</div>
<!-- End of Main Content -->
           
   <!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="js/scripts.js"></script>
<!-- end script -->
</body>

</html>