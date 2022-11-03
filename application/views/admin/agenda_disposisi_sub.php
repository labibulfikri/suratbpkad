 <form action="<?php echo base_url() ?>admin/agenda/disposisi_sub_proses" method="post">
     <!-- <form action="<?php echo base_url() ?>admin/agenda/disposisi_agenda_edit" method="post"> -->
     <div class="row">

         <div class="col-md-6">
             <div class="form-group">
                 <label> Undangan Dari </label>
                 <input type="text" hidden name="id_agenda" value="<?php echo $get_data['id_agenda'] ?>" class="form-control">
                 <input type="text" hidden name="id_agenda_dispo" value="<?php echo $get_data['id_agenda_dispo'] ?>" class="form-control">
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
                 <input type="text" name="agenda_no_masuk" disabled value="<?php echo $get_data['agenda_no_masuk'] ?>" class="form-control">
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
                 <input type="time" value="<?php echo $get_data['agenda_waktu'] ?>" disabled class="form-control" name="agenda_waktu">
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
                 <label>File Undangan :</label>

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

                 <textarea class="form-control" disabled> <?php echo $get_data['agenda_perihal']  ?></textarea>
             </div>
         </div>
         <hr>
         <div class="row"></div>


         <hr>
         <div class="col-md-6">
             <div class="form-check">
                 <label> Isi Disposisi :</label>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="ke saya;">
                     <label class="form-check-label">
                         Ke Saya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="koordinasikan;">
                     <label class="form-check-label">
                         Koordinasikan
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="pantau progresnya;">
                     <label class="form-check-label">
                         Pantau Progresnya
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="pelajari;">
                     <label class="form-check-label">
                         Pelajari
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="Rapat-koordinasikan;">
                     <label class="form-check-label">
                         Rapat - Koordinasikan
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="Segera! Jangan Terlambat;">
                     <label class="form-check-label">
                         Segera! Jangan Terlambat
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="Siapkan;">
                     <label class="form-check-label">
                         Siapkan
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="Infokan;">
                     <label class="form-check-label">
                         Infokan
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="Tindaklanjut ( TL );">
                     <label class="form-check-label">
                         Tindaklanjut ( TL )
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="Untuk Diketahui (UDK);">
                     <label class="form-check-label">
                         Untuk Diketahui (UDK)
                     </label>
                 </div>
                 <div class="form-check">
                     <input type="checkbox" name="agenda_keterangan[]" value="Untuk Menjadi Perhatian (UMP);">
                     <label class="form-check-label">
                         Untuk Menjadi Perhatian (UMP)
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="Hadir;">
                     <label class="form-check-label">
                         Hadir
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="Ikut Hadir;">
                     <label class="form-check-label">
                         Ikut Hadir
                     </label>
                 </div>
                 <div class="form-check ">
                     <input type="checkbox" name="agenda_keterangan[]" value="Laporkan Hasilnya;">
                     <label class="form-check-label">
                         Laporkan Hasilnya
                     </label>
                 </div>
                 <div class="form-check">
                     <label> Ketrangan Lain :</label>
                     <input class="form-control" type="text" name="agenda_keterangan[]">
                 </div>
             </div>
         </div>

         <?php if ($this->session->userdata('id_jabatan') == 1) { ?>
             <div class="col-md-6">
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
             </div>

         <?php } else if ($this->session->userdata('id_jabatan') == 2) { ?>
             <?php
                $select_column = array("*");
                $this->db->select($select_column);
                $this->db->where('atasan_id_bidang', $this->session->userdata('id_bidang'));
                $this->db->from("t_bidang");


                $tt = $this->db->get()->result();

                // $str = $this->db->last_query();
                // print_r($str);
                // exit();
                ?>
             <div class="col-md-6">
                 <label class="form-check-label">Disposisi Kepada :</label>
                 <?php $i = 1;
                    foreach ($tt as $sub) { ?>
                     <div class="custom-control custom-checkbox">
                         <div class="custom-control custom-radio custom-control-inline">
                             <input value="<?php echo $sub->id_bidang ?>" type="checkbox" id="customRadioInline<?php echo $sub->id_bidang ?>" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                             <label class="custom-control-label" for="customRadioInline<?php echo $sub->id_bidang  ?>"> <?php echo $sub->nama_bidang  ?> </label>
                         </div>
                     </div>
                     <!-- <div class="custom-control custom-radio custom-control-inline">
                         <input value="8" type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1"> Sub Koordinator Pengamanan dan Pengawasan Barang Milik Daerah</label>
                     </div> -->
                     <div class="row"></div>

                 <?php } ?>
             </div>
     </div>

 <?php } else if ($this->session->userdata('id_jabatan') == 3) { ?>


     <?php
                $select_column = array("*");
                $this->db->select($select_column);
                $this->db->where('atasan_id_bidang', $this->session->userdata('id_bidang'));
                $this->db->from("t_bidang");
                $tt = $this->db->get()->result();
        ?>
     <div class="col-md-6">
         <label class="form-check-label">Disposisi Kepada :</label>
         <?php foreach ($tt as $sub) { ?>
             <div class="custom-control custom-checkbox">
                 <div class="custom-control custom-radio custom-control-inline">
                     <input value="<?php echo $sub->id_bidang ?>" type="checkbox" id="customRadioInline<?php echo $sub->id_bidang ?>" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                     <label class="custom-control-label" for="customRadioInline<?php echo $sub->id_bidang ?>"> <?php echo $sub->nama_bidang  ?> </label>
                 </div>
             </div>
             <!-- <div class="custom-control custom-radio custom-control-inline">
                         <input value="8" type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1"> Sub Koordinator Pengamanan dan Pengawasan Barang Milik Daerah</label>
                     </div> -->
             <div class="row"></div>

         <?php } ?>
     <?php } else { ?>

         <?php
                $select_column = array("*");
                $this->db->select($select_column);
                $this->db->where('atasan_id_bidang', $this->session->userdata('id_bidang'));
                $this->db->from("t_bidang");
                $this->db->join("t_user", 't_user.id_bidang = t_bidang.id_bidang');
                $tt = $this->db->get()->result();
            ?>
         <div class="col-md-6">
             <label class="form-check-label">Disposisi Kepada :</label>
             <?php foreach ($tt as $sub) { ?>
                 <div class="custom-control custom-checkbox">
                     <div class="custom-control custom-radio custom-control-inline">
                         <input value="<?php echo $sub->id_user ?>" type="checkbox" id="customRadioInline<?php echo $sub->id_user ?>" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline<?php echo $sub->id_user ?>"> <?php echo $sub->nama_user  ?> </label>
                     </div>
                 </div>
                 <!-- <div class="custom-control custom-radio custom-control-inline">
                         <input value="8" type="checkbox" id="customRadioInline1" name="disposisi_ke_id_bidang[]" class="custom-control-input">
                         <label class="custom-control-label" for="customRadioInline1"> Sub Koordinator Pengamanan dan Pengawasan Barang Milik Daerah</label>
                     </div> -->
                 <div class="row"></div>
             <?php } ?>
         <?php } ?>

         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <input class="btn btn-primary" type="submit" value="Submit">
         </div>
     </div>

 </form>