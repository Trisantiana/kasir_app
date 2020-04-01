<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../lib/class-Db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>halaman admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-light" style="background-color: #1abc9c;">
        <a class="navbar-brand" href="#">
            <img src="../images/2.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Administrator
        </a>
        <a href="#" style="text-decoration: none; color: #000;"> Hy, username <i class="fa fa-user"></i></a>
    </nav>
    <!-- end nabvar -->
    <br>

    <!-- sidebar -->
    <div class="media" style="padding-left: 5%; padding-bottom: 1%;">
        <img  src="../images/lg1.jpg" width="80" height="80" >
    </div>
    <div class="container col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="card" align="left">
                    <div class="card-header">
                        Menu
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group">
                            <a href="#" class="list-group-item" id="menu" data-url="barang-data" style="text-decoration: none;"> <i class="fa fa-list"></i> Data Barang </a>
                        </li>
                        <li class="list-group">
                            <a href="#" class="list-group-item" id="menu" data-url="kategori-data" style="text-decoration: none;"> <i class="fa fa-plus"></i> Tambah Data Barang </a>
                        </li>
                        <li class="list-group">
                            <a href="#" class="list-group-item" id="menu" data-url="transaksi-data" style="text-decoration: none;"> <i class="fa fa-shopping-cart"></i> Transaksi </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end sidebar -->

            <!-- content -->
            <div class="col-md-8 col-sm-8">
                <div class="card" style="min-height: 80%" id="content">
                    <div class="card-header">
                        Data Barang
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p>
                        <a href="#" class="btn btn-primary">Read More ..</a>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="../bootstrap/dist/js/jquery.2.1.1.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(function(){
        $(".list-group-item").click(function(){
            var alamat = $(this).attr("data-url");
            $.ajax({
                type:"post",
                url:"admin/"+alamat+".php",
                success:function(data){
                    $("#content").empty();
                    $("#content").html(data);
                },
                error:function(){
                    $("#content").html("404 page not found");
                }
            });
        });
    })
</script>