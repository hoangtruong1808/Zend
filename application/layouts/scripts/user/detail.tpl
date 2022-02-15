<section>
    <header class="panel-heading">
        <div class="col-sm-9">
            Chi tiết người dùng
        </div>
        <div class="col-sm-3">
            <span><a href="/user/update/id/{$user.user_id}" class="btn btn-primary" class="card-title" data-toggle="modal">Sửa</a></span>
            <span><a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete-data">Xóa</a></span>
            <span><a class="btn btn-success" class="card-title" id="return-asset-btn">Trả tài sản</a></span>
        </div>
    </header>
    {*form delete*}
    <div class="modal fade xoa-modal" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b style="font-size: 17px">Xác nhận</b>
                </div>
                <div class="modal-body" style="font-size: 17px; margin-top: 15px; margin-bottom: 30px; text-align: center">
                    <div style="margin-bottom: 10px"><i class="fas fa-exclamation-triangle" ></i> Bạn có chắc muốn xóa người dùng này?</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a href="/user/delete/id/{$user.user_id}" class="btn btn-primary delete">Xóa</a>
                </div>
            </div>
        </div>
        <div class="card bg-success text-white shadow" style="display: none; position: fixed; bottom: 10px; left: 10px; border: none" id="xoahs_thanhcong">
            <div class="card-body" style="align-items: center; display: flex; padding: 1rem">
                <i class="fas fa-check-circle fa-2x" style="color: white; margin-right: 5px"></i>
            </div>
        </div>
    </div>
    <div class="table-agile-info">
        <div id="message">
            {if isset($message)}
                <div class="alert alert-success">{$message}</div>
            {/if}
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 gallery-grids-left">
                <div class="gallery-grid">
                    <img src="/images/user_images/{$user.image}" alt="" />
                </div>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-8 stats-info margin-box" >
                <div class="stats-info-agileits">
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Họ tên</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$user.name}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Số điện thoại</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$user.phone}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Email</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$user.email}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group has-success">
                                    <label class="col-lg-5 control-label">Vai trò</label>
                                    <div class="col-lg-7 input-summary-info">
                                        <div class="form-control">{$user.user_role}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <table class="table stats-table tbl-detail">
                    <thead>
                    <tr>
                        <th colspan='3' style="text-align: center; font-size: 18px; color:#696969">Tài sản đang sử dụng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th style="width:60px;" class="no-sort">
                            <input type="checkbox" class="check-control" id="all-checked">
                        </th>
                        <th style="text-align:center">Tài sản</th>
                        <th style="text-align:center">Ngày mượn</th>

                    </tr>
                    {foreach $all_borrow_asset as $key=>$value }
                        <tr id="row{$value.borrow_id}">
                            <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="{$value.borrow_id}" data-id="{$value.asset_id}" ><i></i></label></td>
                            <td style="text-align:center">{$value.borrow_asset_name}</td>
                            <td style="text-align:center">{$value.borrow_date}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</section>
<script>
    //trả tài sản
    $("#return-asset-btn").click(function(){
        var borrow_id =[];
        var asset_id = [];
        $('.delete_item_check:checkbox:checked').each(function(i){
            borrow_id[i] = $(this).val();
            asset_id[i] = $(this).data("id");
        });

        if(borrow_id.length === 0)
        {
            $(".alert").remove();
            $("#message").append('<div class="alert alert-danger">Chọn tối thiểu một tài sản!</div>');
            $("#multi-delete-data").modal('hide');
        }
        else{
            $.ajax({
                method: "POST",
                url: "/user/return-asset",
                data:{
                "borrow_id":borrow_id,
                "asset_id":asset_id,

            },
            success:function(data) {
                for(var i=0; i<borrow_id.length; i++) {
                    $("#row"+borrow_id[i]).remove();
                }
                $(".alert").remove();
                $("#message").append('<div class="alert alert-success">Trả tài sản thành công!</div>');
                console.log("#borrow"+borrow_id[i]);
                $("#multi-delete-data").modal('hide');
                $('#all-checked').prop('checked', false);
            }
        });
    }
    })
</script>
