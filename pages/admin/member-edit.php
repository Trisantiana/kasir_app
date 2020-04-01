<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../../lib/class-Db.php";

    $id = $ff->get("id");
    if (!empty($id)) {
        $sel = $odb->select("member where id_member='$id'");
        if ($sel->rowCount()>0) {
            $row = $sel->fetch();
        }
    }
?>

<div class="card-header bg-secondary">Edit Member</div>
    <div class="card-body">
        <button class="btn btn-primary btn-nav" data-url="member-data.php"> <i class="fa fa-arrow-left">Back</i> </button>
        <form action="javascript:void(0);" method="post" id="form-input" data-url="member-save.php?act=up">
             <input type="hidden" name="id" value="<?=$id?>">

            <div class="form-group">
                <label for="">Nama Member</label>
                <input type="text" name="nama_member" class="form-control" value="<?=$row['nama_member']?>">
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?=$row['alamat']?>">
            </div>

            <div class="form-group">
                <label for="">No. Hp</label>
                <input type="number" name="no_telp" class="form-control" value="<?=$row['no_telp']?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" name="simpan"> <i class="fa fa-save"></i> Update </button>
                <button type="reset" class="btn btn-warning" name="reset"> <i class="fa fa-refresh"></i> Cancel </button>
            </div>
        </form>
    </div>

<?php
    include_once "nav.php";
?>