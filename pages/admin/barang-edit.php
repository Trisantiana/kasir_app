<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../../lib/class-Db.php";

    $id = $ff->get("id");
    if (!empty($id)) {
        $sel = $odb->select("barang where id_barang='$id'");
        if ($sel->rowCount()>0) {
            $row = $sel->fetch();
        }
    }
?>

<div class="card-header bg-secondary">Form Edit Barang</div>
<div class="card-body">
    <button class="btn btn-primary btn-nav" data-url="barang-data.php"> <i class="fa fa-arrow-left"></i> Back </button>
    <form action="javascript:void(0);" method="post" id="form-input" data-url="barang-save.php?act=up">
        <input type="hidden" name="id" value="<?=$id?>">

        <div class="form-group">
            <label for="">Barcode</label>
            <input type="number" name="barcode" class="form-control" value="<?=$row['barcode']?>">
        </div>

        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?=$row['nama_barang']?>">
        </div>

        <div class="form-group">
            <label for="">Nama Pendek</label>
            <input type="text" name="nama_pd" class="form-control" value="<?=$row['nama_pd']?>">
        </div>

        <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" value="<?=$row['kategori']?>">
                <option value=""><-- Pilih Kategori --></option>
                <?php
                    $sel = $odb->select("kategori");
                    while ($k = $sel->fetch()) {
                        if ($k['id_kategori']==$row['id_kategori']) {
                            echo " <option value='$k[id_kategori]' selected> $k[katgeori] </option> ";
                        } else {

                        }
                        echo "<option value='$k[id_kategori]'> $k[kategori] </option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?=$row['stok']?>">
        </div>

        <div class="form-group">
            <label for="">Harga Pokok</label>
            <input type="number" name="harga_pokok" class="form-control" value="<?=$row['harga_pokok']?>">
        </div>

        <div class="form-group">
            <label for="">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="<?=$row['harga_jual']?>">
        </div>

        <div class="form-group">
            <label for="">Harga Member</label>
            <input type="number" name="harga_member" class="form-control" value="<?=$row['harga_member']?>">
        </div>

        <div class="form-group">
            <label for="">Harga Diskon</label>
            <input type="number" name="harga_diskon" class="form-control" value="<?=$row['harga_diskon']?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-warning" name="reset"><i class="fa fa-refresh"></i> Cancel </button>
        </div>

    </form>
</div>

<?php
    include "nav.php";
?>
