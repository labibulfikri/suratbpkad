<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <a href="<?php echo base_url('jadwal/tambah') ?>" class="btn btn-primary btn-sm"> Ajukan Permohonan Jadwal </a> -->
            <h6 class="m-0 font-weight-bold text-primary"> Form Permohonan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('jadwal/do_tambah') ?>" method="POST">


                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Nomor Tiket </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="staticEmail" value="<?php echo $kode_unik ?>" name="no_jadwal" readonly placeholder=" Nomor Tiket">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama Tahanan</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" id="staticEmail" required name="nama_tahanan" placeholder=" Nama Tahanan"> -->
                        <select class="form-control" required name="id_tahanan">
                            <?php foreach ($get_data as $tahanan) { ?>
                                <option value="<?php echo $tahanan->id_tahanan ?>"> <?php echo $tahanan->nama_tahanan ?> - <?php echo $tahanan->instansi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"> Tanggal </label>
                    <div class="col-sm-4">
                        <input type="date" name="tgl_jadwal" class="form-control" required id="inputPassword">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"> Mulai Jam </label>
                    <div class="col-sm-4">
                        <input type="time-local" class="form-control timepicker" required name="jam_mulai">
                    </div>
                    <label for="inputPassword" class="col-sm-2 col-form-label"> Sampai Jam </label>
                    <div class="col-sm-4">
                        <input type="time-local" name="jam_selesai" required class="form-control timepicker2">
                    </div>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary"> Ajukan </button>
                </div>
            </form>





        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input.timepicker').timepicker({
            timeFormat: 'H:mm',
            interval: 5,
            // minTime: '10',
            // maxTime: '6:00pm',
            // defaultTime: '11',
            // startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

        $('input.timepicker2').timepicker({
            timeFormat: 'H:mm',
            interval: 5,
            // minTime: '10',
            // maxTime: '6:00pm',
            // defaultTime: '11',
            // startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

        $('input.tgl').datepicker({


        });
    });
</script>