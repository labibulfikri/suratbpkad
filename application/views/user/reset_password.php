<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Temon - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img src="<?php echo base_url() ?>assets/img/temon.png" height="100%" style="padding-top: 100px;" class="col-lg-6 d-none d-lg-block"></img>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"> Reset Password </h1>
                                    </div>

                                    <form id="sign_in" action="<?php echo base_url('auth/ad_reset_password') ?>" method="POST">
                                        <div class="msg"> Masukkan Password baru anda. </div>
                                        <input type="hidden" class="form-control" name="id_user" placeholder="id_user " value="<?php echo $dt->id_user ?>" required>
                                        <div class="form-group">
                                            <span class="input-group-addon">
                                                <span class="oi" data-glyph="lock-locked"></span>
                                            </span>
                                            <div class="form-line"><label class="text-danger text-sm"> password min 6 </label>
                                                <input type="password" class="form-control" name="password1" minlength="6" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="input-group-addon">
                                                <span class="oi" data-glyph="lock-locked"></span>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="password2" minlength="6" placeholder="Confirm Password" required>
                                                <span class="text-danger"> <?php echo form_error('password2') ?> </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button class="btn btn-primary bg-pink waves-effect" type="submit"> Submit</button>
                                            </div>
                                        </div>
                                        <div class="row m-t-15 m-b--20">

                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('daftar') ?>">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('auth') ?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>