<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <link rel="icon" href="<?php echo base_url() ?>assets2/logo.png">
  <title>My Surat &mdash; BPKAD</title>
  <!-- <style>
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 80%;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }

    .modal-body {
      padding: 2px 16px;
    }

    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }
  </style> -->

  <!-- Bootstrap Core CSS -->
  <!-- Custom CSS -->
  <!-- <link href="http://localhost/dpbt_rekom/assets/main/css/style.css" rel="stylesheet" -->

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/fontawesome/css/all.min.css">

  <!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script> -->
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets2/assets/css/components.css">


  <!-- General JS Scripts -->
  <script src="<?php echo base_url() ?>assets2/assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/popper.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/moment.min.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <!-- Page Specific JS File -->
  <!-- <script src="<?php echo base_url() ?>assets2/assets/js/page/bootstrap-modal.js"></script> -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets2/assets/js/page/modules-datatables.js"></script>
  <script src="<?php echo base_url() ?>assets2/assets/js/stisla.js"></script>



</head>



<body id="page-top">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>

      <?php $this->load->view($navbar) ?>
      <?php $this->load->view($sidebar) ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <marquee> SELAMAT DATANG DI APLIKASI DISPOSISI SURAT & UNDANGAN BPKAD </marquee>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4> <?php echo $title ?></h4>
                  </div>
                  <div class="card-body">
                    <?php $this->load->view($content) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- End of Main Content -->

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="http://localhost/surat/home"> Surat BPKAD</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
</body>
<!-- General JS Scripts -->
<!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
<!-- Page Specific JS File -->
<!-- <script src="<?php echo base_url() ?>assets2/assets/js/page/bootstrap-modal.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets2/assets/js/stisla.js"></script> -->
<!-- Template JS File -->


<script src="<?php echo base_url() ?>assets2/assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>assets2/assets/js/custom.js"></script>

<!-- Page Specific JS File -->

</html>