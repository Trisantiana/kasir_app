<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    session_start();
    include_once "../../lib/class-Db.php";

    $aksi = $ff->get("act");
    if ($aksi == "login") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $sel = $odb->select("user where username = '$username' and password = '" .md5($password). "' ");

        if ($sel->rowCount()>0) {
            $row = $sel->fetch();
            $_SESSION['userID'] = $row['id_user'];
            $_SESSION['user_lvl'] = $row['user_level'];
            echo "sukses";
        } else {
            echo "gagal";
        }
    }
?>