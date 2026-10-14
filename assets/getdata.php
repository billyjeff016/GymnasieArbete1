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

function getForumPosts() {
    $sql = "select * from forum order by time desc";

    global $GymnasieArbete;
    $stmt = $GymnasieArbete->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function searchMessages($search) {
    global $GymnasieArbete;
    $sql = "SELECT * FROM GymnasieArbete
        WHERE username = :search
            ORDER BY time DESC";
    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':search', $search);
    $stmt->execute();
    return $stmt;
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
    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addUser($felt) {
            global $GymnasieArbete;
    $sql = "INSERT INTO user(username, name, email, password) VALUES (:username, :name, :email, :password)";
    $stmt = $GymnasieArbete->prepare($sql);

    $stmt->bindValue(':username', $felt['username']);
    $stmt->bindValue(':name', $felt['name']);
    $stmt->bindValue(':email', $felt['email']);
    $stmt->bindValue(':password', $felt['password']);

    try {
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        echo "Error: The name or email already exists or are invalid. Please choose a different one.";
        return false;
    }
    }
    function updateUser($username, $name, $email, $password) {
    global $GymnasieArbete;
    $sql = "UPDATE user SET name = :name, email = :email, password = :password WHERE username = :username";
    $stmt = $GymnasieArbete->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    try {
        return $stmt->execute();
    } catch (Exception $e) {
        echo "Error: The name or email already exists or are invalid. Please choose a different one.";
        return false;
    }
}
/*if ($stmt->execute()) {
    return true;
} else {
    return false;
}
}*/
