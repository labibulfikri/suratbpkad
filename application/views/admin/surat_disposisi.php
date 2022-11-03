 <form action="<?php echo base_url() ?>admin/surat/disposisi_edit" method="post">
     <div class="row">

         <div class="col-md-6">
             <div class="form-group">
                 <label> Surat Dari </label>
                 <input type="text" hidden name="id_surat" value="<?php echo $get_data['id_surat'] ?>" class="form-control">
                 <input type="text" name="surat_dari" disabled value="<?php echo $get_data['surat_dari'] ?>" class="form-control">
             </div>
         </div>
         <div class="col-md-6">
             <div class="form-group">
                 <label> No Agenda </label>
                 <input type="text" name="no_agenda_surat" disabled value="<?php echo $get_data['no_agenda_surat'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal diterima :</label>
                 <input type="date" name="surat_diterima_tgl" disabled value="<?php echo $get_data['surat_diterima_tgl'] ?>" class="form-control">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Nomor Surat :</label>
                 <input type="text" name="no_surat" disabled value="<?php echo $get_data['no_surat'] ?>" class="form-control">
             </div>
         </div>


         <div class="col-md-6">
             <div class="form-group">
                 <label>Tanggal Surat :</label>
                 <input type="date" class="form-control" disabled value="<?php echo $get_data['surat_tanggal'] ?>" name="surat_tanggal">
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>File Surat :</label>
                 <?php
                    if ($get_data['nama_surat'] != null) { ?>
                     <a target="_blank" href="<?php echo base_url() ?>assets2/file_surat/<?php echo $get_data['nama_surat']  ?>"> <br><img width="30px" src="<?php echo base_url() ?>assets2/download.png"> </a>
                 <?php } else { ?>

                 <?php } ?>

                 <!-- <input type="file" class="form-control" name="surat_file"> -->
             </div>
         </div>
         <br>
         <hr>
         <hr>

         <div class="col-md-12">
             <div class="form-group">
                 <label> Perihal :</label>
                 <textarea readonly class="form-control">
                        <?php echo $get_data['surat_perihal']  ?>                
                 </textarea>
             </div>
         </div>
         <hr>
         <div class="row"></div>
         <hr>
         <div class="col-md-6">
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

                 <div class="form-check disabled">
                     <label> Ketrangan Lain :</label>
                     <input class="form-control" type="text" name="surat_keterangan[]">
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
     </div>
     </div>
 <?php } else { ?>
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
 <?php } ?>


 </div>
 <input type="submit" value="Submit">
 </form>