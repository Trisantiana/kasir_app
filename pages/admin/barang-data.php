<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

session_start();
include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";
?>

<div class="card-header bg-secondary">Data Barang <a href="#" data-url="barang-form.php" class="btn btn-primary pull-right btn-nav"> <i class="fa fa-plus"></i> </a></div>
<div class="card-body">
    <div class="table-responsive ">
        <table class="table table-striped table-bordered dt-responsive nowrap table-data">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Nama Barang</th>
                    <th>Barcode</th>
                    <th>Stok</th>
                    <th>Harga Pokok</th>
                    <th>Harga Jual</th>
                    <th>Harga Member</th>
                    <th>Harga Diskon</th>
                    <th>Last Update</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $q = $odb->select("v_barang");
                while ($r = $q->fetch()) {

                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td>
                            <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="#" data-url="barang-edit.php?id=<?=$r['id_barang']?>" class="btn btn-info btn-nav"> <i class="fa fa-edit"></i> </a>
                            <a href="#" data-url="barang-save.php?act=del&id=<?=$r['id_barang']?>" class="btn btn-danger btn-nav" onclick="return confirm('Yakin Ingin Menghapus Data Ini ? ')" > <i class="fa fa-trash"></i> </a>
                        </td>
                        <td><?=$r['nama_barang']?></td>
                        <td><?=$r['barcode']?></td>
                        <td><?=$r['stok']?></td>
                        <td><?=$ff->rp($r['harga_pokok'])?></td>
                        <td><?=$ff->rp($r['harga_jual'])?></td>
                        <td><?=$ff->rp($r['harga_member'])?></td>
                        <td><?=$ff->rp($r['harga_diskon'])?></td>
                        <td><?=$r['last_update']?></td>

                    </tr>

                <?php
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(".table-data").dataTable();
    })
</script>

<?php
    include_once "nav.php";
?>