<div class="container-fluid">

    <form action="<?php echo base_url('Profile/upload_ktp') ?>" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Upload NIK </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Masukkan NIK </label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" hidden name="id_user" value="<?php echo $id_user ?>" class="form-control" placeholder="ID User">
                                <input type="text" maxlength="16" value="<?php echo set_value('nik') ?>" class="form-control" name="nik" id="inputEmail3" placeholder="Masukkan NIK">
                                <span class="text-danger"> <?php echo form_error('nik') ?> </span>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">

                                <span class="text-danger text-sm"> file Maksmal 2 MB , File Harus JPEG</span>
                                <input type="file" class="form-control" name="file" required placeholder="File">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>