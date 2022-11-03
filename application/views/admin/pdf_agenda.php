<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        p.ex1 {
            /* border: 1px solid red; */
            padding-left: 150px;
        }

        .kotak {
            font-size: small;
            margin: 20px;

        }

        .pd {
            /* border: 1px solid black; */
            /* background-color: lightblue; */
            padding-top: 5px;
            padding-right: 30px;
            padding-bottom: 10px;
            padding-left: 20px;
        }

        div.kiri {
            padding-left: 30px;
        }
    </style>
</head>

<body>

    <table border="1px" style=" margin: 10px;">
        <tr style="width: 700px;">
            <td class="kotak" style="width: 50px;">
                <img src="<?php echo base_url() ?>assets2/logo.png" height="50px" width="40px">
            </td>
            <td style="width: 200px;">
                PEMERINTAH KOTA SURABAYA<b><br>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH KOTA SURABAYA</b>
                <hr><br>LEMBAR DISPOSISI
            </td>
            <td> Diterima Tanggal <br>
                <h4 style="text-align: center;"><i> <?php echo $data_d['agenda_diterima_tgl'] ?> </i> </h4>
            </td>
            <td> No. Agenda :
                <h4 style=" text-align: center; font-size: 30px;"> <?php echo $data_d['no_agenda'] ?> </h4>
            </td>
        </tr>
        <tr>
            <td colspan="4"> Undangan Dari : <b><i> <?php echo $data_d['agenda_dari'] ?> </i> </b></td>
        </tr>

        <?php if ($data_d['agenda_jenis'] == 1) { ?>

            <tr>
                <td colspan="4"> Nomor Undangan : <b><i> <?php echo $data_d['agenda_no_keluar'] ?> </i> </b></td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="4"> Nomor Undangan : <b><i> <?php echo $data_d['agenda_no_masuk'] ?> </i> </b></td>
            </tr>

        <?php } ?>

        <tr>
            <td colspan="4"> Tanggal Undangan: <b><i> <?php echo $data_d['agenda_tgl'] ?> </i> </b></td>
        </tr>

        <tr>
            <td colspan="4" style="height: 100px;"> Hal:
                <p> Tanggal : <?php echo $data_d['agenda_tgl']; ?> </p>
                <p> Waktu : <?php echo $data_d['agenda_waktu']; ?> </p>
                <p> Tempat : <?php echo $data_d['agenda_tempat']; ?> </p>
                <p> Perihal : <?php echo $data_d['agenda_perihal']; ?> </p><br>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="height: 100px;"> diteruskan kepada: </td>
            <td style="padding: 10px;" colspan="2" style="height: 100px;">
                <?php foreach ($data_s as $hmm) {

                    if ($hmm->dispo_ke_id_bidang == 6) { ?>
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Sekterariat
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Anggaran
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah -->

                    <?php }  ?>
                    <?php
                    if ($hmm->dispo_ke_id_bidang == 1) { ?>
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br> -->
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px"> Sekterariat
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Anggaran
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah -->

                    <?php }  ?>

                    <?php if ($hmm->dispo_ke_id_bidang == 2) { ?>
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Sekterariat
                        <br> -->
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px"> Bidang Anggaran

                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah -->

                    <?php } ?>
                    <?php if ($hmm->dispo_ke_id_bidang == 3) { ?>
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Sekterariat
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Anggaran
                        <br> -->
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi

                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah -->

                    <?php } ?>
                    <?php if ($hmm->dispo_ke_id_bidang == 4) { ?>
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Sekterariat
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Anggaran
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi -->
                        <!-- <br> -->
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <!-- <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah -->

                    <?php } ?>
                    <?php if ($hmm->dispo_ke_id_bidang == 5) { ?>
                        <br>
                        <!-- <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px">Kepala Badan Pengelolaan Keuangan dan Aset Daerah
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Sekterariat
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Anggaran
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Perbendaharaan dan Akuntansi
                        <br>
                        <img src="<?php echo base_url() ?>assets2/centung2.png" height="15px" width="15px"> Bidang Penatausahaan, Pemanfaatan dan Pemindahtanganan Barang Milik Daerah
                        <br> -->
                        <img src="<?php echo base_url() ?>assets2/centung.png" height="15px" width="15px"> Bidang Pengamanan dan Penyelesaian Sengketa Barang Milik Daerah

                    <?php } ?>

                <?php }
                ?>
            </td>

        </tr>
        <tr>
            <td colspan="2" style="height: 100px;"> Isi Disposisi : <br>
                <?php
                $a = $data_d['agenda_keterangan'];
                echo str_replace(";", "* <br> <input disabled checked type='checkbox'> ", $a);
                ?>
            </td>
            <td colspan="2" style="height: 100px;"> Keterangan Lain :</td>



        </tr>
    </table>
    <br>



</body>

</html>