<?php
    class Fungsi {
        function post($p, $a="") {
            return isset($_POST["$p"]) ?$_POST["$p"] : "$a";
        }

        function get($p, $a="") {
            return isset($_GET["$p"]) ?$_GET["$p"] : "$a";
        }

        function sess($p, $a="") {
            return isset($_SESSION["$p"]) ?$_SESSION["$p"] : "$a";
        }

        function rp($duit) {
            return "Rp. ".number_format($duit);
        }

        function alert($a) {
            echo "<script>alert('$a')</script>";
        }

        function redirect($a) {
            echo "<script>location.href('$a')</script>";
        }

        function back() {
            echo "<script>history.back()</script>";
        }

        function upload($foto) {
            $fname = "";
            $status = 1;

            $fn = $_FILES[$foto]['name'];
            $fs = $_FILES[$foto]['size'];
            $ft = $_FILES[$foto]['type'];
            $fe = $_FILES[$foto]['error'];
            $tipe = array("image/jpg", "image.jpeg", "image/png");

            if (! in_array($ft, $tipe)) {
                $this->alert("Type foto tidak valid! Type harus berupa <strong> JPG, JPEG, PNG </strong>");
                $fname = "";
            } elseif ($fe == 0 || $fs > 0) {
                $fname = "BR_".date("dmY").".jpg";
                $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../images/'.$fname);
            } else {
                $faname = "";
            }

            return $fname;

        }
    }

    $ff = new Fungsi();
?>