<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    /* $confirm_password = $_POST["confirm_password"]; */

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.php";
        require_once "signup_contr.inc.php";

        // error handlers 

        $query = "INSERT INTO users (user_first_name, user_last_name, email, phone, pwd) VALUES (:user_first_name, :user_last_name, :email, :phone, :pwd);";

        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 10
        ];
        
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT, $options);

        $stmt->bindParam(":user_first_name", $first_name);
        $stmt->bindParam(":user_last_name", $last_name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":pwd", $hashed_pwd);

        $stmt->execute();
        
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}