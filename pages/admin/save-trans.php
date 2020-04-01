<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start();
require __DIR__ .'/autoload.php' ;
use Mike42\Escpos\Printer;
    // use Mike42\Escpos\PrinterConnectors\WindowsPrintConnector;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;

    // $printer = new Printer($connector);
include_once "../../lib/class-Db.php";

$post = $odb->sant(INPUT_POST);
extract($post);

if (isset($_SESSION['member']['id'])) {
    if ($_SESSION['member']['id'] == "umum" ) {
        $member_id = 2;

    } else {
        $member_id = $_SESSION['member']['id'];
    }
} else {
    $member_id = 2;
}

$ins_trans = $odb->insert("transaksi", "null, now(), '".$_SESSION['userID']."', '$member_id' ");
$id_trans = $odb->lastId();
$gabung = "";

foreach ($_SESSION['cart'] as $key => $val) {
                # code...
    $sel = $odb->select("barang where id_barang = '$key'");
    $row = $sel->fetch();
    if ($member_id == 2) {
        $harga = $row['harga_jual'];

    } else {
        if ($member_id == 2) {
            $harga = $row['harga_jual'];
        } else {
            $harga = $row['harga_member'];
        }
    }

    // $id = $ff->get("id_user");
    // $user = $odb->select("user where id_user = '$id'");
    // $row = $user->fetch();

    $ins_det = $odb->insert("detail_transaksi", "null, '$id_trans', '$key', '$val', '$harga' ");
    // update stok barang dengan store procedure
    $odb->query("call updateStok($key, $val)");
    // penggunaan waktu
    $time = date("d-m-Y H:i:s");

    // val = jumlah
    // key  = id
    $jumlah = str_pad($val, 4, " ", STR_PAD_RIGHT);
    $harga = str_pad($harga, 10, " ", STR_PAD_LEFT);
    $sub_total = str_pad($harga*$val, 17, " ", STR_PAD_LEFT);
    $gabung = $gabung.$row['nama_barang']."\n".$jumlah."x".$harga.$sub_total."\n";

    // $id = $ff->get("id_user");
    // $user = $odb->select("user where id_user = '$id'");
    // $row = $user->fetch();

    unset($_SESSION['cart'][$key]);

}

        unset($_SESSION['member']['id']);
                // try catch digunakan untuk error handling
        try {
            // $connector = new WindowsPrintConnector("POS58");
            $connector = new FilePrintConnector("/dev/usb/lp0");
            $printer = new Printer($connector);
            // $img = EscposImage::load("lg1.png");
            // $printer -> graphics($img);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $printer -> text(" STORE \n");
            $printer -> text(" TRI SANTIANA \n");
            $printer -> selectPrintMode(Printer::MODE_FONT_A);
            $printer -> text("Bareng, Simo, Slahung, Po \n");
            $printer -> text("--------------------------------");
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $printer -> selectPrintMode(Printer::MODE_FONT_A);
            $printer -> text($time."\n");
            $printer -> setJustification(Printer::JUSTIFY_RIGHT);
            $printer -> selectPrintMode(Printer::MODE_FONT_A);
            $printer -> text($kasir=$row["username"]."\n");
            $printer -> text("--------------------------------");
            $printer -> feed(1); // untuk enter
            $printer -> setJustification(Printer::JUSTIFY_LEFT);
            $printer -> selectPrintMode(Printer::MODE_FONT_A);
            $printer -> text($gabung);
            $printer -> feed(2);
            $printer -> text("-------------------------------- \n");
            $total_pad = "TOTAL".str_pad($sub_total, 27, " ", STR_PAD_LEFT);
            $printer -> text($total_pad."\n");
            $bayar_pad = "BAYAR".str_pad($bayar, 27, " ", STR_PAD_LEFT);
            $printer -> text($bayar_pad."\n");
            $kembali_pad = "KEMBALI".str_pad($kembali, 25, " ", STR_PAD_LEFT);
            $printer -> text($kembali_pad."\n");
            $printer -> feed(2);
            $printer -> setJustification(Printer::JUSTIFY_CENTER);
            $printer -> text("*** Terimakasih *** \n");
            $printer -> text("ATAS KUNJUNGAN ANDA \n");
            $printer -> feed(3);
            $printer -> cut();

            // close printer
            $printer -> close();
        } catch(Exception $e) {
            // digunakan untuk pengeksepsian
        }


        ?>