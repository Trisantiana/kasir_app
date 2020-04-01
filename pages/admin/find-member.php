<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    session_start();
    include_once "../../lib/class-Db.php";

    $post = $odb->sant(INPUT_POST);
    extract($post);

    if (isset($id)) {
        $sel = $odb->select("member where id_member = '$id'");
        if ($sel->rowCount()>0) {
            $row = $sel->fetch();
            echo $row['nama_member'];
            $_SESSION['member']['id'] = $id;
        } else {
            echo "member tidak ditemukan";
            $_SESSION['member']['id'] = 'umum';
        }
    }
?>