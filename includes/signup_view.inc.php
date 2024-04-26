<?php

declare(strict_types=1);

function insert_input($input_id, $value, $label_value, $input_type, $input_class, $input_placeholder)
{
    $hidden = ($input_id === "email" || $input_id === "password") ? "" : " hidden";
    echo 
        '<div class="fieldset' . $hidden . '">
            <label for="' . $input_id . '">' . $label_value . '</label>
            <input placeholder="' . $input_placeholder . '" type="' . $input_type .'" class="' . $input_class . '" id="' . $input_id . '" name="' . $input_id . '" value="' . $value . '">
        </div>';
}


function signup_inputs() 
{
    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["first-name"])) {
        insert_input('first-name', '', 'First name', 'text', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["signup_data"]["first-name"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        insert_input('first-name', $_SESSION["signup_data"]["first-name"], 'First name', 'text', '', '');
    } elseif (isset($_SESSION["errors_signup"]["username_taken"])) {
        insert_input('first-name', '', 'First name', 'text', 'error', $_SESSION["errors_signup"]["username_taken"]);
    } else {
        insert_input('first-name', '', 'First name', 'text', '', '');
    }

    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["last-name"])) {
        insert_input('last-name', '', 'Last name', 'text', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["signup_data"]["last-name"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        insert_input('last-name', $_SESSION["signup_data"]["last-name"], 'Last name', 'text', '', '');
    } elseif (isset($_SESSION["errors_signup"]["username_taken"])) {
        insert_input('last-name', '', 'Last name', 'text', 'error', $_SESSION["errors_signup"]["username_taken"]);
    } else {
        insert_input('last-name', '', 'Last name', 'text', '', '');
    }

    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["email"])) {
        insert_input('email', '', 'Email', 'email', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        insert_input('email', $_SESSION["signup_data"]["email"], 'Email', 'email', '', '');
    } elseif (isset($_SESSION["errors_signup"]["email_taken"])) {
        insert_input('email', '', 'Email', 'email', 'error', $_SESSION["errors_signup"]["email_taken"]);
    } elseif (isset($_SESSION["errors_signup"]["invalid_email"])) {
        insert_input('email', '', 'Email', 'email', 'error', $_SESSION["errors_signup"]["invalid_email"]);
    } else {
        insert_input('email', '', 'Email', 'email', '' ,'');
    }
    
    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["phone"])) {
        insert_input('phone', '', 'Phone number', 'phone', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["signup_data"]["phone"]) && !isset($_SESSION["errors_signup"]["phone_taken"]) && !isset($_SESSION["errors_signup"]["invalid_number"])) {
        insert_input('phone', $_SESSION["signup_data"]["phone"], 'Phone number', 'tel', '', '');
    } elseif (isset($_SESSION["errors_signup"]["phone_taken"])) {
        insert_input('phone', '', 'Phone number', 'tel', 'error', $_SESSION["errors_signup"]["phone_taken"]);
    } elseif (isset($_SESSION["errors_signup"]["invalid_number"])) {
        insert_input('phone', '', 'Phone number', 'tel', 'error', $_SESSION["errors_signup"]["invalid_number"]);
    } else {
        insert_input('phone', '', 'Phone number', 'tel', '' ,'');
    }


    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["password"]) && !isset($_SESSION["errors_signup"]["wrong_password"])) {
        insert_input('password', '', 'Password', 'password', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["errors_signup"]["wrong_password"])) {
        insert_input('password', '', 'Password', 'password', 'error', $_SESSION["errors_signup"]["wrong_password"]); 
    } else {
        insert_input('password', '', 'Password', 'password', '', '');
    }

    if (isset($_SESSION["errors_signup"]["empty_input"]) && empty($_SESSION["signup_data"]["confirm_password"]) && !isset($_SESSION["errors_signup"]["wrong_password"])) {
        insert_input('confirm_password', '', 'Confirm password', 'password', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["errors_signup"]["wrong_password"])) {
        insert_input('confirm_password', '', 'Confirm password', 'password', 'error', $_SESSION["errors_signup"]["wrong_password"]);
    } else {
        insert_input('confirm_password', '', 'Confirm password', 'password', '', '');
    }
    unset($_SESSION);
}


function check_signup_errors() 
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='form-error'>" . $error . "</p>";
        }
        unset($_SESSION['error_signup']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] === "success") {
        echo "<br>";
        echo "<p class='form-success'>Signup success!</p>";
    }
}