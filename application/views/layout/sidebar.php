<!-- <div class="main-sidebar" style="background: linear-gradient(to right, #fc4a1a, #f7b733);"> -->
<div class="main-sidebar">
  <aside id=" sidebar-wrapper">

    <div class="sidebar-brand">
      <a href="http://localhost/surat/home"> BPKAD </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="http://localhost/surat/home">BPKAD</a>
    </div>
    <ul class="sidebar-menu">

      <?php if ($this->session->userdata('id_jabatan') == 1) { ?>

        <li class="menu-header">Surat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Surat</span></a>
          <ul class="dropdown-menu">
            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/tambah_data_surat">Entry Surat Masuk </a></li> -->
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat">Surat Masuk </a></li>
          </ul>
        </li>
        <li class="menu-header">Agenda Rapat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Agenda</span></a>
          <ul class="dropdown-menu">
            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/tambah_data_agenda">Entry Undangan Masuk </a></li> -->
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi_selesai"> Undangan Keluar</a>
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda"> Undangan Masuk</a></li>

          </ul>
        </li>

        <li class="menu-header">Otorisasi Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Otorisasi Undangan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi"> Otorisasi Undangan</a></li>
          </ul>
        </li>

      <?php } else if ($this->session->userdata('id_jabatan') == 2) { ?>
        <li class="menu-header">Surat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Surat</span></a>
          <ul class="dropdown-menu">

            <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/surat_dispo">Surat Masuk </a></li>

          </ul>
        </li>
        <li class="menu-header">Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Undangan</span></a>
          <ul class="dropdown-menu">
            <li> <a class="nav-link" href="<?php echo base_url() ?>admin/agenda/tambah_data_agenda_keluar">Entry Undangan Keluar </a>
            </li>
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi_selesai"> Undangan Keluar</a>
              <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi"> Undangan Keluar</a> -->

            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_dispo"> Undangan Masuk</a></li>
          </ul>
        </li>
        <li class="menu-header">Otorisasi Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Otorisasi Undangan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi"> Otorisasi Undangan</a></li>
          </ul>
        </li>

      <?php } else if ($this->session->userdata('id_jabatan') == 3) { ?>
        <li class="menu-header">Surat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Surat</span></a>
          <ul class="dropdown-menu">
            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/tambah_data_surat">Entry Surat Keluar </a></li> -->
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/surat_dispo">Surat Masuk </a></li>
          </ul>
        </li>
        <li class="menu-header">Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Undangan</span></a>

          <ul class="dropdown-menu">
            <li> <a class="nav-link" href="<?php echo base_url() ?>admin/agenda/tambah_data_agenda_keluar">Entry Undangan Keluar </a>
            </li>
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi"> Undangan Keluar</a>
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_dispo"> Undangan Masuk</a>
            </li>
          </ul>
        </li>

      <?php } else if ($this->session->userdata('id_jabatan') == 4) { ?>
        <li class="menu-header">Surat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Surat</span></a>
          <ul class="dropdown-menu">
            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/tambah_data_surat">Entry Surat Keluar </a></li> -->
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/surat_dispo">Surat Masuk </a></li>
          </ul>
        </li>
        <li class="menu-header">Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Undangan</span></a>
          <ul class="dropdown-menu">

            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_dispo"> Undangan Masuk</a></li>
          </ul>
        </li>

      <?php } else { ?>

        <li class="menu-header">Surat </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Surat</span></a>
          <ul class="dropdown-menu">
            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/tambah_data_surat">Entry Surat Keluar </a></li> -->
            <?php if ($this->session->userdata('id_bidang') == 22) { ?>
              <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/tambah_data_surat">Entry Surat Masuk </a></li>
              <li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/surat_proses">Proses Surat Masuk </a></li>
            <?php } ?><li><a class="nav-link" href="<?php echo base_url() ?>admin/surat/surat_dispo">Surat Masuk </a></li>
          </ul>
        </li>
        <li class="menu-header">Undangan </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Undangan</span></a>
          <ul class="dropdown-menu">

            <!-- <li> <a class="nav-link" href="<?php echo base_url() ?>admin/agenda_keluar">Entry Undangan Keluar </a> -->
            <?php if ($this->session->userdata('id_bidang') == 22) { ?>
              <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/tambah_data_agenda">Entry Undangan Masuk </a></li>
              <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_proses">Proses Undangan Masuk </a></li>
            <?php } ?>

            <!-- <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_keluar_otorisasi"> Undangan Keluar</a> -->
            <li><a class="nav-link" href="<?php echo base_url() ?>admin/agenda/agenda_dispo"> Undangan Masuk</a></li>
          </ul>
        </li>


      <?php } ?>
    </ul>
  </aside>
</div>