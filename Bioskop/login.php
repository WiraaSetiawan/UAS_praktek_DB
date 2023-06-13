<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=masukan username");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=masukan password");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                if ($row['role'] === 'admin') { 
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: admin.php"); 
                    exit();
                } else if ($row['role'] === 'user') { 
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: user.php"); 
                    exit();
                }
            } else {
                header("Location: index.php?error=username atau password salah");
                exit();
            }
        } else {
            header("Location: index.php?error=username atau password salah");
            exit();
        }
    }

} else {
    header("Location: index.php");
    exit();
}
?>
