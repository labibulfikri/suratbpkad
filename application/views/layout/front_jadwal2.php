<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets2/assets/img/apple-icon.png">
    <link rel="icon" href="<?php echo base_url() ?>assets2/logo.png">
    <title>
        Jadwal Rapat BPKAD Surabaya
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/css/material-kit.css?v=2.0.3">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url() ?>assets2/assets/assets-for-demo/demo.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets2/assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
</head>

<body class="blog-posts ">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://localhost/surat/">Jadwal Rapat BPKAD</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </nav>
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(&apos;<?php echo base_url() ?>assets2/assets/img/bg10.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title"> Jadwal Rapat BPKAD <?php echo $coba ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto text-center">
                        <ul class="nav nav-pills nav-pills-primary">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pill1" data-toggle="tab"> <?php echo $hariini ?> / <?php echo date('d-m-Y') ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill2" data-toggle="tab"> <?php echo $getbesok ?> / <?php echo $besok ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pill3" data-toggle="tab"><?php echo $getbesoklagi ?> / <?php echo $besoklagi ?></a>
                            </li>

                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="pill1">
                                <div class="table-responsive">
                                    <?php

                                    $no = 1;
                                    $jum = 1;
                                    echo "<table class='table table-striped table-resposinve table-hover table-bordered table-sm'>";
                                    echo "  <thead class='table-primary font'><tr>
                                        <th> No</th>
                                        <th> Pukul</th>
                                        <th> Asal Surat </th>
                                        <th> Perihal </th>
                                        <th> Tempat</th>
                                        <th> Disposisi</th>
                                    </tr></thead>";
                                    // while ($row = mysql_fetch_array($sql)) {


                                    foreach ($datanya as $value) {
                                        // echo '<tr>';
                                        // echo '<td  rowspan="' . $value->jumlah . '">' . $no . '</td>';
                                        // echo '<td rowspan="' . $value->jumlah . '">' . $value->agenda_perihal . '</td>';
                                        // echo '<td  rowspan="' . $value->jumlah . '">' . $value->agenda_waktu . '</td>';
                                        // echo '<td  rowspan="' . $value->jumlah . '">' . $value->agenda_tgl . '</td>';
                                        // echo '<td  rowspan="' . $value->jumlah . '">' . $value->agenda_tempat . '</td>';
                                        // echo '</tr>';


                                        if ($jum <= 1) {
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $no . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_waktu . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_dari . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_perihal . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_tempat . '</td>';
                                            $jum = $value->jumlah;
                                            // echo '<td  >' . $value->nama_bidang . ' ( ' . $value->kode_bidang . ' )W</td>';
                                            $no++;
                                        } else {
                                            $jum = $jum - 1;
                                        }
                                        echo '<td class="table-success"  >' . $value->kode_bidang . '</td>';
                                        // echo '<td   >' . $value->nama_bidang . ' ( ' . $value->kode_bidang . ' )</td>';
                                        echo '</tr>';
                                    }
                                    // 
                                    ?>

                                    </table>
                                </div>

                            </div>
                            <div class=" tab-pane" id="pill2">
                                <div class="table-responsive">
                                    <?php

                                    $no = 1;
                                    $jum = 1;
                                    echo "<table class='table table-striped table-hover table-bordered table-sm'>";
                                    echo "  <thead class='table-primary'><tr>
                                       <th> No</th>
                                        <th> Pukul</th>
                                        <th> Asal Surat </th>
                                        <th> Perihal </th>
                                        <th> Tempat</th>
                                        <th> Disposisi</th>

                                    </tr></thead>";
                                    // while ($row = mysql_fetch_array($sql)) {
                                    foreach ($datanya_besok as $value) {

                                        if ($jum <= 1) {
                                            echo ' <td class="table-success" rowspan="' . $value->jumlah . '">' . $no . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_waktu . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_dari . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_perihal . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_tempat . '</td>';
                                            $jum = $value->jumlah;
                                            $no++;
                                        } else {
                                            $jum = $jum - 1;
                                        }
                                        // echo '<td   >' . $value->nama_bidang . ' ( ' . $value->kode_bidang . ' )</td>';
                                        echo '<td class="table-success"  >'  . $value->kode_bidang . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>

                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="pill3">
                                <div class="table-responsive">
                                    <?php

                                    $no = 1;
                                    $jum = 1;
                                    echo "<table class='table table-striped table-hover table-bordered table-sm'>";
                                    echo "  <thead class='table-primary'><tr>
                                       <th class='text-center'> No</th>
                                        <th> Pukul</th>
                                        <th> Asal Surat </th>
                                        <th> Perihal </th>
                                        <th> Tempat</th>
                                        <th> Disposisi</th>

                                    </tr>";
                                    // while ($row = mysql_fetch_array($sql)) {
                                    foreach ($datanya_besok_lagi as $value) {

                                        if ($jum <= 1) {
                                            echo ' <td class="table-success" rowspan="' . $value->jumlah . '">' . $no . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_waktu . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_dari . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_perihal . '</td>';
                                            echo '<td class="table-success" rowspan="' . $value->jumlah . '">' . $value->agenda_tempat . '</td>';
                                            $jum = $value->jumlah;
                                            $no++;
                                        } else {
                                            $jum = $jum - 1;
                                        }
                                        echo '<td class="table-success"  >' . $value->kode_bidang . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>

                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets2/assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/js/bootstrap-material-design.js"></script>
    <!--  Google Maps Plugin  -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/nouislider.min.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--	Plugin for Small Gallery in Product Page -->
    <script src="<?php echo base_url() ?>assets2/assets/js/plugins/jquery.flexisel.js"></script>
    <!-- Plugins for presentation and navigation  -->
    <script src="<?php echo base_url() ?>assets2/assets/assets-for-demo/js/modernizr.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/assets-for-demo/js/vertical-nav.js"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="<?php echo base_url() ?>assets2/assets/js/material-kit.js?v=2.0.3"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="<?php echo base_url() ?>assets2/assets/assets-for-demo/js/material-kit-demo.js"></script>
</body>

</html>