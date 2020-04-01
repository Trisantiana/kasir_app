<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";

?>

<div class="card-header bg-secondary">Form Tambah Barang</div>
<div class="card-body">
    <p>
        <a href="#" data-url="barang-data.php" class="btn btn-primary btn-nav"> <i class="fa fa-arrow-left"></i> Back </a>
    </p>
    <form action="javascript:void(0);" method="post" id="form-input" data-url="barang-save.php?act=ins">

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="">Barcode</label>
                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
            </div>

            <div class="form-group col-md-6">
                <label for="">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"  placeholder="Nama Barang">
            </div>

            <div class="form-group col-md-6">
                <label for="">Nama  Pendek</label>
                <input type="text" name="nama_pd" id="nama_pd" class="form-control" placeholder="Nama Pendek">
            </div>

            <div class="form-group col-md-12">
                <label for="">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-control select2">
                    <option value=""> <-- Pilih Kategori --> </option>

                    <?php
                    $q = $odb->select("kategori");
                    while ($dt = $q->fetch()) {
                        # code...
                        ?>
                        <option value="<?=$dt['id_kategori']?>"> <?=$dt['kategori']?> </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" placeholder="Stok">
            </div>

            <div class="form-group col-md-6">
                <label for="">Harga Pokok</label>
                <input type="number" name="harga_pokok" id="harga_pokok" class="form-control" placeholder="Harga Pokok">
            </div>

            <div class="form-group col-md-6">
                <label for="">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" class="form-control" placeholder="Harga Jual">
            </div>

            <div class="form-group col-md-6">
                <label for="">Harga Member</label>
                <input type="number" name="harga_member" id="harga_member" class="form-control" placeholder="Harga Member">
            </div>

            <div class="form-group col-md-6">
                <label for="">Harga Diskon</label>
                <input type="number" name="harga_diskon" id="harga_diskon" class="form-control" placeholder="Harga Diskon">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-primary  "> <i class="fa fa-save"></i> Save</button>
            <button type="reset" name="reset" class="btn btn-warning btn-nav"> <i class="fa fa-close"></i> Cancel </button>
        </div>


    </form>
</div>

<?php
include_once "nav.php";
?>