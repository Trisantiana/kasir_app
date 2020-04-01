<?php
    session_start();
    if (empty($_SESSION['userID'])) {
        echo "anda tidak memiliki  hak akses ke halaman ini! silahkan login dulu!";
    } else {
    ?>
        <center>Laporan Stok Opname <br>
            TRI SANTIANA STORE
        </center>
        <br>
        <?='Hari/Tanggal : ' .date('l, d F Y H:i:s');?>
        <table width="100%" border="1" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Id Barang</th>
                <th>Barcode</th>
                <th>Nama Barang</th>
                <th>Stok Tersedia</th>
            </tr>
        <?php
        include_once "../../lib/class-Db.php";
        $q = "select id_barang, barcode, nama_barang, stok from barang order by stok asc";
        $data = $odb->query($q);
        $no = 1;
        while ($row = $data->fetch()) {
            $no++;
        ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['id_barang']?></td>
                <td><?=$row['barcode']?></td>
                <td><?=$row['nama_barang']?></td>
                <td><?=$row['stok']?></td>
            </tr>

        <?php
        }
        ?>
        </table>
    <?php
    }
?>