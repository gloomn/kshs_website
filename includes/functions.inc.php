<?php

function emptyInputRegister($username, $password, $passwordCheck, $email, $grade, $class) {
    $result;
    if(empty($username) || empty($password) || empty($passwordCheck) || empty($email) || empty($grade) || empty($class)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($passwordCheck, $password) {
    $result;
    if($password !== $passwordCheck) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $password, $email, $grade, $class) {
    $sql = "INSERT INTO users (username, password, email, grade, class) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd  = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssii", $username, $hashedPwd, $email, $grade, $class);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($userid, $pwd) {
    $result;
    if(empty($userid) || empty($pwd)) {
        $result = true;
        header("location: ../index.php?error=LoginEmptyInput");
        exit();
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $userid, $pwd) {
    $uidExists = uidExists($conn, $userid, $userid);

    if($uidExists === false)
    {
        header("location: ../index.php?error=WrongUid");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false)
    {
        header("location: ../index.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["username"];
        $_SESSION["pwd"] = $uidExists["password"];
        header("location: ../index.php");
        exit();
    }
}