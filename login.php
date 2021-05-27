<?php

include "fungsi.php";

// cek login
if (isset($_SESSION["login"])) {
    header("Location: " . $BASEURL);
    exit;
}

if (isset($_SESSION["sukses"])) {
    $sukses = true;
}

// fungsi login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $pass = query("SELECT * FROM users WHERE username = '$username'")[0];
        if ($password == $pass['password']) {
            $_SESSION["login"] = true;
            $_SESSION["user"] = $pass['id'];
            header("Location: " . $BASEURL);
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian | Login</title>
    <!-- Login Css -->
    <link rel="stylesheet" href="<?= $BASEURL; ?>/asset/css/login.css">
</head>

<body>

    <body class="align">

        <div class="grid">

            <?php if (isset($sukses)) : ?>
                <div style="display: flex;">
                    <h3 style="color: green; margin-left: auto; margin-right: auto;">successfully registered</h3>
                </div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div style="display: flex;">
                    <h3 style="color: red; margin-left: auto; margin-right: auto;">Username / Password Salah</h3>
                </div>
            <?php endif; ?>

            <div class="header">
                <h1>PENILAIAN</h1>
            </div>

            <form action="" method="POST" class="form login">

                <div class="form__field">
                    <label for="login__username"><svg class="icon">
                            <use xlink:href="#icon-user"></use>
                        </svg><span class="hidden">Username</span></label>
                    <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
                </div>

                <div class="form__field">
                    <label for="login__password"><svg class="icon">
                            <use xlink:href="#icon-lock"></use>
                        </svg><span class="hidden">Password</span></label>
                    <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
                </div>

                <div class="form__field">
                    <input type="submit" name="login" value="Sign In">
                </div>

            </form>

            <p class="text--center">Not a member? <a href="<?= $BASEURL; ?>/register.php">Sign up now</a> <svg class="icon">
                    <use xlink:href="#icon-arrow-right"></use>
                </svg></p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="icons">
            <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
                <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
            </symbol>
            <symbol id="icon-lock" viewBox="0 0 1792 1792">
                <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
            </symbol>
            <symbol id="icon-user" viewBox="0 0 1792 1792">
                <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
            </symbol>
        </svg>

    </body>
</body>

</html>

<?php unset($_SESSION["sukses"]); ?>