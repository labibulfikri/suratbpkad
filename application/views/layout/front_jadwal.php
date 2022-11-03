<!DOCTYPE html>
<html lang="en">

<head>
    <title> Jadwal Rapat &mdash; BPKAD</title>
    <style>
        #formItem label {
            display: block;
            text-align: center;
            line-height: 150%;
            font-size: .85em;
        }
    </style>

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Start GA -->
    <!-- General JS Scripts -->
    <script src="<?php echo base_url() ?>assets2/assets/modules/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/popper.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/tooltip.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/modules/jquery-ui/jquery-ui.min.js"></script>


    <!-- Page Specific JS File -->
    <script src="<?php echo base_url() ?>assets2/assets/js/page/modules-datatables.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/css/components.css">
</head>


<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="http://localhost/surat/" class="navbar-brand sidebar-gone-hide">BPKAD</a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                </div>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
                    </ul> -->
                </div>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>

            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <marquee>
                        <h1 style="font-weight: bold; font-size: 15;">JADWAL RAPAT BPKAD </h1>
                    </marquee>

                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <!-- <div class="section-header">
                    </div> -->
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> Jadwal Rapat BPKAD</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-2">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true"> <?php echo $hariini ?> / <?php echo date('d-m-Y') ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false"> <?php echo $getbesok ?> / <?php echo $besok ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false"><?php echo $getbesoklagi ?> / <?php echo $besoklagi ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-10">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
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
                                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">

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
                                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
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


            <div class="card-footer bg-whitesmoke">
                <center>

                    <img style="align-items: center;" src="<?php echo base_url() ?>assets2/footer.png">

                    <br><label>
                        PEMERINTAH KOTA SURABAYA
                    </label>
                </center>
            </div>
        </div>
    </div>


    </section>
    </div>
    <!-- <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="http://localhost/surat/"> BPKAD </a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer> -->
    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets2/assets/js/stisla.js"></script> -->
    <!-- Template JS File -->
    <script src="<?php echo base_url() ?>assets2/assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets2/assets/js/custom.js"></script>
</body>

</html>