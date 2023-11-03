<?php 
 
// include './koneksi.php';
 
// error_reporting(0);
 
// session_start();
 
// if (isset($_SESSION['username'])) {
//     header("Location: log.php");
// }
 
// if (isset($_POST['submit'])) {

//     $id_user = $_POST['id_user'];
//     $username = $_POST['username'];
//     $nama_user = $_POST['nama_user'];
//     $password = md5($_POST['password']);
//     $cpassword = md5($_POST['cpassword']);
 
//     if ($password == $cpassword) {
//         $sql = "SELECT * FROM user WHERE id_user='$id_user'";
//         $result = mysqli_query($con, $sql);
//         if (!$result->num_rows > 0) {
//             $sql = "INSERT INTO user VALUES (NULL,'$username','$nama_user', '$password', '$cpassword')";
//             $result = mysqli_query($con, $sql);
//             if ($result) {
//                 echo "<script>alert('Selamat, registrasi berhasil!')</script>";
//                 $username = "";
//                 $email = "";
//                 $_POST['password'] = "";
//                 $_POST['cpassword'] = "";
//             } else {
//                 echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
//             }
//         } else {
//             echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
//         }
         
//     } else {
//         echo "<script>alert('Password Tidak Sesuai')</script>";
//     }
// }
 
// ?>
<?php
   require_once('./koneksi.php');

   if(isset($_POST['register'])){

  if( registrasi($__POST_)> 0) {
    echo "<script>
    alert('User added successfully!');
    </script>";
  } else {
    echo mysqli_error ($con);
  } 

    // filter data yang diinputkan
     $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nama_user = filter_input(INPUT_POST, 'nama_user', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO `user` ('id', 'username', 'password', 'nama_user') 
            VALUES (':id', ':username', ':password', ':nama_user')";
   $stmt = $db->prepare($kon);

   // bind parameter ke query
   $params = array(
       ":id" => $id,
       ":username" => $username,
       ":password" => $password,
       ":nama_user" => $nama_user
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);
    $qinput = mysqli_query($con,"INSERT INTO user VALUES('$id','','$username','$password','$nama_user')");

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: log.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOCO - Reading Digital Book</title>
     <!--untuk menginclude kan icon di title bar windows -->
     <link rel="icon" href="./assets/img/trans-profile-1.png" type="image/x-icon" />
     
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href="assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="contact-us">
  <!-- Navbar -->
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
            <div class="container">
            <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
            <h3 class="fs-4" style="color : #4ABDAC;">MOCO.</h3>
          </a>

            </div>
      </nav>
        <!-- End Navbar -->
        <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
          <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('./assets/img/rg.png');" loading="lazy"></div>
        </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg p-3">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">REGISTER</h4>
                </div>
              </div>
              
        
           
              
  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  
              <div class="card-body">
                  <div class="card-body p-0 my-3">
                    <div class="col">
                    <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label> Full name</label>
                          <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Username</label>
                          <input type="text" nama="username" class="form-control" id="username" placeholder="Username">
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Password</label>
                          <input type="password" nama="password" class="form-control" id="password" placeholder="Password">
                        </div>
                      </div>
                       <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Konfirmasi Password</label>
                          <input type="password" name="password2" class="form-control" id="password2" placeholder="Password">
                        </div>
                      </div>
                    </div>
                    <p class="mt-4 mb-1 text-sm text-center">
                  Already have an account? <a  class="text-dark font-weight-bolder text-center mt-2 mb-0" href="log.php">Log In </a>
                </p>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" name="id" class="btn bg-gradient-dark mt-3 mb-0" href="log.php">Sign Up</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
  <footer class="footer pt-5 mt-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <a href="https://www.creative-tim.com/product/material-kit">
              <img src="./assets/img/profile.jpg" class="mb-3 footer-logo" alt="main_logo">
            </a>
            <h6 class="font-weight-bolder mb-4">MOCO.</h6>
          </div>
          <div>
            <ul class="d-flex flex-row ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim" target="_blank">
                  <i class="fab fa-facebook text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                  <i class="fab fa-twitter text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://dribbble.com/creativetim" target="_blank">
                  <i class="fab fa-dribbble text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://github.com/creativetimofficial" target="_blank">
                  <i class="fab fa-github text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                  <i class="fab fa-youtube text-lg opacity-8"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Company</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Freebies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Premium Tools
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Blog
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Resources</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Illustrations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Bits & Snippets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Affiliate Program
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Help & Support</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Knowledge Center
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Custom Development
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Sponsorships
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
          <div>
            <h6 class="text-sm">Legal</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Terms & Conditions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Privacy Policy
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" target="_blank">
                  Licenses (EULA)
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="text-center">
            <p class="text-dark my-4 text-sm font-weight-normal-dark">
              All rights reserved. Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Designed by <a href="" target="_blank">MOCO</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
</body>

</html>