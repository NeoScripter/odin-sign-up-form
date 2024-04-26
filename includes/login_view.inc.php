<?php

declare(strict_types=1);

function insert_input_log_in($input_id, $value, $label_value, $input_type, $input_class, $input_placeholder)
{
    $hidden = ($input_id === "email" || $input_id === "password") ? "" : " hidden";
    echo 
        '<div class="fieldset' . $hidden . '">
            <label for="' . $input_id . '">' . $label_value . '</label>
            <input placeholder="' . $input_placeholder . '" type="' . $input_type .'" class="' . $input_class . '" id="' . $input_id . '" name="' . $input_id . '" value="' . $value . '">
        </div>';
}


function signup_inputs_log_in() 
{
    if (isset($_SESSION["errors_login"]["empty_input"]) && empty($_SESSION["login_data"]["email"])) {
        insert_input_log_in('email', '', 'Email', 'email', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["login_data"]["email"]) && !isset($_SESSION["errors_login"]["login_incorrect"])) {
        insert_input_log_in('email', '', 'Email', 'email', '', 'Incorrect login info!');
    } else {
        insert_input_log_in('email', '', 'Email', 'email', '' ,'');
    }
    
    if (isset($_SESSION["errors_login"]["empty_input"]) && empty($_SESSION["login_data"]["password"])) {
        insert_input_log_in('password', '', 'Password', 'password', 'error', 'Fill in this field!');
    } elseif (isset($_SESSION["login_data"]["pwd"]) && !isset($_SESSION["errors_login"]["login_incorrect"])) {
        insert_input_log_in('password', '', 'Password', 'password', 'error', 'Incorrect login info!');
    } else {
        insert_input_log_in('password', '', 'Password', 'password', 'error', '');
    }
   /*  $_SESSION["errors_login"] = null; */
}

