<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../../lib/class-Db.php";
?>

<div class="card-header bg-secondary"></div>
    <div class="card-body">
        <button class="btn btn-primary btn-nav" data-url="member-data.php"> <i class="fa fa-arrow-left">Back</i> </button>
        <form action="javascript:void(0);" id="form-input" data-url="member-save.php?act=ins">
            <div class="form-group">
                <label for="">Nama Member</label>
                <input type="text" name="nama_member" class="form-control" placeholder="Nama Member">
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>

            <div class="form-group">
                <label for="">No. Hp</label>
                <input type="number" name="no_telp" class="form-control" placeholder="No. Telp">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" name="simpan"> <i class="fa fa-save"></i> Save </button>
                <button type="reset" class="btn btn-warning" name="reset"> <i class="fa fa-refresh"></i> Cancel </button>
            </div>
        </form>
    </div>

<?php
    include_once "nav.php";
?>