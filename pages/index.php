<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start();
include_once "../lib/class-Db.php";
include_once "../lib/class-Ff.php";

$id_user  = $ff->sess("userID");
$user_lvl = $ff->sess("user_lvl");
// $cek_user = $odb->select("user where id_user = $id_user");
// $r = $cek_user->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page | Kasir</title>
    <link rel="shortcut icon" href="../images/2.png">
    <!-- Bootstrap min -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- dataTables -->
    <!-- <link rel="style<link rel="shortcut icon" href="letakkan lokasi file gambar di sini">sheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.css">-->
    <link rel="stylesheet" href="../plugins/datatables.net-bs/css/bootstrap.css">
    <link rel="stylesheet" href="../plugins/datatables.net-bs/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
    <!-- date range picker -->
    <link rel="stylesheet" href="../plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!-- <link rel="stylesheet" href="../plugins/datepicker/dist/css/bootstrap-datepicker.min.css"> -->

</head>
<body style="width: 100%; height: 100%;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #A9A9A9; position: fixed; z-index: 1000; width: 100%;">
        <a href="#">
            <img src="../images/2.png" width="70" height="50" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" area-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"> <i class="fa fa-address-card"></i> About us </a>
                </li>
            </ul>

            <?php
            $user = $odb->select("user where id_user = '$id_user'");
            $row = $user->fetch();
            ?>
            <span class="badge bagde-secondary text-uppercase" id="user"> <?=$row['username']?> </span>

            <form action="" class="form-inline my-2 my-lg-0">
                <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
                <button class="btn " style="background-color: #696969" type="submit"> <i class="fa fa-search"></i> </button>
            </form>
        </div>
    </nav>
    <!-- end Navbar -->

    <br>
    <br><br><br>
    <div class="container col-md-12 col-sm-12">
        <div class="row ">

        <?php
            include_once "admin/sidebar.php";
        ?>


        <!-- content -->

        <div class="col-md-10">
            <div class="card bg-light " style="max-width: 80%;" id="content">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="title">Title</h5>
                    <p class="card-text">lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum </p>
                    <p>
                        <a class="btn btn-primary" href="#" role="button">Learn More </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- end content -->


    </div>
</div>


<br>

<nav class="footer navbar-bottom fixed-bottom" style=" background-color: gainsboro;" width="50" height="70">
    <a href="#" style="text-decoration: none;"><center> Copyright &copy;2018</center></a>
</nav>

</body>
</html>

<!-- Jquery -->
<script type="text/javascript" src="../plugins/jquery/dist/jquery-3.3.1.js"></script>
<!-- popup -->
<script src="../plugins/popup/jquery.popupwindow.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Data Tables -->
<script src="../plugins/datatables.net/js/jquery.dataTables.js"></script>
<!-- <script src="../plugins/datatables.net-bs/js/dataTables.bootstrap.js"></script>-->
<script src="../plugins/datatables.net-bs/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables.net-bs/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/dist/js/select2.min.js"></script>
<!-- date time -->
<script src="../plugins/moment/moment.js"></script>
<script src="../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- <script src="../plugins/datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->


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

<?php
include_once "admin/modal.php";
if (empty($_SESSION['userID'])) {
    ?>
    <script type="text/javascript">
        $(function(){
            $('#login-modal').modal('show');
        })
    </script>

    <?php
}
?>


<script type="text/javascript">
    function popup($page) {
        $.popupWindow('admin/' + $page, {
            width : 500,
            height : 800,
            center : 'parent'
        });
    }
</script>