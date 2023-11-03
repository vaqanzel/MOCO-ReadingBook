<?php 
// session_start();
include ('koneksi.php');
if(isset($_POST['username']) && isset($_POST['password']) ){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $ceklogin = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = md5('$password')");
     $cek = mysqli_fetch_array($ceklogin);
    //echo $cek; 
    if(!empty($cek[0]))
    {
        $rec = mysqli_fetch_array($ceklogin);
        $_SESSION['username'] = $username;
        

        header("location:home.php");
    }
    else {
        header("location:log.php?err=1;");
        
    }
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
    
    <!-- Bootstrap CSS yang sudah di pindah ke lokal, tidak lagi membutuhkan akses online-->
    <link rel="stylesheet" href=".assets/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
</head>
    <!-- Navbar Transparent -->
   <body>
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
        <a class="navbar-brand  text-white "  rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        <h3 class="fs-4" style="color : #4ABDAC;">MOCO.</h3>
      </a>
        </div>
  </nav>
  <!-- End Navbar -->

    <div class="page-header align-items-start min-vh-100" style="background-image: url('./assets/img/bg-login.png');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1"style="color : #4ABDAC;">
              <form method="POST" action=" " class="username">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">LOGIN</h4>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="username" type="text" class="form-control" name="username" placeholder="Username" autofocus>
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label"></label>
                  <input id="password" type="text" class="form-control" name="password" placeholder="Password" autofocus>
                </div>
                <p class="m-2 text-sm text-danger">
                 <?php 
                    if (!empty($_GET['err'])){
                      echo "Username atau Password salah";
                    }
                    else
                    {
                        echo "";
                    }
                    
                    ?>
                    <div class="mt-4 mb-1 text-sm text-center">
                  </p>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-1">Log In</button>
                </div>
                <p class="mt-4 mb-1 text-sm text-center">
                  Don't have an account? <a class="text-dark font-weight-bolder text-center mt-2 mb-0" href="reg.php">Sign Up </a>
                </p>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-12 col-md-6 my-auto">
            <div class="copyright text-center text-sm text-white text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart" aria-hidden="true"></i> by
              <a class="font-weight-bold text-white" target="_blank">MOCO.</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
</body>

</html>