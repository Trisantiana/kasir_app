<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../../lib/class-Db.php";

    $act = $ff->get("act");
    switch ($act) {
        case 'ins':
            $post = $odb->sant(INPUT_POST);
            extract($post);
            $ins = $odb->insert("member", "null, '$nama_member', '$alamat', '$no_telp' ");
            echo "admin/member-data.php";
        break;

        case 'up':
            $post = $odb->sant(INPUT_POST);
            extract($post);
            $up = $odb->update("member", "nama_member='$nama_member', alamat='$alamat', no_telp='$no_telp' where id_member = '$id' ");
            echo "admin/member-data.php";
        break;

        case 'del':
            $id = $ff->get("id");
            if (!empty($id)) {
                    $del = $odb->delete("member where id_member = '$id'");
                    echo "admin/member-data.php";
                }
        break;

        default:
            # code...
            break;
    }

?>