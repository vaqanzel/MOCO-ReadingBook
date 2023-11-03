<?php
session_start();

include "koneksi.php";

//dapatkan data user dari form register
$user = [
	'nama_user' => $_POST['nama_user'],
	'username' => $_POST['username'],
	'password' => $_POST['password'],
	'password2' => $_POST['password2'],
];

//validasi jika password & password2 sama

if($user['password'] != $user['password2']){
	$_SESSION['error'] = 'Password yang anda masukkan tidak sama dengan password confirmation.';
	$_SESSION['nama_user'] = $_POST['nama_user'];
	$_SESSION['username'] = $_POST['username'];
	header("Location: register.php");
	return;
}

//check apakah user dengan username tersebut ada di table users
$query = "select * from users where username = ? limit 1";
$stmt = $mysqli->stmt_init();
$stmt->prepare($query);
$stmt->bind_param('s', $user['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);

//jika username sudah ada, maka return kembali ke halaman register.
if($row != null){
	$_SESSION['error'] = 'Username yang anda masukkan sudah ada di database.';
	header("Location: register.php");

}else{
	//username unik. simpan di database.
	$query = "insert into users (nama_user, username, password) values  (?,?,?)";
	$stmt = $mysqli->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('sss', $user['nama_user'],$user['username'],$user['password']);
	$stmt->execute();
	$result = $stmt->get_result();
	var_dump($result);

	$_SESSION['message']  = 'Berhasil register ke dalam sistem. Silakan login dengan username dan password yang sudah dibuat.';
	header("Location: register.php");
}

?>