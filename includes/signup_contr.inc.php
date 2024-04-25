<?php

declare(strict_types=1);

function is_input_empty(string $first_name, string $last_name, string $email, string $phone, string $pwd, string $confirm_pwd) 
{
    $array = [$first_name, $last_name, $email, $phone, $pwd, $confirm_pwd];
    $non_empty_elements = array_filter($array);
    if (count($non_empty_elements) < count($array)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $first_name, string $last_name) 
{
    if (get_username($pdo, $first_name, $last_name)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $first_name, string $last_name, string $email, string $phone, string $pwd)
{
    set_user($pdo, $first_name, $last_name, $email, $phone, $pwd);
}