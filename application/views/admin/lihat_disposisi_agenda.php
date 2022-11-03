 <div class="row">

     <div class="col-md-6">
         <div class="form-group">
             <label> Undangan Dari </label>
             <input type="text" hidden name="id_agenda" value="<?php echo $get_data['id_agenda'] ?>" class="form-control">
             <input type="text" name="agenda_dari" disabled value="<?php echo $get_data['agenda_dari'] ?>" class="form-control">
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label> No Agenda </label>
             <input type="text" name="no_agenda" disabled value="<?php echo $get_data['no_agenda'] ?>" class="form-control">
         </div>
     </div>

     <div class="col-md-6">
         <div class="form-group">
             <label>Tanggal diterima :</label>
             <input type="date" name="agenda_diterima_tgl" disabled value="<?php echo $get_data['agenda_diterima_tgl'] ?>" class="form-control">
         </div>
     </div>

     <div class="col-md-6">
         <div class="form-group">
             <label>Nomor Undangan :</label>
             <input type="text" name="no_agenda" disabled value="<?php echo $get_data['agenda_no_masuk'] ?>" class="form-control">
         </div>
     </div>


     <div class="col-md-6">
         <div class="form-group">
             <label>Tanggal Undangan :</label>
             <input type="date" class="form-control" disabled value="<?php echo $get_data['agenda_tgl'] ?>" name="agenda_tanggal">
         </div>
     </div>


     <div class="col-md-6">
         <div class="form-group">
             <label> Waktu :</label>
             <input type="text" value="<?php echo $get_data['agenda_waktu'] ?>" disabled class="form-control" name="agenda_waktu">
         </div>
     </div>

     <div class="col-md-6">
         <div class="form-group">
             <label> Tempat :</label>
             <input disabled type="text" value="<?php echo $get_data['agenda_tempat'] ?>" class="form-control" name="agenda_tempat">
         </div>
     </div>

     <div class="col-md-6">
         <div class="form-group">
             <label>File agenda :</label>
             <?php


                if ($get_data['nama_agenda'] != null) { ?>
                 <a target="_blank" href="<?php echo base_url() ?>assets2/file_agenda/<?php echo $get_data['nama_agenda']  ?>"> <br><img width="30px" src="<?php echo base_url() ?>assets2/download.png"> </a>
             <?php } else { ?>

             <?php } ?>

             <!-- <input type="file" class="form-control" name="agenda_file"> -->
         </div>
     </div>
     <br>
     <hr>
     <hr>

     <div class="col-md-12">
         <div class="form-group">
             <label> Perihal :</label>
             <textarea disabled class="form-control" name="agenda_perihal" rows="4" cols="100"> <?php echo $get_data['agenda_perihal']  ?> </textarea>
         </div>
     </div>
     <div class="row"></div>
     <hr>
     <div class="col-md-12">
         <div class="form-group">
             <h5> History Disposisi</h5>
             <table class="table table-hover table-bordered table-sm">
                 <thead>
                     <tr>
                         <th scope="col">No</th>
                         <th scope="col">Dari</th>
                         <th scope="col">Kepada</th>
                         <th scope="col">Waktu</th>
                         <th scope="col">Keterangan</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 1;
                        foreach ($det as $key) { ?>
                         <tr>
                             <td> <?php echo $no++ ?></td>
                             <td> <?php echo $key->dari ?></td>


                             <?php if ($key->ke == null) { ?>
                                 <td> <?php echo $key->nama_user  ?> </td>
                             <?php } else { ?>

                                 <td> <?php echo $key->ke ?></td>
                             <?php }
                                ?>

                             <td> <?php echo $key->tgl_agenda_dispo ?></td>

                             <?php if ($key->dispo_dari_id_bidang == 6) { ?>
                                 <td> <?php echo $key->agenda_keterangan ?></td>
                             <?php } else { ?>
                                 <td> <?php echo $key->dispo_keterangan ?></td>
                             <?php } ?>

                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
             <hr>

             <!-- <div class="col-md-6">
         <div class="form-group">
             <label> Isi Disposisi :</label>
             <div class="custom-control custom-checkbox">
                 <?php

                    $a = $get_data['agenda_keterangan'];
                    echo str_replace(";", " 
 
  <input disabled checked type='checkbox'  aria-label='...'> <br>
 
                        ", $a);
                    ?>
             </div> -->
             <!-- 
                     <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="1">
                     <label class="form-check-label">
                         Ke Saya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="2;">
                     <label class="form-check-label">
                         Koordinasikan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="3">
                     <label class="form-check-label">
                         Pantau Progresnya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="4">
                     <label class="form-check-label">
                         Pelajari
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="5;">
                     <label class="form-check-label">
                         Rapat - Koordinasikan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="6">
                     <label class="form-check-label">
                         Segera! Jangan Terlambat
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="7">
                     <label class="form-check-label">
                         Siapkan
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="8;">
                     <label class="form-check-label">
                         Infokan
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="9">
                     <label class="form-check-label">
                         Tindaklanjut ( TL )
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="10">
                     <label class="form-check-label">
                         Untuk Diketahui (UDK)
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="11">
                     <label class="form-check-label">
                         Untuk Menjadi Perhatian (UMP)
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="12">
                     <label class="form-check-label">
                         Hadir
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="13">
                     <label class="form-check-label">
                         Ikut Hadir
                     </label>
                 </div>
                 <div class="form-check disabled">
                     <input type="checkbox" name="agenda_keterangan[]" value="14">
                     <label class="form-check-label">
                         Laporkan Hasilnya
                     </label>
                 </div> -->
         </div>
     </div>
     <!-- <div class="col-md-6">
         <label class="form-check-label">Disposisi Kepada :</label>
         <div class="custom-control custom-checkbox">

             <?php foreach ($det as $hmm) {
                    if ($hmm->dispo_ke_id_bidang == 6) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="6" checked type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1"> KEPALA BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH </label>
                     </div>
                     <div class="row"></div>
                 <?php }  ?>
                 <?php
                    if ($hmm->dispo_ke_id_bidang == 1) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="1" checked type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1"> SEKRETARIAT </label>
                     </div>
                     <div class="row"></div>
                 <?php }  ?>

                 <?php if ($hmm->dispo_ke_id_bidang == 2) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="2" checked type="checkbox" id="customRadioInline2" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline2"> BIDANG ANGGARAN </label>
                     </div>
                     <div class="row"></div>
                 <?php } ?>

                 <?php if ($hmm->dispo_ke_id_bidang == 3) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="3" checked type="checkbox" id="customRadioInline3" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline3">BIDANG PERBENDAHARAAN DAN AKUNTANSI </label>
                     </div>
                     <div class="row"></div>
                 <?php } ?>
                 <?php if ($hmm->dispo_ke_id_bidang == 4) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="4" checked type="checkbox" id="customRadioInline4" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline4">BIDANG PENATAUSAHAAN, PEMANFAATAN DAN PEMINDAHTANGANAN BARANG MILIK DAERAH </label>
                     </div>
                     <div class="row"></div>
                 <?php } ?>
                 <?php if ($hmm->dispo_ke_id_bidang == 5) { ?>
                     <div class="custom-control custom-radio custom-control-inline">
                         <input disabled value="5" checked type="checkbox" id="customRadioInline5" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline5">BIDANG PENGAMANAN DAN PENYELESAIAN SENGKETA BARANG MILIK DAERAH</label>
                     </div>
                     <div class="row"></div>
                 <?php } ?>

             <?php }
                ?>


         </div>
     </div> -->

 </div>
 <!-- <input type="submit" value="Submit"> -->
 <!-- </form> -->