 <form enctype="multipart/form-data" action="<?php echo base_url() ?>admin/surat/surat_edit_proses" method="post">
     <div class="row">

         <div class="col-md-6">
             <div class="form-group">
                 <label> Surat Dari </label>
                 <input type="text" hidden name="id_surat" value="<?php echo $get_data['id_surat'] ?>" class="form-control">
                 <input type="text" name="surat_dari" value="<?php echo $get_data['surat_dari'] ?>" class="form-control">
             </div>
         </div>
         <div class="col-md-6">
             <div class="form-group">
                 <label> No Agenda </label>
                 <input type="text" name="no_agenda_surat" value="<?php echo $get_data['no_agenda_surat'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal diterima :</label>
                 <input type="date" name="surat_diterima_tgl" value="<?php echo $get_data['surat_diterima_tgl'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Nomor Surat :</label>
                 <input type="text" name="no_surat" value="<?php echo $get_data['no_surat'] ?>" class="form-control">
             </div>
         </div>


         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal Surat :</label>
                 <input type="date" class="form-control" value="<?php echo $get_data['surat_tanggal'] ?>" name="surat_tanggal">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <?php if ($get_data['nama_surat'] == null) { ?>

                     <label>File surat :</label>
                     <input type="file" class="form-control" name="new_surat_file">
                 <?php } else { ?>
                     <label>File surat :</label>
                     <a target="_blank" href="<?php echo base_url() ?>assets2/file_surat/<?php echo $get_data['nama_surat']  ?>"> <br><img width="30px" src="<?php echo base_url() ?>assets2/download.png"> </a>
                     <hr>
                     <input readonly type="text" hidden class="form-control" value="<?php echo $get_data['nama_surat'] ?>" name="old_surat">
                     <input type="file" class="form-control" name="new_surat_file"><?php } ?>


             </div>
         </div>
         <br>
         <hr>
         <hr>

         <div class="col-md-12">
             <div class="form-group">
                 <label> Perihal :</label>
                 <textarea name="surat_perihal" class="form-control"> <?php echo $get_data['surat_perihal']  ?></textarea>
             </div>
         </div>
         <hr>
         <div class="row"></div>
         <hr>
         <!-- <div class="col-md-6">
             <div class="form-group">
                 <label> Isi Disposisi :</label>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="ke saya;">
                     <label class="form-check-label">
                         Ke Saya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="koordinasikan;">
                     <label class="form-check-label">
                         Koordinasikan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="pantau progresnya;">
                     <label class="form-check-label">
                         Pantau Progresnya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="pelajari;">
                     <label class="form-check-label">
                         Pelajari
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="Rapat-koordinasikan;">
                     <label class="form-check-label">
                         Rapat - Koordinasikan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="Segera! Jangan Terlambat;">
                     <label class="form-check-label">
                         Segera! Jangan Terlambat
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="Siapkan;">
                     <label class="form-check-label">
                         Siapkan
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="Infokan;">
                     <label class="form-check-label">
                         Infokan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="Tindaklanjut ( TL );">
                     <label class="form-check-label">
                         Tindaklanjut ( TL )
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="Untuk Diketahui (UDK);">
                     <label class="form-check-label">
                         Untuk Diketahui (UDK)
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="surat_keterangan[]" value="Untuk Menjadi Perhatian (UMP);">
                     <label class="form-check-label">
                         Untuk Menjadi Perhatian (UMP)
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="Hadir;">
                     <label class="form-check-label">
                         Hadir
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="Ikut Hadir;">
                     <label class="form-check-label">
                         Ikut Hadir
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="surat_keterangan[]" value="Laporkan Hasilnya;">
                     <label class="form-check-label">
                         Laporkan Hasilnya
                     </label>
                 </div>
             </div>
         </div> -->
         <!-- <div class="col-md-6">
             <label class="form-check-label">Disposisi Kepada :</label>
             <div class="custom-control custom-checkbox">
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="6" type="checkbox" id="customRadioInline6" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline6"> KEPALA BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH </label>
                 </div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="1" type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline1"> SEKRETARIAT </label>
                 </div>
                 <div class="row"></div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="2" type="checkbox" id="customRadioInline2" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline2"> BIDANG ANGGARAN </label>
                 </div>
                 <div class="row"></div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="3" type="checkbox" id="customRadioInline3" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline3"> BIDANG PERBENDAHARAAN DAN AKUNTANSI</label>
                 </div>
                 <div class="row"></div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="4" type="checkbox" id="customRadioInline4" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline4"> BIDANG PENATAUSAHAAN, PEMANFAATAN DAN PEMINDAHTANGANAN BARANG MILIK DAERAH</label>
                 </div>
                 <div class="row"></div>
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="5" type="checkbox" id="customRadioInline5" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline5"> BIDANG PENGAMANAN DAN PENYELESAIAN SENGKETA BARANG MILIK DAERAH </label>
                 </div>

             </div>
         </div> -->

     </div>
     <input type="submit" value="Submit">
 </form>