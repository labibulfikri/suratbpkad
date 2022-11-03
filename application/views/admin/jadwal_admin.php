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
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Durasi</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datanya as $value) { ?>
                            <tr>
                                <td> <?= $value->nama_tahanan ?></td>
                                <td> <?= $value->tgl_jadwal ?></td>
                                <td> <?= $value->jam_mulai ?> </td>
                                <td> <?= $value->jam_selesai ?> </td>
                                <?php if ($value->status == 0) { ?>
                                    <td> Sedang di Verify </td>

                                <?php } else if ($value->status == 1) { ?>

                                    <td> Menunggu Verify </td>
                                <?php } else if ($value->status == 2) { ?>
                                    <td> Verify </td>

                                <?php } else { ?>
                                    <td> Selesai </td>
                                <?php } ?>

                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>