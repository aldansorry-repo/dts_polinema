<?php
include "system/koneksi.php";

$nama = "";
$email = "";
$alamat = "";


$nama_error = "";
$email_error = "";
$alamat_error = "";
$password_error = "";
if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];



    if ($nama == "") {
        $nama_error .= " Nama Harus Diisi |";
    }

    if ($email == "") {
        $email_error .= " Email Harus Diisi |";
    }

    if ($alamat == "") {
        $alamat_error .= "Alamat Isi Harus Diisi |";
    }

    if ($password == "") {
        $password_error .= "Password Isi Harus Diisi |";
    }

    if (ctype_alpha(str_replace(' ', '', $nama)) === false) {
        $nama_error .= " Nama Harus diisi huruf dan spasi |";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error .= " Email Tidak Valid |";
    }

    $nama_error = substr($nama_error, 0, -1);
    $email_error = substr($email_error, 0, -1);
    $alamat_error = substr($alamat_error, 0, -1);
    $password_error = substr($password_error, 0, -1);

    if ($nama_error == "" && $email_error == "" && $alamat_error == "") {
        $nama = addslashes(strip_tags($_POST['nama']));
        $email = addslashes(strip_tags($_POST['email']));
        $alamat = addslashes(strip_tags($_POST['alamat']));
        $password = md5(addslashes(strip_tags($_POST['password'])));
        $query = "Insert into user (nama,email,alamat,password) values ('$nama','$email','$alamat','$password')";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            $success_message = "Pengguna telah berhasil ditambahkan";
            header("location:index.php");
        } else {
            $error_message = "Pengguna telah gagal ditambahkan";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">

                            <?php if (isset($success_message)) : ?>
                                <div class="alert alert-success">
                                    <?php echo $success_message ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($error_message)) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $error_message ?>
                                </div>
                            <?php endif ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="au-input au-input--full" type="text" name="nama" placeholder="Nama">
                                    <?php echo $nama_error; ?>
                                </div>
                                <div class="form-group">
                                    <label>alamat</label>
                                    <textarea class="au-input au-input--full" type="text" name="alamat"></textarea>
                                    <?php echo $alamat_error; ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    <?php echo $email_error; ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    <?php echo $password_error; ?>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>
<!-- end document-->