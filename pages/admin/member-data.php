<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    session_start();
    include_once "../../lib/class-Db.php";
?>

<div class="card-header bg-secondary"> Data Member <a href="#" data-url="member-form.php" class="btn btn-primary pull-right btn-nav"> <i class="fa fa-plus"></i> </a> </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-data" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Member</th>
                        <th>Alamat</th>
                        <th>No. Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $query = $odb->select("member");
                        while ($row=$query->fetch()) {
                    ?>

                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['nama_member']?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?=$row['no_telp']?></td>
                        <td>
                            <a href="#" data-url="member-edit.php?id=<?=$row['id_member']?>" class="btn btn-info btn-nav"> <i class="fa fa-edit"></i> </a>
                            <a href="#" data-url="member-save.php?act=del&id=<?=$row['id_member']?>" class="btn btn-danger btn-nav" onclick="return confirm('Yakin Ingin Menghapus Data Ini ? ')" ><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include_once "nav.php";
?>