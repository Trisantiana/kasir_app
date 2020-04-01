<?php
include_once "../lib/class-Db.php";

$id_user = $ff->sess("userID");
$user_lvl = $ff->sess("user_lvl");

$cek_user = $odb->select("user where id_user = '$id_user'");
$show = $cek_user->fetch();
?>

<!-- Sidebar -->
<div class="col-md-2 col-sm-4">
    <div class="card" align="left">
        <div class="card-header" style="background-color: #808080">
            Menu
        </div>
        <ul class="list-group list-group-flush" style="min-height: 300%;" >
            <?php

            switch ($show['user_level']) {
                case 1:
                ?>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="barang-data"> <i class="fa fa-list"></i>  Barang</a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="kategori-data"> <i class="fa fa-cube"></i> Kategori  </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="user-data"> <i class="fa fa-users"> User</i> </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="member-data"> <i class="fa fa-users"></i> Member </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="transaksi"> <i class="fa fa-tags"></i> Transaksi </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="laporan"> <i class="fa fa-tags"></i> Laporan </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="logout"> <i class="fa fa-close"></i> Logout </a>
                </li>
                <?php
                break;
                ?>
                <?php

                case 2:
                ?>

                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="laporan"> <i class="fa fa-tags"></i> Laporan </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="logout"> <i class="fa fa-close"></i> Logout </a>
                </li>
                <?php
                break;
                ?>

                <?php

                case 3:
                ?>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="transaksi"> <i class="fa fa-tags"></i> Transaksi </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="laporan"> <i class="fa fa-tags"></i> Laporan </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="logout"> <i class="fa fa-close"></i> Logout </a>
                </li>
                <?php
                break;
                ?>

                <?php

                case 4:
                ?>

                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="transaksi"> <i class="fa fa-tags"></i> Transaksi </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="logout"> <i class="fa fa-close"></i> Logout </a>
                </li>
                <?php
                break;
                ?>

                <?php

                case 5:
                ?>

                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="barang-data"> <i class="fa fa-list"></i>  Barang</a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="kategori-data"> <i class="fa fa-cube"></i> Kategori  </a>
                </li>
                <li class="list-group">
                    <a href="#" class="list-group-item" style="text-decoration: none;" id="menu" data-url="logout"> <i class="fa fa-close"></i> Logout </a>
                </li>
                <?php
                break;
                ?>

                <?php
                default:
                                    # code...
                break;
            }
            ?>
        </ul>
    </div>
</div>

            <!-- end Sidebar -->