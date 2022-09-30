<?php

if(isset($_POST["submit"])) {
    $userid = $_POST["login-id"];
    $pwd = $_POST["login-password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($userid, $pwd) !== false)
    {
        header("location: ../index.php?error=LoginEmptyInput");
        exit();
    }

    loginUser($conn, $userid, $pwd);
}
else {
    header("location: ../index.php");
}