<?php

declare(strict_types=1);

function signup_inputs() 
{
    if (isset($_SESSION["signup_data"]["first-name"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo 
        '<div class="fieldset hidden">
            <label for="first-name">First name</label>
            <input type="text" id="first-name" name="first-name" value="' . $_SESSION["signup_data"]["first-name"] . '">
        </div>';
    } else {
        echo '
        <div class="fieldset hidden">
            <label for="first-name">First name</label>
            <input type="text" id="first-name" name="first-name">
        </div>';
    }

    if (isset($_SESSION["signup_data"]["last-name"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo 
        '<div class="fieldset hidden">
            <label for="last-name">Last name</label>
            <input type="text" id="last-name" name="last-name" value="' . $_SESSION["signup_data"]["last-name"] . '">
        </div>';
    } else {
        echo '
        <div class="fieldset hidden">
            <label for="last-name">Last name</label>
            <input type="text" id="last-name" name="last-name">
        </div>';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo 
        '<div class="fieldset hidden">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="' . $_SESSION["signup_data"]["email"] . '">
        </div>';
    } else {
        echo '
        <div class="fieldset">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>';
    }
    
    if (isset($_SESSION["signup_data"]["phone"])) {
        echo '
        <div class="fieldset hidden">
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" name="phone" value="' . $_SESSION["signup_data"]["phone"] . '">
        </div>';
    } else {
        echo '
        <div class="fieldset hidden">
            <label for="phone">Phone number</label>
            <input type="tel" id="phone" name="phone">
        </div>';
    }

    echo '
    <div class="fieldset">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>
    <div class="fieldset hidden">
        <label for="confirm_password">Confirm password</label>
        <input type="password" id="confirm_password" name="confirm_password">
    </div>';
}


function check_signup_errors() 
{
    if (isset($_SESSION['error_signup'])) {
        $errors = $_SESSION['error_signup'];

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