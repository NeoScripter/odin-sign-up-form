<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // error handlers 
        $errors = [];

        if (is_input_empty($email, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $email);

        if (is_email_wrong($result)) {
            $error["login_incorrect"] = "Incorrect login info!";
        }
        if (!is_email_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $error["login_incorrect"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            $login_data = [
                "email" => $email,
                "pwd" => $pwd
            ];

            $_SESSION["login_data"] = $login_data;

            header("Location: ../log_in.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["first_name"] . " " . $result["last_name"]);

        $_SESSIONS['last_regeneration'] = time();
        header("Location: ../index.php?login=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../log_in.php");
    die();
}