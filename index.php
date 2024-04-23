<?php
session_start();

// Retrieve error messages and form data from session if available
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : [];

// Clear session data after use to prevent errors from persisting on page refresh
unset($_SESSION['errors']);
unset($_SESSION['formData']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Sign-Up Form</title>
</head>
<body>
    <div class="outer-wrapper">
        <div class="bg-img-wrapper">
            <div class="img-wrapper-overlay">
                <div class="img-wrapper-overlay-subsection">
                    <img src="assets/images/odin-logo.png" alt="Odin" class="logo">
                    <span class="logo-text">ODIN</span>
                </div>
            </div>
            <div class="credit-wrapper">
                <p class="credit">Photo by <a href="https://unsplash.com/@haliewestphoto" class="credit-link">Halie West</a> on <a href="https://unsplash.com/" class="credit-link">Unsplash</a></p>
            </div>
        </div>
        <form class="form" action="includes/form-handler.php" method="POST">
            <div class="form-top">
                <p class="form-top-prg">This is not a real online service! You know you need something like this in your life to help you realize your deepest dreams.</p>
                <p>Sign up <em>now</em> to get started.</p>
                <br>
                <p>You <em>know</em> you want to.</p>
            </div>
            <div class="form-center">
                <h3 class="form-title">Let's do this!</h3>
                <div class="input-wrapper">
                <?php
                $fields = ['first-name', 'last-name', 'email', 'phone', 'password', 'confirm_password'];
                foreach ($fields as $field) {
                    $field_name = str_replace(array('_', '-'), ' ', ucfirst($field));
                    $hasError = isset($errors[$field]);
                    $errorClass = $hasError ? 'class="error"' : '';
                    $value = isset($formData[$field]) ? htmlspecialchars($formData[$field]) : '';
                    $inputType = ($field == 'password' || $field == 'confirm_password') ? 'password' : 'text';
                    $inputType = ($field == 'email') ? 'email' : $inputType;
                    $inputType = ($field == 'phone') ? 'tel' : $inputType;

                    echo "<div class='fieldset'>
                            <label for='{$field}'>{$field_name}</label>";
                    
                    // Only set the placeholder if there is an error
                    $placeholder = $hasError ? $errors[$field] : '';

                    // Generate the input element with dynamic placeholder and existing value
                    echo "<input type='{$inputType}' id='{$field}' name='{$field}' value='{$value}' {$errorClass} placeholder='{$placeholder}'></div>";
                }
                ?>

                </div>
            </div>
            <div class="form-bottom">
                <button type="submit">Create Account</button>
                <p class="log-prg">Already have an account? <a href="#" class="log-link">Log in</a></p>
            </div>
        </form>
    </div>
</body>
</html>