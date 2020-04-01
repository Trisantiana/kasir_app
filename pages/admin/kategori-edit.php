<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";
include_once "nav.php";

    $id =$ff->get("id");
    $res=$odb->select("kategori where id_kategori='$id'");
    $dt=$res->fetch();
?>

<div class="card-header bg-secondary">Form Edit Kategori</div>
<div class="card-body">
    <form action="javascript:void(0);" method="post" id="form-input" data-url="ktg-save.php?act=up">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
            <label for="">Nama Kategori</label>fashion wanita
            <input type="text" class="form-control" name="kategori" id="kategori" value="<?=$dt['kategori']?>">
        </div>
        <div class="form-group">
            <label for="">Isparent</label>
            <select name="isparent" id="isparent" value="<?=$dt['isparent']?>" class="form-control select2">
                <option value=""><-- Pilih Kategori</option>

                <?php
                    $sel = $odb->select("kategori where id_kategori<> '" .$row['id_kategori']. "' ");
                    while ($k = $sel->fetch()) {
                        if ($k['id_kategori']==$row['isparent']) {
                            echo "<option value='$k[id_kategori]' selected>  $k[kategori] </option>";
                        } else {
                            echo "<option value='$k[id_kategori]'> $k[kategori] </option>";
                        }
                    }
                ?>
                <!-- <?php
                $q=$odb->select("kategori");
                while ($dt = $q->fetch()) {
                        # code...

                    ?>
                    <option value="<?=$dt['id_kategori']?>"><?=$dt['kategori']?></option>
                    <?php
                }
                ?> -->
            </select>
        </div>

        <input type="submit" name="btn-simpan" class="btn btn-primary " value="Save">
    </form>

</div>

