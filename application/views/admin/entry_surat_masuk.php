<form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/surat/tambah" method="post">
   <div class="row">

      <div class="col-md-6">
         <div class="form-group">
            <label> Surat Dari </label>
            <!-- <select class="form-control" name="surat_dari">
               <?php foreach ($opd as $key) { ?>
                  <option value="<?php echo $key->nama_opd ?>"> <?php echo $key->nama_opd ?> </option>
               <?php } ?>

            </select> -->
            <input type="text" name="surat_dari" class="form-control" required="">

         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label> No Agenda </label>
            <input type="text" name="no_agenda_surat" readonly value="<?php echo $kode ?>" class="form-control" required="">
         </div>
      </div>

      <div class="col-md-6">
         <div class="form-group">
            <label>Tanggal diterima :</label>
            <input type="date" name="surat_diterima_tgl" class="form-control" required="">
         </div>
      </div>

      <div class="col-md-6">
         <div class="form-group">
            <label>Nomor Surat :</label>
            <input type="text" name="no_surat" class="form-control">
         </div>
      </div>


      <div class="col-md-6">
         <div class="form-group">
            <label>Tanggal Surat :</label>
            <input type="date" class="form-control" name="surat_tanggal">
         </div>
      </div>

      <div class="col-md-6">
         <div class="form-group">
            <label>Upload Filenya :</label>
            <input type="file" class="form-control" name="surat_file">
         </div>
      </div>
      <br>
      <hr>
      <hr>
      <div class="col-md-12">
         <div class="form-group">
            <label> Perihal :</label>
            <textarea class="form-control" name="surat_perihal" required="">
            </textarea>
         </div>
      </div>
      <!-- <div class="col-md-6">
          <div class="form-group">
             <label> Isi Disposisi :</label>
             <div class="form-check">
                <input type="checkbox" name="surat_keterangan[]" id="exampleRadios1" value="ke saya;" checked>
                <label class="form-check-label" for="exampleRadios1">
                   Ke Saya
                </label>
             </div>
             <div class="form-check">
                <input type="checkbox" name="surat_keterangan[]" id="exampleRadios2" value="koordinasikan;">
                <label class="form-check-label" for="exampleRadios2">
                   Koordinasikan
                </label>
             </div>
             <div class="form-check disabled">
                <input type="checkbox" name="surat_keterangan[]" id="exampleRadios3" value="pantau progresnya;">
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
   <input type="submit" value="Submit">
</form>