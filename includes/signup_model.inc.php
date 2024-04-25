<?php

declare(strict_types=1);

function get_username(object $pdo, string $first_name, string $last_name) 
{
    $query = "SELECT user_first_name, user_last_name FROM users WHERE user_first_name = :first_name AND user_last_name = :last_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) 
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $first_name, string $last_name, string $email, string $phone, string $pwd) {
    $query = "INSERT INTO users (user_first_name, user_last_name, email, phone, pwd) VALUES (:first_name, :last_name, :email, :phone, :pwd);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT, $options);

    $stmt->bindParam(":first_name", $first_name);
    $stmt->bindParam(":last_name", $last_name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();
}