<?php require 'vendors/fungsi/fungsi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="vendors/img/logokasir.png">
    <link rel="stylesheet" href="style.css" />
    <title>Kelompok2B : Log In</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form class="sign-in-form" action="" method="post">
                    <h2 class="title">Log In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="user" required="" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="pass" required="" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" name="daftar" />
                </form>
                <?php
                if (@$_POST['daftar']) {
                    $proses->login();
                }
                ?>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Pengguna Baru ?</h3>
                    <p>
                        Mari Daftar Akun Terlebih Dahulu !
                    </p>
                    <button class="btn transparent"><a href="register.php" style="color: white; font-weight:bold;">
                            Register
                        </a></button>
                        <button class="btn transparent"><a href="../index.html" style="color: white; font-weight:bold;">
                            Home Page
                        </a></button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>