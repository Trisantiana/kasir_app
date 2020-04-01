<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../../lib/class-Db.php";

    $act = $ff->get("act");

    switch ($act) {
        case 'ins':
            $post = $odb->sant(INPUT_POST);
            extract($post);

            if ($password1 == $password2) {
                $ins = $odb->insert("user(username, password, nama_lengkap, user_level)", " '$username', '".md5($password1)."', '$nama_lengkap', '$user_level'");
                // $ins = $odb->insert("user", "null, '$username', '$password1', '', '$user_level' ");
                echo "admin/user-data.php";
            } else {
                echo "admin/user-form.php";
            }
            break;

        case 'up':
            $post = $odb->sant(INPUT_POST);
            extract($post);
            if (!empty($password1) && !empty($password2)) {
                if ($password1 == $password2) {
                    $password = md5($password1);
                    $up = $odb>query("update user set username = '$username', password = '$password', user_level = '$user_level' where id_user = '$id' ");
                    echo "admin/user-data.php";
                } else {
                    echo "admin/user-form.php";
                }
            } else {
                $up = $odb->query("update user set username = '$username', user_level = '$user_level' where id_user = '$id' ");
                echo "admin/user-data.php";
            }
            break;

        case 'del':
            $id = $ff->get("id");
            if (!empty($id)) {
                $del = $odb->delete("user where id_user = '$id' ");
                echo "admin/user-data.php";
            }
            break;

        default:
            # code...
            break;
    }
?>