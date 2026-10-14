<?php

require_once 'Assets/connection.php';

function insertForumpost($username, $message) {
    $sql = "insert into forum (username, message) values (:username, :msg)";

    global $GymnasieArbete;

    $stmt = $GymnasieArbete->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':msg', $message);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function login($username, $password) {
    global $GymnasieArbete;
    $sql = "SELECT password FROM user WHERE username = :username";
    $stmt = $GymnasieArbete->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user && password_verify($password, $user['password']);
}
function getUserInfo($username) {
    global $GymnasieArbete;
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $GymnasieArbete->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>