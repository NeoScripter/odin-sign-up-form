<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["password"];
    $confirm_pwd = $_POST["confirm_password"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // error handlers 
        $errors = [];

        if (is_input_empty($first_name, $last_name, $email, $phone, $pwd, $confirm_pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }

        if (is_username_taken($pdo, $first_name, $last_name)) {
            $errors["username_taken"] = "Username already taken!";
        }

        if (is_email_registered($pdo, $email)) {
            $errors["email_taken"] = "Email already registered!";
        }

        if ($pwd !== $confirm_pwd) {
            $errors["wrong_password"] = "Passwords don't match!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["error_signup"] = $errors;

            $signup_data = [
                "first-name" => $first_name,
                "last-name" => $last_name,
                "email" => $email,
                "phone" => $phone
            ];

            $_SESSION["signup_data"] = $signup_data;

            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $first_name, $last_name, $email, $phone, $pwd);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}