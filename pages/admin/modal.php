<div class="modal fade" data-backdrop="static" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Please Login </h5>
            </div>

            <div class="modal-body">
                <form action="javascript:void(0)" method="post" id="form-login" data-url="admin/cek-login.php?act=login">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"> <i class="fa fa-key"></i> </span>
                        </div>

                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">

                    </div>
            </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                </form>


        </div>
    </div>
</div>



<script type="text/javascript">
    $(function() {
        $("#form-login").submit(function() {
            var url = $(this).attr("data-url");
            var data1 = $(this).serialize();
            $.ajax({
                type : "post",
                url : url,
                data : data1,
                success : function(data) {
                    alert(data);
                    if (data === "sukses") {
                        $('#login-modal').modal('hide');
                        location.reload(true);
                    } else {
                        alert("LOGIN GAGAL");
                    }
                }
            });
        });
    })
</script>