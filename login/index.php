<?php
session_start();
include "../app/connection.php";
if (!empty($_SESSION['username']) and !empty($_SESSION['passwd'])) {
    header('location:../index.php');
} else {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $passwd = md5($_POST['passwd']);
        $tampil = mysqli_query($conn, "SELECT * FROM tbl_user_dwirizki WHERE username='$username' AND passwd='$passwd'");
        $data = mysqli_fetch_array($tampil);
        if (empty($data['username'])) {
            echo "<script>alert('Login Failed');
                window.location='index.php';</script>";
        } elseif ($_SESSION["captcha"] != $_POST["captcha"]) {
            echo "<script>alert('Wrong Captcha!')</script>";
        } else {
            $_SESSION['id'] = $data['id'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['passwd'] = $data['passwd'];
            echo "<script>alert('You have been logged in');
        window.location='../index.php?page=dashboard';</script>";
        }
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIService | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../assets/css/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><b>SI</b>Service</p>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <form action="index.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="passwd" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-3">
                            <img src="../app/captcha.php" alt="">
                        </div>
                        <div class="col">
                            <input type="text" name="captcha" class="form-control" placeholder="Captcha" required>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/adminlte.min.js"></script>

    </body>

    </html>
    <?php
}
?>
