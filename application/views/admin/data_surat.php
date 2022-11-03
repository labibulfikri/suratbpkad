<div class="card-body">
    <!-- <div class="table-responsive"> -->
    <table style="width: 100%;" class="table cell-border compact stripe table-hover surat">
        <!-- <caption>List of users</caption> -->
        <thead>
            <tr>
                <!-- <th scope="col">No</th> -->
                <!-- <th style="width: 10px">No </th>
                <th>No Surat</th>
                <th>Asal Surat</th>
                <th>No Agenda </th>
                <th>Tanggal surat </th>
                <th style="width: 10px">Aksi</th> -->
                <!-- <th scope="col">Target Murni(Rincian)</th> -->
                <th style="width: 10px">No </th>
                <th style="width: 20px">File </th>
                <th style="width: 80%">Detail Surat</th>
                <th>Cetak Disposisi</th>
                <th style="width: 10px">Aksi</th>

            </tr>



        </thead>
    </table>
    <!-- </div> -->
</div>


<script>
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
            url: "<?php echo base_url() . 'admin/surat/fetch_surat'; ?>",
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