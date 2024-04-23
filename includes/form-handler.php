<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fields = ['first-name', 'last-name', 'email', 'phone', 'password', 'confirm_password'];
    $errors = [];
    $formData = [];

    foreach ($fields as $field) {
        // Using trim to remove any whitespace from the beginning and the end of the input
        $formData[$field] = trim($_POST[$field]);

        if (empty($formData[$field])) {
            $errors[$field] = ucfirst(str_replace('-', ' ', $field)) . ' is required.';
        }
    }

    if (!empty($errors)) {
        // Redirect back with errors and form data
        $_SESSION['errors'] = $errors;  // Storing errors in session
        $_SESSION['formData'] = $formData;  // Storing form data to repopulate form
        header("Location: ../index.php");
        exit();
    }

    // If no errors, process your form data as needed
    // Clear previous session data
    unset($_SESSION['errors']);
    unset($_SESSION['formData']);
    header("Location: ../success.php");  // Redirect to a success page if everything is fine
    exit();
}

// Redirect to form if the request method is not POST
header("Location: ../index.php");
exit();
