<div class="card-body">
    <!-- <div class="table-responsive"> -->
    <table style="width: 100%;" class="table cell-border compact stripe table-hover surat">

        <thead>
            <tr>
                <th style="width: 10px">No </th>
                <th style="width: 20px">File </th>
                <th style="width: 80%">Detail Surat</th>
                <th>Cetak Disposisi</th>
                <th style="width: 10px">Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<!-- 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.tombol_view', function() {
        $('#toggle-modal-1').fireModal({
            title: ' History ',
            body: ' ',
            buttons: [{
                text: 'Close',
                class: 'btn btn-secondary',
                handler: function(current_modal) {
                    $.destroyModal(current_modal);
                }
            }]
        });
        var id_surat = $(this).attr("id_surat");

        $.ajax({
            url: "<?php echo base_url() . 'admin/surat/history_datanya'; ?>",
            type: 'POST',
            data: {
                id_surat: id_surat
            },
            dataType: "json",
            success: function(data) {
                var myObj = data;
                var modal_3_body = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].dari == null) {
                        modal_3_body += '<tr>' +
                            '<td width="10%">' + data[i].dari + '</td>' +
                            '<td width="10%">' + data[i].ke + '</td>' +
                            '<td width="10%">' + data[i].tgl_surat_disposisi + '</td>' +
                            '<td width="10%">' + data[i].surat_keterangan + '</td>' +
                            '</tr>';
                    } else {
                        modal_3_body += '<tr>' +
                            '<td width="10%">' + data[i].dari + '</td>' +
                            '<td width="10%">' + data[i].ke + '</td>' +
                            '<td width="10%">' + data[i].tgl_surat_disposisi + '</td>' +
                            '<td width="10%">' + data[i].surat_keterangan + '</td>' +
                            '</tr>';
                    }
                }
                $('#target_reg').html(modal_3_body);

            },
        })

    });
</script>

<script>
    $('#toggle-modal-1').fireModal({
        title: ' History ',
        body: ' ',
        buttons: [{
            text: 'Close',
            class: 'btn btn-secondary',
            handler: function(current_modal) {
                $.destroyModal(current_modal);
            }
        }]
    });
</script>
<!-- /////////////// -->

<script>
    // Get the button that opens the modal
    var DataSurat = $('.surat').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": false,
        "order": [],
        "lengthMenu": [
            [5, 50, 100],
            [5, 50, 100]
        ],


        "ajax": {
            url: "<?php echo base_url() . 'admin/surat/fetch_surat_disp'; ?>",
            type: "POST"
        },
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // console.log(nRow);
            // console.log(aData);
            // console.log(iDisplayIndex);
            // console.log(iDisplayIndexFull);

        }
    });
    new $.fn.dataTable.FixedHeader(DataSurat);
</script>

<!-- 
 <script>
     //fungsi pupup
     $(document).on('click', '.tombol_view', function() {
         $('#viewModal').modal({
             backdrop: 'static'
         });
         var id_surat = $(this).attr("id_surat");

         $.ajax({
             url: "<?php echo base_url() . 'admin/surat/history_data'; ?>",
             type: 'POST',
             data: {
                 id_surat: id_surat
             },
             dataType: "json",
             success: function(data) {
                 var myObj = data;

                 var baris = '';
                 for (var i = 0; i < data.length; i++) {

                     if (data[i].dari == null) {


                         baris += ' <tr>' +
                             // '<td width="10%">' + i + '</td>'+
                             '<td width="10%">' + data[i].dari + '</td>' +
                             '<td width="10%">' + data[i].ke + '</td>' +
                             '<td width="10%">' + data[i].tgl_surat_disposisi + '</td>' +
                             // '<td width="10%">' + data[i].rekomkeluar_tgl_keluar + '</td>' + 
                             '<td width="10%">' + data[i].surat_keterangan + '</td>' +
                             '</tr>';
                     } else {



                         baris += ' <tr>' +
                             // '<td width="10%">' + i + '</td>'+
                             '<td width="10%">' + data[i].dari + '</td>' +
                             '<td width="10%">' + data[i].ke + '</td>' +
                             '<td width="10%">' + data[i].tgl_surat_disposisi + '</td>' +
                             // '<td width="10%">' + data[i].rekomkeluar_tgl_keluar + '</td>' + 
                             '<td width="10%">' + data[i].surat_keterangan + '</td>' +
                             '</tr>';

                     }
                 }


                 $('#target_reg').html(baris);

             },
         })
     });
 </script>
  -->