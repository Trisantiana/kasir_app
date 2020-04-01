<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";

    $act = $ff->get("act");
    switch ($act) {
        case 'ins':
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $ins = $odb->insert("kategori", "null, '$kategori', '$isparent' ");
        echo "admin/kategori-data.php";
        break;

        case 'up':
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $up = $odb->update("kategori", "kategori = '$kategori', isparent = '$isparent' where id_kategori = '$id' ");
        echo "admin/kategori-data.php";
        break;

        case 'del':
        $id = $ff->get("id");
        if (!empty($id)) {
            $del = $odb->delete("kategori where id_kategori = '$id'");
            echo "admin/kategori-data.php";
        }
        break;

        default:
                # code...
        break;
    }