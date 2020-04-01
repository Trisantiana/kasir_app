<?php
session_start();

include_once "../../lib/class-Db.php";

    $total = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $val) {
                # code...
            $sel = $odb->select("barang where id_barang = '$key' ");
            $row = $sel->fetch();

            if (isset($_SESSION['member']['id'])) {
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

            $total += $val*$harga;

            ?>

            <tr>
                <td> <?=$row['nama_barang']?> </td>
                <td> <?=$val?> </td>
                <td> <?=$harga?> </td>
                <td> <?=$val*$harga?> </td>
            </tr>

            <?php
        }
    } else {
        echo "data kosong";
    }
?>
<tr>
    <td colspan="3"> Total </td>
    <td> <input type="text" name="total" id="total" class="form-control" readonly value="<?=$total?>"> </td>
</tr>

<tr>
    <td colspan="3"> Bayar </td>
    <td> <input type="number" name="bayar" id="bayar" value="0" class="form-control" > </td>
</tr>

<tr>
    <td colspan="3"> Kembali </td>
    <td> <input type="number" name="kembali" id="kembali" value="0" readonly class="form-control" > </td>
    <td>  </td>
</tr>

<script>
    $(function() {
        // body...
        $('#bayar').keyup(function() {
            var total = $("#total").val();
            var bayar = $(this).val();
            $("#kembali").val(bayar-total);
        });

        // simpan transaksi
        $("#bayar").keypress(function(){
            if (event.keyCode == 13) {
                var total = $("#total").val();
                var bayar = $(this).val();
                var kembali = $("#kembali").val();
                if (parseInt(total)>0) {
                    if (parseInt(bayar)>=parseInt(total)) {
                        $.ajax({
                            url : 'admin/save-trans.php',
                            type : 'post',
                            data : 'total='+total+'&bayar='+bayar+'&kembali='+kembali,
                            success : function(data) {
                                if (data ==='') {
                                    alert('Transaksi Selesai');
                                    $("#id_member").val();
                                    $("#data-trans").load('admin/data-trans.php');
                                } else {
                                    alert(data);
                                }
                            }
                        })
                    } else {
                       alert('uang bayar belum cukup');
                    }
                } else {
                    alert('belum ada transaksi');
                }
            }
        });
    })
</script>