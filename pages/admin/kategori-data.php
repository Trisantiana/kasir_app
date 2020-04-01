<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

include_once "../../lib/class-Db.php";
include_once "../../lib/class-Ff.php";

?>

<div class="card-header bg-secondary">Data Kategori <a href="#" data-url="kategori-form.php" class="btn btn-info btn-nav">Tambah</a>
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#barangAdd" data-whatever="@getbootstrap" data-url="kategori-form.php" > <i class="fa fa-plus"></i> </button>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap table-data" role="grid">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Kategori</td>
                    <td>Isparent</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $no=1;
                $q = $odb->select("kategori");
                while ($r = $q->fetch()) {
                    if ($r['isparent'] !=0) {
                        $sel = $odb->select("kategori where id_kategori = '".$r['isparent']."' ");
                        $k = $sel->fetch();
                        $par = $k['kategori'];
                    } else {
                        $par = "";
                    }

                    ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$r["kategori"]?></td>
                    <td><?=$par?></td>
                    <td>
                        <a href="#" data-url="kategori-edit.php?id=<?=$r['id_kategori']?>" class="btn btn-info btn-nav"> <i class="fa fa-edit"></i>  </a>
                        <a href="#" data-url ="ktg-save.php?act=del&id=<?=$r['id_kategori']?>" class="btn btn-danger btn-nav" onclick="return confirm('Yakin Ingin Menghapus Data Ini ? ')" > <i class="fa fa-trash"></i>  </a>
                    </td>
                </tr>

                <?php
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    include_once "nav.php";
?>

<script type="text/javascript">
    $("#barangAdd").submit(function(){
            var data1 = $(this).serialize();
            var url = $(this).attr("data-url");
            $.ajax({
                type : "post",
                url : "admin/"+url,
                data : data1,
                success : function(data){
                    alert(data);
                    $("#content").empty();
                    $("#content").load(data);
                }
            })
        });
</script>







<!-- Modal -->
<div class="modal fade" id="barangAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="post" action="skat.php?p=add">
      <div class="form-group">
        <label for="kategori" class="col-form-label">Nama Kategori :</label>
        <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Nama Kategori">
    </div>

    <div class="form-group">
        <label for="isparent">Isparent</label>
        <select class="form-control" id="isparent" name="isparent">
          <option value="0"> PIlih  </option>
          <?php
          $q=$odb->select("kategori");
          while ($dt = $q->fetch()) {
                        # code...

            ?>
            <option value="<?=$dt['id_kategori']?>"><?=$dt['kategori']?></option>
            <?php
        }
        ?>
        </select>
    </div>

</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" onclick="saveData()" class="btn btn-primary">Save changes</button>
    </div>
</div>
</div>
</div>


<script type="text/javascript" src="../../plugins/jquery/dist/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(function saveData(){
        var kategori = $('#kategori').val();
        var isparent = $('#isparent').val();

        $.ajax ({
            type : "post",
            url : "ktg-save.php?act=add",
            data : "kategori="+ kategori +"&isparent="+isparent ,
            success = function(data) {
                alert(data);
                alert("Data Tersimpan!");
            }
        }); // end of ajax $
    })
</script>