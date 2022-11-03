<div class="container-fluid">



    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Permohonan</h1>
    <!-- <p class="mb-4"> Jika Dalam Permohonan belum bisa silahkan hubungi nompr dibawah ini untuk melakukan verifikasi </p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Data Pemohon
        </div>
        <div class="card-body">


            <table class="table table-responsive">
                <tr>
                    <td> NAMA PEMOHON </td>
                    <td style="width: 50%;">: <?php echo $get_det['nama'] ?> </td>
                    <td> <label class="form-label">Foto KTP :</label> </td>
                    <td rowspan="5" style="width: 50%;"> <img src="<?php echo base_url() ?>assets/images/foto_ktp/<?php echo $get_det['foto'] ?>" style="height: 300px; width: 400px;" class="card-img-top center pull-left" alt="...">
                    </td>
                </tr>
                <tr>
                    <td> ALAMAT </td>
                    <td>: <?php echo $get_det['alamat'] ?> </td>
                </tr>
                <tr>
                    <td> KOTA </td>
                    <td>: <?php echo $get_det['kota'] ?> </td>
                </tr>

                <tr>
                    <td> KECAMATAN </td>
                    <td>: <?php echo $get_det['kecamatan'] ?> </td>
                </tr>
                <tr>
                    <td> KELURAHAN</td>
                    <td>: <?php echo $get_det['kelurahan'] ?> </td>
                </tr>
            </table>
        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Permohonan Jadwal <label style="font-weight: bold;color: navy;"> #<?php echo $get_det['no_jadwal'] ?> </label>
        </div>
        <form method="POST" action="<?php echo base_url('admin/jadwal/tindak_lanjut') ?>">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label"> Nama Tahanan </label>
                        <input type="text" class="form-control" value="<?php echo $get_det['nama_tahanan'] ?> - <?php echo $get_det['instansi'] ?>  " readonly>
                        <input type="hidden" class="form-control" value="<?php echo $get_det['id_jadwal'] ?>" name="id_jadwal" readonly>
                    </div>

                    <div class="col-6">
                        <label for="inputAddress" class="form-label"> Tanggal </label>
                        <input type="text" class="form-control" value="<?php echo $get_det['tgl_jadwal'] ?>" readonly>
                    </div>
                    <div class="col-6">
                        <label for="inputAddress2" class="form-label"> Jam Mulai</label>
                        <input type="text" class="form-control" value="<?php echo $get_det['jam_mulai'] ?>" readonly id="inputAddress2">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label"> Jam Selesai</label>
                        <input type="text" class="form-control" value="<?php echo $get_det['jam_selesai'] ?>" readonly id="inputCity">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-6">

                    <?php if ($this->session->userdata('role') == '1') { ?>

                        <?php if ($get_det['status'] == 0) { ?>

                            <!-- <button type="submit" name="submit" value="lanjut" class="btn btn-sm btn-primary"> Lanjutkan Ke Kasitut</button> || -->
                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>
                        <?php } else if ($get_det['status'] == 1) { ?>


                            <button type="submit" name="submit" value="verify" class="btn btn-sm btn-primary"> Verifikasi</button> ||
                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>

                        <?php } else if ($get_det['status'] == 2) { ?>


                            <!-- <button type="submit" name="submit" value="selesai" class="btn btn-sm btn-success"> Selesai </button> || -->

                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>
                        <?php } else { ?>
                            <!-- <button type="submit" name="submit" value="selesai" class="btn btn-sm btn-success"> Selesai </button> || -->

                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>

                        <?php } ?>


                    <?php } else { ?>
                        <?php if ($get_det['status'] == 0) { ?>

                            <button type="submit" name="submit" value="lanjut" class="btn btn-sm btn-primary"> Lanjutkan Ke Kasitut</button> ||
                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>
                        <?php } else if ($get_det['status'] == 1) { ?>


                            <!-- <button type="submit" name="submit" value="verify" class="btn btn-sm btn-primary"> Verifikasi</button> || -->
                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>

                        <?php } else if ($get_det['status'] == 2) { ?>


                            <button type="submit" name="submit" value="selesai" class="btn btn-sm btn-success"> Selesai </button> ||

                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>
                        <?php } else { ?>
                            <!-- <button type="submit" name="submit" value="selesai" class="btn btn-sm btn-success"> Selesai </button> || -->

                            <a href="<?php echo base_url('admin/jadwal') ?>" class="btn btn-warning btn-sm"> Kembali </a>

                        <?php } ?>


                    <?php } ?>

                </div>
            </div>
        </form>
    </div>



</div>