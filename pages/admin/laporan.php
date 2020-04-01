<div class="row">
    <div class="col-md-6" >
        <div class="card">
            <div class="card-header" style="background-color: #40DCDCFF;"> Stok Opname </div>
            <div class="card-body">
                Note : Lihat data yang masih tersedia
                <button class="btn btn-primary" onclick="popup('laporan-stok.php');"><i class="fa fa-list"></i> Lihat Data</button>
            </div>
        </div>
    </div>

    <div class="col-md-6" >
        <div class="card">
            <div class="card-header" style="background-color: #40DCDCFF;"> Barang Terjual </div>
            <div class="card-body">
                <label> Tanggal </label>

                <input type="text" class="form-control daterangepicker" id="tanggal"> <i class="fa fa-calendar"></i>
                <br><br> <br>
                <p>note : digunakan untuk melihat jumlah barang yang terjual dalam rentan waktu tertentu</p>
                <button class="btn btn-primary" id="terjual" onclick="popup('laporan-terjual.php');"><i class="fa fa-list"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6" >
        <div class="card" >
            <div class="card-header" style="background-color: #40DCDCFF;"> Keuntunngan </div>
            <div class="card-body">
                Note : lorem ipsum lorem ipsum lorem ipsumlorem ipsum
                <div class="btn btn-primary">Lihat data</div>
            </div>
        </div>
    </div>

     <div class="col-md-6" >
        <div class="card">
            <div class="card-header" style="background-color: #40DCDCFF;"> Barang Paling Laku </div>
            <div class="card-body">
                Note : lorem ipsum lorem ipsum lorem ipsumlorem ipsum
                <div class="btn btn-primary">Lihat data</div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once "nav.php";
?>

<script type="text/javascript">
    $(function() {
        $("#terjual").click(function() {
            var tgl = $("#tanggal").val();
            var url = $(this).attr("data-url");

            if ($tgl != "") {
                url = "admin/" +url;

            }
        })
    })
</script>