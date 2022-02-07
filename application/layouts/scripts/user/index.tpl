<style>
    th {
        text-align: center;
    }
    td {
        text-align: center;
    }
    .delete-button{
        color: #337ab7;
        background: none;
        border: none;
    }
    .update-button{
        color: #337ab7;
        background: none;
        border: none;
    }
</style>
<section>
    {$stt=1}
    <header class="panel-heading">
        <div class="col-sm-10">
            Quản lý người dùng
        </div>
        <div class="col-sm-2">
            <div class="add-data">
                <a href="/asset/add" class="btn btn-success" style="" class="card-title" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>
                <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" ><i class="fas fa-times"></i> Xóa</a></span>
            </div>
        </div>
    </header>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="width:60px;" >
                        <input type="checkbox" class="check-control" id="all-checked">
                    </th>
                    <th style="color:black">Họ tên</th>
                    <th style="color:black">Số điện thoại</th>
                    <th style="color:black">Email</th>
                    <th style="color:black">Quyền</th>
                    <th style="color:black">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <div id="message">
                    {if isset($message)}
                        <div class="alert alert-success">{$message}</div>
                    {/if}
                </div>
                {foreach $user_list  as $key=>$value}
                    <tr id="row{$value.user_id}">
                        <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="{$value.user_id}"><i></i></label></td>
                        <td style="color:black" >{$value.name}</td>
                        <td style="color:black" >{$value.phone}</td>
                        <td style="color:black" >{$value.email}</td>
                        <td style="color:black" >{$value.role_name}</td>
                        <td>
                            <a href="/asset/detail/id/{$value.user_id}" style="margin-right: 20px"><i class="fas fa-eye"></i></a>
                            <a href="/asset/update/id/{$value.user_id}"  style="margin-right: 20px"><i class="fas fa-pen"></i></a>
                            <button class="delete-button" data-toggle="modal" data-target="#delete-data" data-id="{$value.user_id}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                {/foreach}
                </tbody>

                {*form multi delete*}

                <div class="modal fade xoa-modal" id="multi-delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                                <div>Bạn có chắc muốn xóa những tài sản này?</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary" id="btn_multi_delete"">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
                        <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                        </div>
                    </div>
                </div>
                {*form delete*}
                <div class="modal fade xoa-modal" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b style="font-size: 17px">Xác nhận</b>
                            </div>
                            <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                                <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Bạn có chắc muốn xóa tài sản này?</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                <a class="btn btn-primary delete">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
                        <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                            <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
                        </div>
                    </div>
                </div>

            </table>
        </div>
    </div>
</section>
<script>
    //xóa dữ liệu
    let delete_select_id;
    $(".delete-button").click(function(){
        delete_select_id = $(this).data("id");
        console.log(delete_select_id);
    });
    $(".delete").click(function(){
        var delete_id = delete_select_id;
        console.log(delete_id);
        $.ajax({
            method: "POST",
            url: "/user/delete",
            data:{
                "id":delete_id
            },
            success:function(data) {
                $(".xoa-modal").modal('hide');
                $("#row"+delete_id).remove();
                $(".alert").remove();
                $("#message").append('<div class="alert alert-success">Xóa tài sản thành công!</div>');
            }
        });
    });
    //xóa nhiều dữ liệu
    $("#btn_multi_delete").click(function(){
        var id =[];
        $('.delete_item_check:checkbox:checked').each(function(i){
            id[i] = $(this).val();
            console.log(id[i]);
        });
        if(id.length === 0)
        {
            $(".alert").remove();
            $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một dòng!</div>');
            $("#multi-delete-data").modal('hide');
        }
        else{
            $.ajax({
                method: "POST",
                url: "/user/multidelete",
                data:{
                    "id":id
                },
                success:function(data) {
                    for(var i=0; i<id.length; i++) {
                        $("#row"+id[i]).remove();
                    }
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Xóa người dùng thành công!</div>');
                    $("#multi-delete-data").modal('hide');
                }
            });
        }
    });
</script>