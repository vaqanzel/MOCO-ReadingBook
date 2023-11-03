<?php
include "./koneksi.php";
?><!DOCTYPE html>
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
                      <h4 class="mt-4" style="color : #4ABDAC;">Search</h4>
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted mb-4">Search</div>
                        </div>
                        <!-- container untuk tampilan hasil search -->
<div class="container mb-10" style="padding : 20px; ">
    
    <form class=" " action="" method="post">
            <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input name="cari" style="" class="form-control form-control-lg" type="search" <?php if(isset($_POST['cari'])) { ?> value="<?= $_POST['cari'] ?>" <?php } else { ?> placeholder="What are you looking for?? " <?php } ?>>
                </div>
            <button style="background-color : #4ABDAC;" type="submit" class="btn float-end text-white me-1" autofocus>Search</button>
        </div>
    </form>


</div>
<div class="row justify-content-md-left">
        <div class="col col-lg-15">
        <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">ID Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Penulis</th>
            <th scope="col">Penerbit</th>
            <th scope="col">ISBN</th>
            <th scope="col"colspan=4>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        if(isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $qrec = mysqli_query($con, "SELECT * FROM `buku` LEFT JOIN genre 
        ON buku.nama_kat = genre.id_kat WHERE buku.judul_buku LIKE '%$cari%' ");
        $no = 1;
            while ($rec = mysqli_fetch_array($qrec)){            
        ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $rec['id_buku'] ?></td>
            <td><?= $rec['judul_buku'] ?></td>
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
    <?php } ?>
    </table>

    </div>
    </div>
    </div>
    
<!-- end of container hasil search -->