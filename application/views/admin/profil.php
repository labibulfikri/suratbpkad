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
                             <input type="text" value="<?php echo $data_pribadi['nama_admin'] ?>" class="form-control" disabled required="">

                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-md-7 col-12">
                             <label>Email</label>
                             <input type="email" readonly class="form-control" value="<?php echo $data_pribadi['email_admin'] ?>" required="">

                         </div>
                         <div class="form-group col-md-5 col-12">
                             <label>Phone</label>
                             <input type="tel" class="form-control" readonly value="<?php echo $data_pribadi['telp_admin'] ?>">
                         </div>
                     </div>
                     <div class="row">
                         <div class="form-group col-12">
                             <label>Alamat</label>
                             <textarea rows="5" class="form-control" readonly> <?php echo $data_pribadi['alamat_admin'] ?></textarea>
                         </div>
                     </div>




                 </div>
                 <div class="card-footer text-right">
                     <a class="btn-sm btn-primary btn" data-toggle="modal" id="tombolupdateModaladmin" data-id="<?php echo $data_pribadi['id_admin'] ?>" data-alamat="<?php echo $data_pribadi['alamat_admin'] ?>" data-nama="<?php echo $data_pribadi['nama_admin'] ?>" data-email="<?php echo $data_pribadi['email_admin'] ?>" data-jk="<?php echo $data_pribadi['jenis_kelamin'] ?>" data-tlp="<?php echo $data_pribadi['telp_admin'] ?>" data-target="#tambahModal"> Update </a>

                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- /////////////// -->


 <!-- Edit Modal -->
 <div class="modal fade" id="updateModaladmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"> Update </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" action="<?php echo base_url('admin/profile/update_admin') ?>" method="post">
                     <input class="form-control form-control-sm" hidden type="text" id="id_admin" name="id_admin" placeholder="ID Pengaduan">
                     <label class="form-control-sm"> Nama </label>
                     <input class="form-control form-control-sm" type="text" id="nama" name="nama" placeholder="Nama ...">
                     <br>

                     <!-- <label class="form-control-sm"> Alamat </label>
                    <input class="form-control form-control-sm" type="text" id="alamat" name="alamat" placeholder="Alamat ...">
                    <br> -->

                     <label class="form-control-sm"> Email </label>
                     <input class="form-control form-control-sm" type="text" id="email" name="email" placeholder="Email ...">
                     <br>

                     <label class="form-control-sm"> Telephone </label>
                     <input class="form-control form-control-sm" type="text" id="telp" name="telp" placeholder="Telephone ...">
                     <br>

                     <label class="form-control-sm"> Alamat </label>
                     <textarea rows="7" class="form-control form-control-sm" type="text" id="alamat" name="alamat" placeholder=" Alamat ..."></textarea>
                     <br>
                     <label class="form-control-sm"> Jenis Kelamin </label>
                     <select class="form-control-sm" id="jenis_kelamin" name='jenis_kelamin'>"
                         <option value="" disabled> Silahkan Pilih</option>
                         <option value="1"> Laki - Laki </option>
                         <option value="2"> Perempuan </option>
                     </select>


                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal" id="close_modal_tambah">Close</button>
                         <button type="submit" class="btn btn-primary" id="tombol_tambah" name="action" value="add">Save changes</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- ////////// -->

 <!-- /////// -->


 <!-- /////// -->
 <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
 <script>
     update_admin();
     //  update_nik();

     function update_admin() {
         $('#tombolupdateModaladmin').on('click', function() {
             var id_admin = $(this).data('id');
             var alamat = $(this).data('alamat');
             var nama = $(this).data('nama');
             var nip = $(this).data('nip');
             var email = $(this).data('email');
             var telp = $(this).data('tlp');
             var jk = $(this).data('jk');
             // var status = $(this).data('status');
             $('#id_admin').val(id_admin);
             $('#nama').val(nama);
             $('#alamat').val(alamat);
             $('#telp').val(telp);
             // $('#nip').val(nip);
             $('#jenis_kelamin').val(jk);
             $('#email').val(email);


             $('#updateModaladmin').modal({
                 backdrop: 'static'
             });
         });
     }
 </script>


 <script>
     update_nik();

     function update_nik() {
         $('#tombolupdateModalnik').on('click', function() {
             var id_admin = $(this).data('id');
             var nik = $(this).data('nik');
             var gambar = $(this).data('gambar');

             $('#id_admin_edit').val(id_admin);
             $('#nik_admin_edit').val(nik);
             $('#img').val(gambar);


             $('#updateModaladminNik').modal({
                 backdrop: 'static'
             });
         });
     }
 </script>


 <script>
     $(function() {
         $('#kotanya').select2({
             minimumInputLength: 3,
             allowClear: true,
             placeholder: 'masukkan nama propinsi',
             ajax: {
                 dataType: 'json',
                 url: '<?php echo base_url('profile/get_kota') ?>',
                 delay: 250,
                 data: function(params) {
                     return {
                         search: params.term
                     }
                 },
                 processResults: function(data) {
                     return {
                         results: $.map(data, function(item) {
                             return {
                                 text: item.name,
                                 id: item.id
                             }
                         })
                     };
                 },
                 cache: true
             }
         });
     });
 </script>

 <script>
     // In your Javascript (external .js resource or <script> tag)
     function getKecamatan(el) {
         var value = $(el).val();
         field = $("#kecamatan");
         field.html("<option class='select2 form-control' value='0'>Loading.....</option>");

         $('#kecamatan').select2({
             minimumInputLength: 3,
             allowClear: true,
             placeholder: 'masukkan nama Kecamatan',
             ajax: {
                 dataType: 'json',
                 url: '<?php echo base_url('profile/get_kec') ?>',
                 delay: 250,
                 data: function(params) {
                     return {
                         search: params.term,
                         id: value
                     }
                 },
                 processResults: function(data) {
                     return {
                         results: $.map(data, function(item) {
                             return {
                                 text: item.name,
                                 id: item.id
                             }
                         })
                     };
                 },
                 cache: true
             }
         });

     }
 </script>

 <script>
     // In your Javascript (external .js resource or <script> tag)
     function getKelurahan(el) {
         var value = $(el).val();
         field = $("#kelurahan");
         field.html("<option class='form-control' value='0'>Loading.....</option>");

         $('#kelurahan').select2({
             minimumInputLength: 3,
             allowClear: true,
             placeholder: 'masukkan nama kelurahan',
             ajax: {
                 dataType: 'json',
                 url: '<?php echo base_url('profile/get_kelurahan') ?>',
                 delay: 250,
                 data: function(params) {
                     return {
                         search: params.term,
                         id: value
                     }
                 },
                 processResults: function(data) {
                     return {
                         results: $.map(data, function(item) {
                             return {
                                 text: item.name,
                                 id: item.id
                             }
                         })
                     };
                 },
                 cache: true
             }
         });

     }
 </script>
 <script>
     $(function() {
         //Initialize Select2 Elements
         $('.select2').select2()

         //Initialize Select2 Elements
         $('.select2bs4').select2({
             theme: 'bootstrap4'
         })
     });
 </script>