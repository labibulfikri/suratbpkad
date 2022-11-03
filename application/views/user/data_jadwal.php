<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Permohonan</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">


            <?php if ($data_nik == null) { ?>
                <div class="alert alert-danger" role="alert">
                    Anda Belum Melengkapi Data NIK dan Foto KTP <br>
                    Silahkan Lengkapi Terlebih dahulu <a href="<?php echo base_url('profile') ?>" class="alert-link"> Klik Disini untuk melengkapi</a>.
                </div>
            <?php } else { ?>
                <p class="mb-4"> Jika Dalam Permohonan belum bisa silahkan hubungi nompr dibawah ini untuk melakukan verifikasi </p>
                <a href="<?php echo base_url('jadwal/tambah') ?>" class="btn btn-primary btn-sm"> Ajukan Permohonan Jadwal </a>
            <?php } ?>
            <!-- <h6 class="m-0 font-weight-bold text-primary"> Data Permohonan</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Tiket</th>
                            <th>Nama Tahanan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Tiket</th>
                            <th>Nama Tahanan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datanya as $value) { ?>
                            <tr>
                                <td> <?= $value->no_jadwal ?></td>
                                <td> <?= $value->nama_tahanan ?></td>
                                <td> <?= $value->tgl_jadwal ?></td>
                                <td> <?= $value->jam_mulai ?> </td>
                                <td> <?= $value->jam_selesai ?> </td>
                                <?php if ($value->status == 0) { ?>
                                    <td>
                                        <p class="text-small pull-left"> Pending </p>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                <?php } else if ($value->status == 1) { ?>
                                    <td>
                                        <p class="text-small pull-left"> Menunggu Verifikasi </p>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                <?php } else { ?>
                                    <td>

                                        <p class="text-small pull-left"> Sudah Verifikasi </p>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                <?php } ?>

                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>