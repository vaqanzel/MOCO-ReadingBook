<?php
$con = mysqli_connect("localhost","root","","moco");


function query($query) {
    global $con;
    $result = mysqli_query($con, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $con;
    $nama_user = strtolower(tripcslashes($con, $data["nama_user"]));
    $username = strtolower(tripcslashes($con, $data["username"]));
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);


    //cek konfirmasi password
    if ( $password !== $password2) {
        echo "<script>
                alert('Confirm password doesnt match!');
              </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

   //tambahkan user baru kedalam data base
    mysqli_query($con, "INSERT INTO user VALUES('','$username', '$password', '$nama_user')");
    return mysqli_affected_rows($con);

}
?>