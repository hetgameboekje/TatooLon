<?php
session_start();
include "db_conn.php";
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)) {
    header ("Location: index.php? erro=User name is required");
    exit();
}
else if(empty($pass)) {
    header ("Location: index.php? erro=password is required");
    exit();
}

$sql = "SELECT * FROM account WHERE naam='$uname' AND ww='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['naam'] === $uname && $row['ww'] === $pass) {
        echo "logged in!";
        $_SESSION['user_name'] = $row['naam'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: index.php?error= Incorrect User name or password");
        exit();
    }
}
else {
    header("Location: index.php");
    exit();
}