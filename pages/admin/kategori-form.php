<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";
?>

<div class="card-header bg-secondary">Form Tambah Kategori</div>
<div class="card-body">
    <p><a href="#" data-url="kategori-data.php" class="btn btn-primary btn-nav"> <i class="fa fa-arrow-left"> Back</i> </a></p>
    <form action="javascript:void(0);" method="post" id="form-input" data-url="ktg-save.php?act=ins">
        <div class="form-group">
            <label for="">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Nama Kategori">
        </div>
        <div class="form-group">
            <label for="">Isparent</label>
            <select name="isparent" id="isparent" class="form-control select2">
                <option value=""> <-- Pilih Isparent -->  </option>
                <?php
                $q=$odb->select("kategori");
                while ($dt = $q->fetch()) {
                        # code...

                    ?>
                    <option value="<?=$dt['id_kategori']?>"><?=$dt['kategori']?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        <button type="reset" class="btn btn-warning"> <i class="fa fa-undo"> Cancel</i></button>
    </form>

</div>

<?php
    include_once "nav.php";
?>


