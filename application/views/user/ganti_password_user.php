<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">


                            <div class="card-body">
                                <form action="<?php echo base_url('profile/ganti_password') ?>" method="post">
                                    <strong> Password Lama</strong>
                                    <input type="password" name="password_lama" class="form-control" placeholder="Password Lama" required>
                                    <hr>

                                    <strong> Password Baru</strong>
                                    <input type="password" name="password1" class="form-control" minlength="6" placeholder="Password Baru" required>
                                    <hr>

                                    <strong> Ulangi Password Baru </strong>
                                    <input type="password" name="password2" class="form-control" minlength="6" placeholder="Confirm Password" required>
                                    <span class="text-danger"> <?php echo form_error('password2') ?> </span>
                                    <hr>
                                    <button class="btn btn-sm btn-primary" type="submit"> Simpan </button>
                                </form>
                            </div>


                        </div>

                    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>