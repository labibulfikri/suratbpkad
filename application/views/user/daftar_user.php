<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E- Temon - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Custom styles for this template-->

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <center>

                        <img src="<?php echo base_url() ?>assets/img/temon.png" width="100%" height="200px" class="col-lg-5 d-none d-lg-block"></img>
                    </center>
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Daftar Akun Baru!</h1>
                            </div>
                            <form class="user" id="sign_up" action="<?php echo base_url('daftar/daftar_user') ?>" method="POST">

                                <div class="form-group">
                                    <label> Nama Lengkap </label>
                                    <input type="text" class="form-control" value="<?php echo set_value('nama') ?>" name="nama" placeholder=" Masukkan Nama Anda" required autofocus>
                                    <span class="text-danger"> <?php echo form_error('nama') ?> </span>
                                </div>

                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Alamat Email" required>
                                    <span class="text-danger"> <?php echo form_error('email') ?> </span>
                                </div>


                                <div class="form-group">
                                    <label> Telephone </label>
                                    <input type="number" class="form-control" name="telp" value="<?php echo set_value('telp') ?>" placeholder="No. Telephone" required>
                                    <span class="text-danger"> <?php echo form_error('telp') ?> </span>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin </label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="0" disabled selected> Silahkan Pilih</option>
                                        <option value="1"> Laki-Laki </option>
                                        <option value="2"> Perempuan </option>
                                    </select>
                                </div>

                                <div class="form-group form-line">
                                    <label> Alamat </label>
                                    <textarea class="form-control" rows="7" name="alamat" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required> </textarea>
                                    <span class="text-danger"> <?php echo form_error('alamat') ?> </span>
                                </div>

                                <div class="form-group">
                                    <label>Kota / Kabupaten </label>
                                    <span class="text-danger"> <?php echo form_error('id_regencie') ?> </span>
                                    <select class="kota form-control" name="id_regencie" required onchange="getKecamatan(this)"> </select>
                                </div>

                                <div class="form-group">
                                    <label> Kecamatan </label>
                                    <span class="text-danger"> <?php echo form_error('id_district') ?> </span>
                                    <select class="select2 form-control" id="kecamatan" name="id_district" required onchange="getKelurahan(this)">

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label> Kelurahan </label>
                                    <span class="text-danger"> <?php echo form_error('id_village') ?> </span>
                                    <select class="select2 form-control" required id="kelurahan" name="id_village">

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Password </label>
                                    <input type="password" class="form-control" name="password1" minlength="6" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <label> Konfirmasi Password </label>
                                    <input type="password" class="form-control" name="password2" minlength="6" placeholder="Confirm Password" required>
                                    <span class="text-danger"> <?php echo form_error('password2') ?> </span>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm bg-pink waves-effect" type="submit"> Daftar </button>
                                    <a href="<?php echo base_url('auth') ?>" class="btn btn-success btn-sm waves-effect"> Kembali Ke Menu Login </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- <div id="myDaftar" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4> PENGUMUMAN </h4>
                    </center>
                    <br>
                    <center>
                        <label style="text-align: center;"> Bagi Pelapor agar memperhatikan ketentuan sebagai berikut : </label>
                    </center>

                    <table style="padding: 80px; text-align: justify;">
                        <tr style="width: 500px;padding: 80px;">
                            <td style="width: 20px; padding:10px; vertical-align: baseline;"> 1. </td>
                            <td style="width: 500px; padding:10px; vertical-align: baseline"> Laporan Mengenai dugaan telah terjadinya tindak pidana korupsi paling sedikit memuat : </td>
                        </tr>

                        <tr>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> </td>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> a. Identitas Pelapor </td>
                        </tr>
                        <tr>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> </td>
                            <td style="width: 20px;  padding:10px; padding-top:5px; vertical-align: baseline;"> b. Uraian mengenai fakta tentang dugaan telah terjadi tindak pidana korupsi </td>
                        </tr>


                        <tr style="width: 500px;padding: 80px;">
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> 2. </td>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> Laporan harus disertai dengan dokumen pendukung paling sedikit : </td>
                        </tr>

                        <tr>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> </td>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> a. Fotokopi kartu penduduk atau identitas diri yang lain </td>
                        </tr>
                        <tr>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> </td>
                            <td style="width: 20px;  padding:10px; padding-top:5px; vertical-align: baseline;"> b. Dokumen atau keterangan yang terkait dengan dugaan tindak pidana korupsi yang dilaporkan </td>
                        </tr>

                        <tr style="width: 500px;padding: 80px;">
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> 3. </td>
                            <td style="width: 20px;  padding:10px; vertical-align: baseline;"> Kerahasiaan identitas pelapor kami jamin </td>
                        </tr>


                    </table>
                    <br>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(function() {
            $('.kota').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'masukkan nama propinsi',
                ajax: {
                    dataType: 'json',
                    url: '<?php echo base_url('daftar/get_kota') ?>',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        function getKecamatan(el) {
            var value = $(el).val();
            field = $("#kecamatan");
            field.html("<option class='form-control' value='0'>Loading.....</option>");

            $('#kecamatan').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'masukkan nama Kecamatan',
                ajax: {
                    dataType: 'json',
                    url: '<?php echo base_url('daftar/get_kec') ?>',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            id: value
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

        }
    </script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        function getKelurahan(el) {
            var value = $(el).val();
            field = $("#kelurahan");
            field.html("<option class='form-control' value='0'>Loading.....</option>");

            $('#kelurahan').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'masukkan nama kelurahan',
                ajax: {
                    dataType: 'json',
                    url: '<?php echo base_url('daftar/get_kelurahan') ?>',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term,
                            id: value
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });

        }
    </script>

    <!-- <script>
        $(document).ready(function() {
            $("#myDaftar").modal('show');
        });
    </script> -->


    <!-- Jquery Core Js -->

    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/examples/sign-up.js"></script>
</body>

</html>