<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    session_start();
    include_once "../../lib/class-Db.php";
?>

<div class="card-header bg-secondary"><span>Data User</span>
    <a href="#" class="btn btn-primary btn-nav pull-right" data-url="user-form.php"> <i class="fa fa-plus"></i> </a>

</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-data" style="width: 100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>User Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $no = 1;
                        $query = $odb->select("user");
                        while ($row = $query->fetch()) {
                    ?>

                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row['username']?></td>
                            <td>
                                <?php
                                    switch ($row['user_level']) {
                                        case 1:
                                            # code...
                                            echo "administrator";
                                            break;

                                        case 2:
                                            # code...
                                            echo "manager";
                                            break;

                                        case 3:
                                            # code...
                                            echo "supervisor";
                                            break;

                                        case 4:
                                            # code...
                                            echo "kasir";
                                            break;

                                        case 5:
                                            # code...
                                            echo "gudang";
                                            break;

                                        default:
                                            # code...
                                            break;
                                    }
                                ?>
                            </td>

                            <td>
                                <a href="#" class="btn btn-info btn-nav" data-url="user-edit.php?id=<?=$row['id_user']?>"> <i class="fa fa-edit"></i> </a>
                                <a href="#" class="btn btn-danger btn-nav" data-url="user-save.php?act=del&id=<?=$row['id_user']?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ? ')" ><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>

                    <?php
                        }
                    ?>
                </tbody>

            </table>
        </div>
</div>

<?php
    include_once "nav.php";
?>