<div class="card-header bg-secondary">Form Tambah User</div>
    <div class="card-body">
        <form action="javascript:void(0);" id="form-input" data-url="user-save.php?act=ins">

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password1" id="password1" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="">Ulangi Password <p class="text-danger" style="display: none;">Password tidak sesuai</p> </label>
                <input type="password" id="password2" name="password2" placeholder="Ulangi Password" class="form-control">
            </div>

            <div class="form-group">
                <label for="">User Level</label>
                <select name="user_level" class="form-control" required>
                    <option value=""> <-- Pilih Level User --> </option>
                    <option value="1">Administrator</option>
                    <option value="2">Manager</option>
                    <option value="3">Supervisor</option>
                    <option value="4">Kasir</option>
                    <option value="5">Gudang</option>
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