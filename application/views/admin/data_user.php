<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Permohonan</h1>
    <p class="mb-4"> Jika Dalam Permohonan belum bisa silahkan hubungi nompr dibawah ini untuk melakukan verifikasi </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <a href="<?php echo base_url('jadwal/tambah') ?>" class="btn btn-primary btn-sm"> Ajukan Permohonan Jadwal </a> -->
            <!-- <h6 class="m-0 font-weight-bold text-primary"> Data Permohonan</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO. </th>
                            <th>Nama User</th>
                            <th>NIK </th>
                            <th>Alamat </th>
                            <th>Email</th>
                            <th>Telphone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>NO. </th>
                            <th>Nama User</th>
                            <th>NIK </th>
                            <th>Alamat </th>
                            <th>Email</th>
                            <th>Telphone</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_user as $value) { ?>
                            <tr>
                                <td> <?= $no++ ?></td>
                                <td> <?= $value->nama ?></td>
                                <td> <?= $value->nik ?></td>
                                <td> <?= $value->alamat ?></td>
                                <td> <?= $value->email ?> </td>
                                <td> <?= $value->telp ?> </td>

                                <td> <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/user/detail/' . encrypt_url($value->id_user)) ?>"> Detail </a> </td>

                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>