<?php 
include "./koneksi.php";
// INPUT GENRE
if (isset($_POST['id_kat'])){
    //DEKLARASI VARIABLE
    $id_kat = $_POST['id_kat'];
    $nama_kat = $_POST['nama_kat'];

    //QUERY PERINTAH INPUT DATA
    $qinput = mysqli_query($con,"INSERT INTO genre VALUES('$id_kat','$nama_kat')");
    header("location:genre.php");
    //NOTIFIKASI
    if($qinput)
    {
        // NOTIF BERHASIL
        echo '<script> window.alert("Data Berhasil Disimpan"); window.location.href=""; </script>';
    } else
    {
        //NOTIF GAGAL
        echo '<script> window.alert("Data Gagal Disimpan"); window.location.href=""; </script>';
    }
}
// DELETE GENRE
if(isset($_GET['idGenre'])){
  //DEKLARASI VARIABEL
  $id = $_GET['idGenre'];
  mysqli_query($con, "DELETE FROM genre WHERE id_kat = $id ");
  header("location:genre.php");
}
// UPDATE GENRE
if(isset($_POST['btnGenre'])){
  $recKat = $_POST['nama_kat'];
  $id = $_POST['idGenre'];

 mysqli_query($con, "UPDATE genre SET nama_kat = '$recKat' WHERE id_kat = $id ");
 header("location: genre.php");
}

        //INPUT BUKU
if (isset($_POST['btnSimpan'])){
  //DEKLARASI VARIABLE
  $nama_kat = $_POST['nama_kat'];
  $judul_buku = $_POST['judul_buku'];
  $sinopsis = $_POST['sinopsis'];
  $penulis = $_POST['penulis'];
  $penerbit = $_POST['penerbit'];
  $isbn = $_POST['isbn'];

  //QUERY PERINTAH INPUT DATA
  $qinput = mysqli_query($con, "INSERT INTO buku VALUES(NULL,'$nama_kat','$judul_buku','$sinopsis','$penulis','$penerbit','$isbn')");
  header("location:buku.php");
}

  // DELETE BUKU
  if(isset($_GET['idBuku'])){
    //DEKLARASI VARIABEL
    $id = $_GET['idBuku'];
    mysqli_query($con, "DELETE FROM buku WHERE id_buku = $id ");
    header("location: buku.php");
  }
  // UPDATE BUKU
  if(isset($_POST['UpBuku'])){
    $judul_buku= $_POST['judul_buku'];
    $nama_kat = $_POST['nama_kat'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $sinopsis = $_POST['sinopsis'];
    $id = $_POST['idBuku'];
 mysqli_query($con, "UPDATE `buku` SET judul_buku = '$judul_buku', nama_kat = '$nama_kat', penulis = '$penulis', penerbit = '$penerbit', isbn = '$isbn', sinopsis = '$sinopsis' WHERE id_buku = '$id' ");
//  "UPDATE `buku` SET `penulis`='vayla sabrina ratu calista' WHERE id_buku='3' ";
 header("location:buku.php");
}
// DELETE PDF
if(isset($_GET['idPdf'])){
  //DEKLARASI VARIABEL
  $id = $_GET['idPdf'];
  $idBuku = $_GET ['id_buku'];
  mysqli_query($con, "DELETE FROM `file` WHERE id_pdf = $id ");
  header("location: buku.php");
}

// DELETE GAMBAR
if(isset($_GET['idGambar'])){
  //DEKLARASI VARIABEL
  $id = $_GET['idGambar'];
  $idBuku = $_GET ['id_buku'];
  mysqli_query($con, "DELETE FROM `tgambar` WHERE id_gam = $id ");
  header("location: buku.php");
}

?>