<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include_once "../../lib/class-Db.php";

    $act = $ff->get("act");
    switch ($act) {
        case 'ins':
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $id = $ff->sess("userID");
        $user = $odb->select("user where id_user = '$id' ") ;
        $r = $user->fetch();
        // $ins = $odb->insert("barang(barcode, nama_barang, nama_pd, id_kategori, stok, harga_pokok, harga_jual, harga_member, harga_diskon)", " '$barcode', '$nama_barang', '$nama_pd','$kategori', '$stok', '$harga_pokok', '$harga_jual', '$harga_member', '$harga_diskon', '$id_user'");
        $ins = $odb->insert("barang", "null, '$id_kategori', '$barcode', '$nama_barang', '$nama_pd', '$stok', '$harga_pokok', '$harga_jual', '$harga_member', '$harga_diskon', '4', null ");
        echo "admin/barang-data.php";
        break;

        case 'up':
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $up = $odb->update("barang","barcode = '$barcode', nama_barang = '$nama_barang', nama_pd = '$nama_pd', id_kategori = '$kategori', stok = '$stok', harga_pokok = '$harga_pokok', harga_jual  = '$harga_jual', harga_member = '$harga_member', harga_diskon = '$harga_diskon' where id_barang = '$id' ");
        echo "admin/barang-data.php";
        break;

        case 'del':
            $id = $ff->get("id");
            if (!empty($id)) {
                $del = $odb->delete("barang where id_barang = '$id' ");
                echo "admin/barang-data.php";
            }
            break;

        default:
               # code...
        break;
    }
?>