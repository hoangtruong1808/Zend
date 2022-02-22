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
        <div class="col-sm-4">
            <ul style="display: flex; list-style: none;" class="crumb">
                <li><a href="/">Trang chủ</a></li>
                <li>Quản lý tài sản</li>
            </ul>
        </div>
        <div class="col-sm-4">

            Quản lý tài sản
        </div>
        {if $smarty.session.role_id==2 }
        <div class="col-sm-4">
            <div class="add-data">
                <form method="post" action="/asset/inventory">
                    <span><a style="margin-left: 10px;" class="btn btn-success" class="card-title" data-toggle="modal" data-target="#multi-export-user">Cho mượn</a></span>
                    <span style="margin-left: 10px;">
                        <span><input type="hidden" name="asset_id" id="inventory_asset_id"><span>
                        <span><input type="submit" class="btn btn-primary" value="KIỂM KÊ" id="btn-inventory"><span>
    {*                    <a style="margin-left: 10px;" href="/asset/inventory" class="btn btn-primary" id="btn-inventory">Kiểm kê</a>*}
                    </span>
                    <a style="margin-left: 10px;" href="/asset/add" class="btn btn-success" class="card-title" data-toggle="modal"> Thêm</a>
                    <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" >Xóa</a></span>
                </form>
            </div>
        </div>
        {/if}
    </header>
    <div class="modal fade xoa-modal" id="multi-export-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal bucket-form" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <b style="font-size: 17px">Chọn người dùng</b>
                    </div>
                    <div class="modal-body" style="font-size: 17px; margin-top: 15px; text-align: center">
                        <div style="margin-bottom: 10px">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Họ tên</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="borrow_user_id" id="borrow_user_id">
                                        <option disabled selected value>Nhập người dùng</option>
                                        {foreach $user_list as $key=>$value}
                                            <option value="{$value.user_id}">{$value.name}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Ngày mượn</label>
                                <div class="col-sm-7">
                                    <input class="form-control" type="date" name="borrow_date" id="borrow_date">
                                    <div id="alert" style="color: #ff0000; font-size: 13px; margin:10px; text-align: left"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary"  id="btn_multi_export_user">Chọn</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
            <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                abc
                <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
            </div>
        </div>
    </div>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="width:60px;" class="no-sort">
                        <input type="checkbox" class="check-control" id="all-checked">
                    </th>
                    <th style="color:black">Tên</th>
                    <th style="color:black">Mã</th>
                    <th style="color:black">Cấu hình</th>
                    <th style="color:black">Tình trạng</th>
                    <th style="color:black">Trạng thái</th>
                    <th style="color:black" class="no-sort">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <div id="message">
                    {if isset($flashmessage)}
                        {$alert = $flashmessage[0]["alert"]}
                    {/if}
                    {if isset($message)}
                    <div class="alert alert-success">{$message}</div>
                    {/if}
                    {if isset($alert)}
                        <div class="alert alert-danger">{$alert}
                        </div>
                    {/if}
                </div>
                {foreach $asset_list  as $key=>$value}
                    <tr id="row{$value.asset_id}">
                        <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="{$value.asset_id}" data-state={$value.state_id} data-status={$value.status_id}><i></i></label></td>
                        <td style="color:black" >{$value.name}</td>
                        <td style="color:black" >{$value.code}</td>
                        <td style="color:black" >{$value.configuration}</td>
                        <td style="color:black" >
                            <span class="badge badge-{($value.status_id==1)?'success':(($value.status_id==2)?'warning':'danger')}">{$value.status_name}</span>

                        </td>
                        <td style="color:black" >
                            <span class="badge badge-{($value.state_id==2)?'success':(($value.state_id==1)?'warning':'danger')}" id="state_asset{$value.asset_id}">{$value.state_name}</span>
                        </td>
                        <td>
                            <a href="/asset/detail/id/{$value.asset_id}" style="margin-right: 20px"><i class="fas fa-eye"></i></a>
                            {if $smarty.session.role_id==2 }
                            <a href="/asset/update/id/{$value.asset_id}"  style="margin-right: 20px"><i class="fas fa-pen"></i></a>
                            <button class="delete-button" data-toggle="modal" data-target="#delete-data" data-id="{$value.asset_id}"><i class="fas fa-trash-alt"></i></button>
                            {/if}
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
                                <a class="btn btn-primary" id="btn_multi_delete">Xóa</a>
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
            url: "/asset/delete",
            data:{
                "id":delete_id
            },
            success:function(data) {
                if (typeof(data.error_input) != "undefined" && data.error_input_export !== null)
                {
                    $(".xoa-modal").modal('hide');
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-danger">Xóa tài sản không thành công!</div>');
                }
                else {
                    $(".xoa-modal").modal('hide');
                    $("#row" + delete_id).remove();
                    $(".alert").remove();
                    $("#message").append('<div class="alert alert-success">Xóa tài sản thành công!</div>');
                }
            }
        });
    });
    //xóa nhiều dữ liệu
    $("#btn_multi_delete").click(function(){
        var id =[];
        var state=[];
        $('.delete_item_check:checkbox:checked').each(function(i){
            id[i] = $(this).val();
            state[i] = $(this).attr("data-state");
            console.log(id[i]);
        });
        if(jQuery.inArray("1", state)!== -1){
            $(".alert").remove();
            $("#fail-alert").remove();
            $("#export-user").modal('hide');
            $("#message").append('<div class="alert alert-danger" id="fail-alert">Xóa tài sản không thành công!</div>');
            $("#multi-delete-data").modal('hide');
        }
        else {
            if (id.length === 0) {
                $(".alert").remove();
                $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một dòng!</div>');
                $("#multi-delete-data").modal('hide');
            } else {
                $.ajax({
                    method: "POST",
                    url: "/asset/multidelete",
                    data: {
                        "id": id
                    },
                    success: function (data) {
                        for (var i = 0; i < id.length; i++) {
                            $("#row" + id[i]).remove();
                        }
                        $(".alert").remove();
                        $("#message").append('<div class="alert alert-success">Xóa tài sản thành công!</div>');
                        $("#multi-delete-data").modal('hide');
                    }
                });
            }
        }
    });
    //xuất người dùng nhiều tài sản
    function callback(){
        alert("Kết thúc quá trình.");
    }

    $("#btn_multi_export_user").click(function(){

        var borrow_user_id = $("#borrow_user_id").val();
        var borrow_date = $("#borrow_date").val();
        var id =[];
        var state=[];
        var status=[];
        $('.delete_item_check:checkbox:checked').each(function(i){
            id[i] = $(this).val();
            state[i] = $(this).attr("data-state");
            status[i] = $(this).attr("data-status")
            console.log(state[i])
        });
        if(jQuery.inArray("1", state)!== -1 || jQuery.inArray("5", state)!== -1 || jQuery.inArray("2", status)!== -1 || jQuery.inArray("3", status)!== -1){
            $("#fail-alert").remove();
            $("#export-user").modal('hide');
            $(".alert").remove();
            $("#message").append('<div class="alert alert-danger" id="fail-alert">Tài sản này không thể xuất cho người dùng!</div>');
            $("#multi-export-user").modal('hide');
        }
        else {
            if(id.length === 0)
            {
                $(".alert").remove();
                $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một dòng!</div>');
                $("#multi-export-user").modal('hide');
            }
            else{
                $.ajax({
                    method: "POST",
                    url: "/asset/borrow",
                    data:{
                        "id":id,
                        'borrow_user_id':borrow_user_id,
                        'borrow_date': borrow_date,
                    },
                    success:function(data) {
                        console.log(data.error_input);
                        if (typeof(data.error_input) != "undefined" && data.error_input_export !== null)
                        {
                            console.log(data.error_input);
                            $("#alert").html(data.error_input);
                        }
                        else {
                            $(".alert").remove();
                            $("#message").append('<div class="alert alert-success">Xuất tài sản cho người dùng thành công!</div>');
                            for(var i=0; i<id.length; i++) {
                                console.log("#state_asset"+id);
                                $("#state_asset"+id[i]).attr('class', 'badge badge-warning');
                                $("#state_asset"+id[i]).html('Đang sử dụng');
                            }
                            $("#multi-export-user").modal('hide');
                        }
                    }
                });
            }
        }

    });
    //lấy id cho form kiểm kê
    $("#btn-inventory").click(function() {
        var asset_id=[];
        $('.delete_item_check:checkbox:checked').each(function (i) {
            console.log(asset_id[i] = $(this).val());
        });

        $("#inventory_asset_id").val(asset_id);
    });
    $('#example').DataTable({
        "columnDefs": [ {
            "targets": 'no-sort',
            "orderable": false,
        } ],
        order: [[ 5, 'asc' ]],
        "bDestroy": true,
        "iDisplayLength": 25,
        "bLengthChange": false,
    });
</script>
