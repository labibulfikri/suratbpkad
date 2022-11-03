<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">e- Temon </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/jadwal') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span> Permohonan Jadwal </span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span> Data User </span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('admin/tahanan') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span> Data Tahanan </span></a>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Setting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Profil:</h6> -->
                <a class="collapse-item" href="<?php echo base_url('admin/profile') ?>">Profil</a>
                <a class="collapse-item" href="<?php echo base_url('admin/profile/do_ganti_password') ?>">Ubah Password</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>