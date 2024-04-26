<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
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
        <form class="form" action="includes/signup.inc.php" method="POST">
            <div class="form-top">
                <p class="form-top-prg">This is not a real online service! You know you need something like this in your life to help you realize your deepest dreams.</p>
                <p>Sign up <em>now</em> to get started.</p>
                <br>
                <p>You <em>know</em> you want to.</p>
            </div>
            <div class="form-center">
                <h3 class="form-title">Let's do this!</h3>
                <div class="input-wrapper">
                    <!-- <div class="fieldset hidden">
                        <label for="first-name">First name</label>
                        <input type="text" id="first-name" name="first-name">
                    </div>
                    <div class="fieldset hidden">
                        <label for="last-name">Last name</label>
                        <input type="text" id="last-name" name="last-name">
                    </div>
                    <div class="fieldset">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="fieldset hidden">
                        <label for="phone">Phone number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="fieldset">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="fieldset hidden">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" id="confirm_password" name="confirm_password">
                    </div> -->
                    <?php
                    signup_inputs();
                    ?>
                </div>
                <?php
                unset($_SESSION);
                ?>
            </div>
            <div class="form-bottom">
                <button id="submit_btn" type="submit">Create Account</button>
                <p class="log-prg">Already have an account? <button type="button" class="log-link" id="log_in">Log in</button></p>
                <p class="log-prg">Don't have an account? <button type="button" class="log-link" id="create">Sign up</button></p>
            </div>
        </form>
    </div>
</body>
</html>