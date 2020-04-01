<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    session_start();
    include_once "../../lib/class-Db.php";

    $post = $odb->sant(INPUT_POST);
    extract($post);

    if (isset($id_barang)) {
        $sel = $odb->select("barang where barcode = '$id_barang'");
        if ($sel->rowCount()>0) {
            $row = $sel->fetch();

            if (!empty($id_member) && isset($_SESSION['member']['id']) ) {
                if ($_SESSION['member']['id'] != 'umum') {
                    if ($row['harga_member'] != 0 ) {
                        $harga = $row['harga_member'];
                    } else {
                        $harga = $row['harga_jual'];
                    }
                } else {
                    $harga = $row['harga_jual'];
                }

            } else {
                $harga = $row['harga_jual'];
            }

            $arr = array("nama" => $row['nama_barang'],"harga" => $harga);
            echo json_encode($arr);
        }
    }
?>