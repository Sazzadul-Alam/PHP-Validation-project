
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in form</title>
</head>

<body>

    <section class="main-page">
            <h2 class="admin-login-text">Admin Log in</h2>

        <div class="form-div">
            <form action="../controller/loginAction.php" method="post" novalidate
                onsubmit="return emptyInputFieldforlogin()">
                <p class="email label">Email </p>
                <input class="input-field input-field-required" type="text" id="email"
                    name="email"><?php echo $_SESSION['emailErr'] ?><br>
                <p class="password label">Password </p>
                <input class="input-field input-field-required" type="password" id="pass" name="pass" minlength="8">
                <?php echo $_SESSION['passErr'] ?>
                <?php echo $_SESSION['err'] ?>
                <br>
                <input class="login-btn btn" type="submit" value="Log in">
            </form>
            <form action="">
                <button class="register-btn btn" type="submit" formaction="../view/registration.php">Register</button>
            </form>
        </div>

    </section>

    <?php
    $_SESSION['unameErr'] = $_SESSION['passErr'] = '';
    ?>
</body>

</html> 