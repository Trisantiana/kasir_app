<div class="modal fade" data-backdrop="static" id="trans-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Transaksi </h5>
            </div>

            <div class="modal-body">
                <form action="javascript:void(0);" method="post" id="form-input" data-url="cart.php?act=add">
                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="">Id Member</label>
                        </div>

                        <input type="text" name="id_member" id="id_member" class="form-control col-md-4" autofocus>
                        <h3><span class="badge bagde-secondary text-uppercase" id="member"></span></h3>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="">Barcode</label>
                        </div>

                        <input type="text" name="barcode" id="barcode" class="form-control col-md-6" autofocus>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="">Nama Barang</label>
                        </div>

                        <input type="text" name="nama_barang" id="nama_barang" class="form-control col-md-6" readonly>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="">Harga Satuan</label>
                        </div>

                        <input type="text" name="harga" id="harga" class="form-control col-md-6" readonly>
                    </div>

                    <div class="form-row">
                        <div class="col-md-2">
                            <label for="">Jumlah</label>
                        </div>

                        <input type="text" name="jumlah" id="jumlah" class="form-control col-md-6">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>

                </form>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>

                    <tbody id="data-trans">

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    loadData();
    function loadData() {
        $("#data-trans").load('admin/data-trans.php');
    }

    $(function() {
        // find member
        $("#id_member").keyup(function(){
            var id = $(this).val();

            $.ajax({
                url : 'admin/find-member.php',
                data : 'id='+id,
                type : 'post',
                success : function(data) {
                    // alert(data);
                    $("#member").html(data);
                }
            });
        });

        //cari barang
        $("#barcode").keyup(function() {
            var id_barang = $(this).val();
            var id_member = $("#id_member").val();

            $.ajax({
                url : 'admin/find-barang.php',
                type : 'post',
                data : 'id_barang=' + id_barang + '&id_member=' + id_member,
                success : function(data) {
                    // alert(data);
                    if (data != null && data != '') {
                        var obj = JSON.parse(data);
                        $("#nama_barang").val(obj.nama);
                        $("#harga").val(obj.harga);
                        $("#jumlah").focus();
                    } else {
                        $("#nama_barang").val('');
                        $("#harga").val('');
                    }
                }
            });
        });

        //add barang to cart
        $("#form-input").submit(function() {
            var data = $(this).serialize();
            var url = $(this).attr("data-url");

            $.ajax({
                type : 'post',
                url : '../lib/'+url,
                data : data,
                success : function(data) {
                    // alert(data);
                    loadData();
                    $("#barcode").val('');
                    $("#nama_barang").val('');
                    $("#harga").val('');
                    $("#jumlah").val('');
                    $("#barcode").focus();
                }
            });
        });

    })
</script>
