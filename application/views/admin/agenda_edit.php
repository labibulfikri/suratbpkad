 <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/agenda/agenda_edit" method="post">
     <div class="row">

         <div class="col-md-6">
             <div class="form-group">
                 <label> Undangan Dari </label>
                 <input type="text" hidden name="id_agenda" value="<?php echo $get_data['id_agenda'] ?>" class="form-control">
                 <input type="text" name="agenda_dari" value="<?php echo $get_data['agenda_dari'] ?>" class="form-control">
             </div>
         </div>
         <div class="col-md-6">
             <div class="form-group">
                 <label> Nomor Agenda </label>
                 <input type="text" readonly name="no_agenda" value="<?php echo $get_data['no_agenda'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal diterima :</label>
                 <input type="date" name="agenda_diterima_tgl" value="<?php echo $get_data['agenda_diterima_tgl'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Nomor Undangan :</label>
                 <input type="text" name="agenda_no_masuk" value="<?php echo $get_data['agenda_no_masuk'] ?>" class="form-control">
             </div>
         </div>


         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal Undangan :</label>
                 <input type="date" class="form-control" value="<?php echo $get_data['agenda_tgl'] ?>" name="agenda_tanggal">
             </div>
         </div>


         <div class="col-md-6">
             <div class="form-group">
                 <label> Waktu :</label>
                 <input type="time" value="<?php echo $get_data['agenda_waktu'] ?>" class="form-control" name="agenda_waktu">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label> Tempat :</label>
                 <input type="text" value="<?php echo $get_data['agenda_tempat'] ?>" class="form-control" name="agenda_tempat">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">

                 <?php if ($get_data['nama_agenda'] == null) { ?>

                     <label>File Undangan :</label>
                     <input type="file" class="form-control" name="new_agenda_file">
                 <?php } else { ?>
                     <label>File Undangan :</label>
                     <a target="_blank" href="<?php echo base_url() ?>assets2/file_agenda/<?php echo $get_data['nama_agenda']  ?>"> <br><img width="30px" src="<?php echo base_url() ?>assets2/download.png"> </a>
                     <hr>
                     <input readonly type="text" hidden class="form-control" value="<?php echo $get_data['nama_agenda'] ?>" name="old_agenda">
                     <input type="file" class="form-control" name="new_agenda_file"><?php } ?>

             </div>
         </div>
         <br>
         <hr>
         <hr>

         <div class="col-md-12">
             <div class="form-group">
                 <label> Perihal :</label>
                 <textarea class="form-control" name="agenda_perihal" rows="4" cols="100"> <?php echo $get_data['agenda_perihal']  ?> </textarea>
             </div>
         </div>
         <div class="row"></div>
         <hr>

     </div>
     <input type="submit" value="Submit">
 </form>