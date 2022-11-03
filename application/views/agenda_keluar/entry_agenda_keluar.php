<form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/agenda/tambah_agenda_keluar" method="post">
    <div class="row">

        <!-- <div class="col-md-6">
            <div class="form-group">
                <label> Agenda Dari </label> -->
        <!-- <select class="form-control" name="agenda_dari">
                    <?php foreach ($opd as $key) { ?>
                        <option value="<?php echo $key->nama_opd ?>"> <?php echo $key->nama_opd ?> </option>
                    <?php } ?>

                </select> -->
        <!-- <input type="text" name="agenda_dari" class="form-control" required="">
            </div>
        </div> -->
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label> No Agenda </label>
                <input type="text" name="no_agenda_agenda" class="form-control">
            </div>
        </div> -->

        <!-- <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal diterima :</label>
                <input type="date" name="agenda_diterima_tgl" class="form-control" required="">
            </div>
        </div> -->

        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor Undangan :</label>
                <!-- <input type="text" name="no_agenda" class="form-control" required=""> -->
                <input type="text" name="agenda_no_keluar" class="form-control" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor Agenda :</label>
                <!-- <input type="text" name="no_agenda" class="form-control" required=""> -->
                <input type="text" readonly name="no_agenda" value="<?php echo $kode ?>" class="form-control" required="">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal :</label>
                <input type="date" class="form-control" name="agenda_tanggal" required="">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label> Waktu :</label>
                <input type="time" class="form-control" name="agenda_waktu" required="">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label> Tempat :</label>
                <input type="text" class="form-control" name="agenda_tempat" required="">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Upload File :</label>
                <input type="file" class="form-control" name="agenda_file">
                <!-- <input type="file" class="form-control" name=""> -->
            </div>
        </div>
        <br>
        <hr>
        <hr>
        <div class="col-md-12">
            <div class="form-group">
                <label> Perihal :</label>
                <textarea class="form-control" name="agenda_perihal" required="">
            </textarea>
            </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="form-group">
             <label> Isi Disposisi :</label>
             <div class="form-check">
                <input type="checkbox" name="agenda_keterangan[]" id="exampleRadios1" value="ke saya;" checked>
                <label class="form-check-label" for="exampleRadios1">
                   Ke Saya
                </label>
             </div>
             <div class="form-check">
                <input type="checkbox" name="agenda_keterangan[]" id="exampleRadios2" value="koordinasikan;">
                <label class="form-check-label" for="exampleRadios2">
                   Koordinasikan
                </label>
             </div>
             <div class="form-check disabled">
                <input type="checkbox" name="agenda_keterangan[]" id="exampleRadios3" value="pantau progresnya;">
                <label class="form-check-label" for="exampleRadios3">
                   Pantau Progresnya
                </label>
             </div>
          </div>
       </div> -->
        <!-- <div class="col-md-6">
          <div class="form-group">
             <label>Disposisi Kepada :</label>
             <div class="custom-control custom-checkbox">
                <div class="custom-control custom-radio custom-control-inline">
                   <input type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                   <label class="custom-control-label" for="customRadioInline1"> Bidang A </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                   <input type="checkbox" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                   <label class="custom-control-label" for="customRadioInline2"> Bidang B</label>
                </div>
             </div>
          </div>
       </div> -->

    </div>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>