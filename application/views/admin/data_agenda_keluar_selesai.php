<div class="card-body">
    <!-- <div class="table-responsive"> -->
    <table style="width: 100%;" class="table cell-border compact stripe table-hover agendaselesai">
        <!-- <caption>List of users</caption> -->
        <thead>
            <tr>
                <!-- <th scope="col">No</th> -->
                <!-- <th style="width: 10px">No </th>
                <th>No agenda</th>
                <th>Asal agenda</th>
                <th>Perihal </th>
                <th>Tanggal agenda </th>
                <th style="width: 10px">Aksi</th> -->
                <!-- <th scope="col">Target Murni(Rincian)</th> -->
                <th style="width: 10px">No </th>
                <th style="width: 20px">File </th>
                <th style="width: 80%">Detail Undangan </th>
                <th>Cetak Disposisi</th>
                <th>Aksi</th>
            </tr>



        </thead>
    </table>
    <!-- </div> -->
</div>

<script>
    $(document).on('click', '.SwalBtn1', function() {

        var id_agenda = $(this).attr("id");
        Swal.fire({
            title: 'Otorisasi',
            text: "Anda ingin Otorisasi ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('admin/agenda/update_otorisasi') ?>",
                    method: "post",
                    onBeforeOpen: function() {
                        Swal.fire({
                            title: 'Menunggu',
                            html: 'Memproses data',
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    data: {
                        id_agenda: id_agenda
                    },
                    success: function(data) {
                        Swal.fire(
                            'Otorisasi',
                            'Berhasil di Otorisasi',
                            'success'
                        )
                        Dataagenda.ajax.reload();
                    }
                })
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Anda membatalkan Otorisasi',
                    'error'
                )
            }
        })
    });
</script>
<script>
    var Dataagenda_selesai = $('.agendaselesai').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": false,
        "searchable": true,
        "order": [],
        "lengthMenu": [
            [5, 50, 100],
            [5, 50, 100]
        ],


        "ajax": {
            url: "<?php echo base_url() . 'admin/agenda/fetch_agenda_keluar_selesai'; ?>",
            type: "POST"
        },
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // console.log(nRow);
            // console.log(aData);
            // console.log(iDisplayIndex);
            // console.log(iDisplayIndexFull);
        }
    });
    new $.fn.dataTable.FixedHeader(Dataagenda_selesai);
</script>