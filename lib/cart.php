<?php
    session_start();
    include_once "class-Db.php";

    $aksi = $ff->get("act");
    $post = $odb->sant(INPUT_POST);

    switch ($aksi) {
        case 'add':
            # code...
            extract($post);
            $sel = $odb->select("barang where barcode = '$barcode'");
            if ($sel->rowCount()>0) {
                $row = $sel->fetch();

                if (isset($_SESSION['cart'][$row['id_barang']])) {
                    if ($jumlah==0) {
                        unset($_SESSION['cart'][$row['id_barang']]);
                    } else {
                        $_SESSION['cart'][$row['id_barang']] += $jumlah;
                    }
                } else {
                    $_SESSION['cart'][$row['id_barang']] = $jumlah;
                }

                // if (empty($_SESSION['member']['id'])) {
                //     # code...
                //     if (!empty($id_member)) {
                //         $q = $odb->select("member where id_member = '$id_member'");
                //         $m = $q->fetch();
                //         $_SESSION['member']['id'] = $m['id_member'];
                //         $_SESSION['member']['nama'] = $m['nama_member'];
                //     } else {
                //         $_SESSION['member']['id'] = "umum";
                //         $_SESSION['member']['nama'] = "umum";
                //     }
                // }
            }
        break;

        case 'batal':
            # code...
            unset($_SESSION['cart']);
            unset($_SESSION['member']);
        break;

        default:
            # code...
            break;
    }
?>