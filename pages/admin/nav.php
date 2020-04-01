<script type="text/javascript">
    $(function(){
        $(".btn-nav").click(function(){
            var page = $(this).attr("data-url");
            $.ajax({
                type:"post",
                url:"admin/"+page,
                success:function(data){
                    // alert(data);
                    var a = data.length;
                    if (data.substring(a-4,a)==='.php') {
                        $("#content").empty();
                        $("#content").load(data);
                    } else {
                        $("#content").empty();
                        $("#content").html(data);
                    }
                },
                error:function(){
                    alert("error bos");
                    $("#content").html("404 page not found");
                }
            });
        });

        $("#form-input").submit(function(){
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
    })


// <!-- Plugins -->
    $(function() {
        $(".table-data").dataTable();
        $(".select2").select2();
        $(".daterangepicker").daterangepicker({
           format: 'yyyy-mm-dd - yyyy-mm-dd '});
    })
</script>