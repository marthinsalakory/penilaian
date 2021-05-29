<?php

include "fungsi.php";

// cek login
if (isset($_SESSION["login"])) {
    header("Location: " . $BASEURL);
    exit;
}

// cek apakah tombol jual sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasi di tambahkan atau tidak
    if (register($_POST) > 0) {
        $_SESSION["sukses"] = true;
        header("Location: " . $BASEURL . "/login.php");
        exit;
    } else {
        $error = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian | Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Login Css -->
    <link rel="stylesheet" href="<?= $BASEURL; ?>/asset/css/login.css">

</head>

<body>

    <body class="align">

        <div class="grid">

            <?php if (isset($error)) : ?>
                <div style="display: flex;">
                    <h5 style="color: red; margin-left: auto; margin-right: auto;">Konfirmasi Password Tidak Sesuai</h5><br>
                </div>
            <?php endif; ?>

            <div class="header">
                <h1>PENILAIAN</h1>
            </div>

            <form action="" method="POST" class="form login">

                <div class="form__field">
                    <label for="login__username"><svg class="icon">
                            <use xlink:href="#icon-user"></use>
                        </svg><span class="hidden">Full Name</span></label>
                    <input autocomplete="fullname" id="login__username" type="text" name="nama_lengkap" class="form__input" placeholder="Full Name" required>
                </div>

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
                    <input id="password" type="password" name="password" class="form__input" placeholder="Password" value="" required>
                </div>

                <div class="form__field">
                    <label for="login__password2"><svg class="icon">
                            <use xlink:href="#icon-lock"></use>
                        </svg><span class="hidden form-control is-invalid">Password Confirmation</span></label>
                    <input id="password2" autocomplete="off" type="password" name="password2" class="form__input konfirmasi" placeholder="Password Confirmation" required>
                </div>

                <div class="form__field">
                    <input type="submit" name="submit" value="Sign Up">
                </div>

            </form>

            <p class="text--center">Already registered? <a href="<?= $BASEURL; ?>/login.php">Sign in now</a> <svg class="icon">
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

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>

    </body>
</body>

</html>