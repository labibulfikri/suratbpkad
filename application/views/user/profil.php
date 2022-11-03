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
                     <a class="btn-sm btn-primary btn" data-toggle="modal" id="tombolupdateModaluser" data-id="<?php echo $data_pribadi['id_user'] ?>" data-alamat="<?php echo $data_pribadi['alamat'] ?>" data-nama="<?php echo $data_pribadi['nama'] ?>" data-email="<?php echo $data_pribadi['email'] ?>" data-kota="<?php echo $data_pribadi['kota'] ?>" data-kecamatan="<?php echo $data_pribadi['kecamatan'] ?>" data-kelurahan="<?php echo $data_pribadi['kelurahan'] ?>" data-jk="<?php echo $data_pribadi['jenis_kelamin'] ?>" data-tlp="<?php echo $data_pribadi['telp'] ?>" data-target="#tambahModal"> Update </a>

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
                                     <strong class="profile-username text-center">NIK: <?php echo $data_nik['nik']; ?></strong> <button data-id="<?php echo $id_user ?>" data-toggle="modal" id="tombolupdateModalnik" data-nik="<?php echo $data_nik['nik'] ?>" data-gambar="<?php echo $data_nik['foto'] ?>" class="btn btn-sm btn-primary"> Update</button>
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


 <!-- Edit Modal -->
 <div class="modal fade" id="updateModalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"> Update </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form enctype="multipart/form-data" action="<?php echo base_url('profile/update_user') ?>" method="post">
                     <input class="form-control form-control-sm" hidden type="text" id="id_user" name="id_user" placeholder="ID Pengaduan">
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
                     <br>
                     <label>Kota / Kabupaten </label>
                     <select class="select2 form-control" id="kota" name="id_regencie" required onchange="getKecamatan(this)">
                         <?php foreach ($get_kota as $kota) { ?>
                             <option value="<?php echo $kota['id'] ?>"> <?php echo $kota['name'] ?> </option>
                         <?php } ?>
                     </select>
                     <br>
                     <label> Kecamatan </label>
                     <select class="select2 form-control" id="kecamatan" name="id_district" required onchange="getKelurahan(this)">

                     </select>

                     <br>

                     <label> Kelurahan </label>
                     <select class="select2 form-control" required id="kelurahan" name="id_village">

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


 <!-- Edit Modal -->
 <div class="modal fade" id="updateModalUserNik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel"> Update </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="<?php echo base_url('profile/update_ktp') ?>" enctype="multipart/form-data" method="POST">
                     <div class="card-body">
                         <div class="form-group row">
                             <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                             <div class="col-sm-4">
                                 <input type="hidden" name="id_user" id="id_user_edit" class="form-control" placeholder="ID User">
                                 <input type="text" maxlength="16" value="<?php echo set_value('nik') ?>" class="form-control" name="nik" placeholder="Masukkan NIK" id="nik_user_edit">
                                 <span class="text-danger"> <?php echo form_error('nik') ?> </span>
                             </div>
                         </div>
                         <div class="form-group row">


                             <label class="col-sm-2 col-form-label">Foto KTP </label>
                             <div class="col-sm-8"><span class="text-danger text-sm"> file Maksmal 2 MB , File Harus JPEG</span>
                                 <input type="file" class="form-control" name="new_image" placeholder="File">
                                 <input type="hidden" class="form-control" name="old_image" value="<?php echo $data_nik['foto'] ?>" placeholder="File">
                                 <img width="100px" height="50" src="<?php echo base_url('assets/images/foto_ktp/') ?><?php echo $data_nik['foto'] ?>"> </img>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-default" data-dismiss="modal" id="close_modal_tambah">Close</button>
                             <button type="submit" class="btn btn-primary" id="tombol_tambah" name="action" value="add">Save changes</button>
                         </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /////// -->
 <script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
 <script>
     update_user();
     //  update_nik();

     function update_user() {
         $('#tombolupdateModaluser').on('click', function() {
             var id_user = $(this).data('id');
             var alamat = $(this).data('alamat');
             var nama = $(this).data('nama');
             var nip = $(this).data('nip');
             var email = $(this).data('email');
             var telp = $(this).data('tlp');
             var jk = $(this).data('jk');
             var kota = $(this).data('kota');
             var kecamatan = $(this).data('kecamatan');
             var kelurahan = $(this).data('kelurahan');
             // var status = $(this).data('status');
             $('#id_user').val(id_user);
             $('#nama').val(nama);
             $('#alamat').val(alamat);
             $('#telp').val(telp);
             // $('#nip').val(nip);
             $('#jenis_kelamin').val(jk);
             $('#email').val(email);
             $('#kelurahan').val(kelurahan);
             $('#kecamatan').val(kecamatan);
             $('#kota').val(kota);

             $('#updateModalUser').modal({
                 backdrop: 'static'
             });
         });
     }
 </script>


 <script>
     update_nik();

     function update_nik() {
         $('#tombolupdateModalnik').on('click', function() {
             var id_user = $(this).data('id');
             var nik = $(this).data('nik');
             var gambar = $(this).data('gambar');

             $('#id_user_edit').val(id_user);
             $('#nik_user_edit').val(nik);
             $('#img').val(gambar);


             $('#updateModalUserNik').modal({
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