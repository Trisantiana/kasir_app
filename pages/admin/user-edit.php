<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";
include_once "nav.php";

    $id =$ff->get("id");
    $res=$odb->select("user where id_user='$id'");
    $dt=$res->fetch();
?>


<div class="card-header bg-secondary">Form Tambah User</div>
    <div class="card-body">
        <form action="javascript:void(0);" id="form-input" data-url="user-save.php?act=ins">

            <div class="form-group">
                <label for="">Username</label>
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="text" name="username" class="form-control" value="<?=$dt['username']?>">
            </div>

            <div class="form-group">
                <label for="">Password  <p class="text-danger"> * Kosongkan jika tidak ingin ganti password </p> </label>
                <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="">Ulangi Password <p class="text-danger"> * Kosongkan jika tidak ingin ganti password</p> <p class="text-danger re-enter" style="display: none;"> *Password tidak sesuai</p> </label>
                <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi Password">
            </div>

            <div class="form-group">
                <label for="">User Level</label>
                <select name="user_level" class="form-control">
                    <option value=""><-- Pilih Level --></option>
                    <option value="1" <?=$dt['user_level']==1? "selected":""?>> Administrator </option>
                    <option value="2" <?=$dt['user_level']==2? "selected":""?>> Manager</option>
                    <option value="3" <?=$dt['user_level']==3? "selected":""?>> Supervisor</option>
                    <option value="4" <?=$dt['user_level']==4? "selected":""?>> Kasir</option>
                    <option value="5" <?=$dt['user_level']==5? "selected":"" ?> > Gudang</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Save</button>
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Cancel</button>
            </div>
        </form>
    </div>

<?php
    include_once "nav.php";
?>

<script type="text/javascript">
    $(function() {
        $("#password2").keyup(function() {
            var password1 = $("#password1").val();
            var password2 = $(this).val();

            if (password1 != password2) {
                $(".text-danger").removeAttr('style');
            } else {
                $(".text-danger").attr('style','display:none;');
            }
        })
    })
</script>