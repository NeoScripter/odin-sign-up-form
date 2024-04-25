<?php

$pwd_signup = 'Andreev';

$options = [
    'cost' => 10
];

$hashed_pwd = password_hash($pwd_signup, PASSWORD_DEFAULT, $options);

$pwd_login = 'Andreev';

if (password_verify($pwd_login, $hashed_pwd)) {
    echo "They are the same";
} else {
    echo "They are not the same";
}