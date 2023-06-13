<?php
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['nama'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $nama = validate($_POST['nama']);

    $sql = "INSERT INTO users (username, password, nama, role) VALUES ('$uname', '$pass', '$nama', 'user')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?success=Registrasi berhasil. Silakan login.");
        exit();
    } else {
        header("Location: register_form.php?error=Terjadi kesalahan. Silakan coba lagi.");
        exit();
    }

} else {
    header("Location: register_form.php");
    exit();
}
?>
