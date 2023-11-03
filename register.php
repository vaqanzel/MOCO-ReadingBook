<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<title>MOCO - Reading Digital Book</title>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['message'])) {
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['message']?>
				</div>
				<?php
				}
				?>


				<div class="card">
					<div class="card-title text-center">
						<h1>Register Form</h1>
					</div>
					<div class="card-body">
						<form action="process-register.php" method="post">
							<div class="form-group">
								<label for="username">Nama Lengkap</label>
								<input type="text" name="nama_user" class="form-control" id="nama_user" aria-describedby="name" placeholder="Nama lengkap" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username" autocomplete="off">

							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="password">Konfirmasi Password</label>
								<input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
							</div>

							<p class="mt-4 mb-1 text-sm text-center">
                  Already have an account? <a  class="text-dark font-weight-bolder text-center mt-2 mb-0" href="log.php">Log In </a>
                </p>
                    <div class="row">
                      <div class="col-md-12 text-center">
					  <button type="submit" class="btn btn-primary">Register</button>
						</form>

					</div>
				</div>
			</div>

		</div>

	</div>
</body>
<?php
session_destroy();
?>