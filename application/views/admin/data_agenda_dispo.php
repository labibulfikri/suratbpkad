<div class="card-body">
    <!-- <div class="table-responsive"> -->
    <table style="width: 100%;" class="table cell-border compact stripe table-hover agenda">
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
    var Dataagenda = $('.agenda').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": false,
        "order": [],
        "lengthMenu": [
            [5, 50, 100],
            [5, 50, 100]
        ],


        "ajax": {
            url: "<?php echo base_url() . 'admin/agenda/fetch_agenda_disp'; ?>",
            type: "POST"
        },
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            // console.log(nRow);
            // console.log(aData);
            // console.log(iDisplayIndex);
            // console.log(iDisplayIndexFull);
        }
    });
    new $.fn.dataTable.FixedHeader(Dataagenda);
</script>