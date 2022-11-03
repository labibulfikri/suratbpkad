<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Permohonan</h1>
    <p class="mb-4"> Jika Dalam Permohonan belum bisa silahkan hubungi nomor dibawah ini untuk melakukan verifikasi </p>

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
                            <th>No. Tiket</th>
                            <th>Nama Pemohon</th>
                            <th>Nama Tahanan</th>
                            <th>Instansi</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Tiket</th>
                            <th>Nama Pemohon</th>
                            <th>Nama Tahanan</th>
                            <th>Instansi</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($datanya as $value) { ?>
                            <tr>
                                <td> <?= $value->no_jadwal ?></td>
                                <td> <?= $value->nama ?></td>
                                <td> <?= $value->nama_tahanan ?></td>
                                <td> <?= $value->instansi ?></td>
                                <td> <?= $value->tgl_jadwal ?></td>
                                <td> <?= $value->jam_mulai ?> </td>
                                <td> <?= $value->jam_selesai ?> </td>
                                <?php if ($value->status == 0) { ?>
                                    <td> <span class="badge rounded-pill bg-danger text-white">Proses</span> </td>

                                <?php } else if ($value->status == 1) { ?>

                                    <td> <span class="badge rounded-pill bg-warning text-white">Menunggu Otorisasi Kasitut </span> </td>
                                <?php } else if ($value->status == 2) { ?>
                                    <td> <span class="badge rounded-pill bg-primary text-white"> Verify </span> </td>
                                <?php } else { ?>

                                    <td> <span class="badge rounded-pill bg-success text-white"> Selesai </span> </td>
                                <?php } ?>
                                <td> <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/jadwal/detail/' . encrypt_url($value->id_jadwal)) ?>"> Detail </a> </td>

                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>