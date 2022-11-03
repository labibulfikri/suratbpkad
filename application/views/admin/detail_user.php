<div class="container-fluid">
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h2> Profile</h2>
                    <!-- <h4>Edit Profile</h4> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label> Nama </label>
                            <input type="text" value="<?php echo $data_pribadi['nama'] ?>" class="form-control" disabled required="">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" readonly class="form-control" value="<?php echo $data_pribadi['email'] ?>" required="">

                        </div>
                        <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" readonly value="<?php echo $data_pribadi['telp'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea rows="5" class="form-control" readonly> <?php echo $data_pribadi['alamat'] ?></textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-7 col-12">
                            <label> Kota </label>
                            <input type="email" class="form-control" readonly value="<?php echo $data_pribadi['kota'] ?>" required="">

                        </div>
                        <div class="form-group col-md-5 col-12">
                            <label>Kecamatan</label>
                            <input type="tel" class="form-control" readonly value="<?php echo $data_pribadi['kecamatan'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Kelurahan</label>
                            <input type="email" class="form-control" readonly value="<?php echo $data_pribadi['kelurahan'] ?>" required="">

                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <!-- <a class="btn-sm btn-primary btn" data-toggle="modal" id="tombolupdateModaluser" data-id="<?php echo $data_pribadi['id_user'] ?>" data-alamat="<?php echo $data_pribadi['alamat'] ?>" data-nama="<?php echo $data_pribadi['nama'] ?>" data-email="<?php echo $data_pribadi['email'] ?>" data-kota="<?php echo $data_pribadi['kota'] ?>" data-kecamatan="<?php echo $data_pribadi['kecamatan'] ?>" data-kelurahan="<?php echo $data_pribadi['kelurahan'] ?>" data-jk="<?php echo $data_pribadi['jenis_kelamin'] ?>" data-tlp="<?php echo $data_pribadi['telp'] ?>" data-target="#tambahModal"> Update </a> -->

                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h2> Foto KTP</h2>
                    <!-- <h4>Edit Profile</h4> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">

                            <?php if ($data_nik != null) { ?>


                                <div class="col-sm -6 center img-fluid mb-3">
                                    <center>
                                        <!-- <img class="" width="200" height="100" src="<?php echo base_url('assets/images/foto_ktp/') ?><?php echo $data_nik['foto'] ?>"> </img> -->
                                        <img src="<?php echo base_url() ?>assets/images/foto_ktp/<?php echo $data_pribadi['foto'] ?>" style="height: 300px; width: 400px;" class="card-img-top center pull-left" alt="...">
                                    </center>
                                </div>
                                <center>
                                    <strong class="profile-username text-center">NIK: <?php echo $data_nik['nik']; ?></strong>
                                    <!-- <button data-id="<?php echo $id_user ?>" data-toggle="modal" id="tombolupdateModalnik" data-nik="<?php echo $data_nik['nik'] ?>" data-gambar="<?php echo $data_nik['foto'] ?>" class="btn btn-sm btn-primary"> Update</button> -->
                                </center>


                            <?php } else { ?>

                                <strong class="profile-username text-center">NIK:<span class="text-danger text-sm"> Kosong </span></strong>

                            <?php } ?>

                        </div>
                    </div>

                    <!-- <div class="card-footer text-right">
                         <button class="btn btn-primary"> Edit</button>
                     </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////// -->