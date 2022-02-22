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
                <li><a href="/inventory">Danh sách kiểm kê</a></li>
                <li>Chi tiết kiểm kê</li>
            </ul>
        </div>
        <div class="col-sm-4">
            Chi tiết kiểm kê
        </div>
        <div class="col-sm-4">
            <a href="/inventory/export-excel/inventory_id/{$inventory.inventory_id}" class="btn btn-success">Xuất excel</a>
        </div>
        {*        <div class="col-sm-2">*}
        {*            <div class="add-data">*}
        {*                <a href="/user/add" class="btn btn-success" style="" class="card-title" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>*}
        {*                <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" ><i class="fas fa-times"></i> Xóa</a></span>*}
        {*            </div>*}
        {*        </div>*}
    </header>
    <div class="table-agile-info">
        <div class="form-horizontal bucket-form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Mã kiểm kê</label>
                <div class="col-sm-6">
                    <div class="form-control">
                        {$inventory.inventory_code}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Người kiểm kê</label>
                <div class="col-sm-6">
                    <div class="form-control">
                        {$inventory.user_name}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ngày kiểm kê</label>
                <div class="col-sm-6">
                    <div type="date" class="form-control">{$inventory.inventory_date}</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ghi chú</label>
                <div class="col-sm-6">
                    <div class="form-control" name="inventory_note">{$inventory.note}</div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%" id="example">
                <thead>
                    <tr>
                        {*                            <input type="checkbox" class="check-control" id="all-checked">*}
                        {*                        <th style="width:60px;" class="no-sort">*}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             {*                        </th>*}
                        <th style="color:black">STT</th>
                        <th style="color:black">Tên tài sản</th>
                        <th style="color:black">Tình trạng trước kiểm kê</th>
                        <th style="color:black">Tình trạng kiểm kê</th>
                        <th style="color:black">Lưu ý</th>
                    </tr>
                </thead>
                <tbody>
                    <div id="message">
                        {if isset($message)}
                            <div class="alert alert-success">{$message}</div>
                        {/if}
                        {if isset($alert)}
                            <div class="alert alert-danger">{$alert}</div>
                        {/if}
                    </div>
                    {foreach $inventory_detail as $key=>$value}
                    <tr>
                        {*                    <th style="width:60px;" class="no-sort">*}
                        {*                        <input type="checkbox" class="check-control" id="all-checked">*}
                        {*                    </th>*}
                        <td style="color:black">{$stt++}</td>
                        <td style="color:black">{$value.asset_name}</td>
                        <td style="color:black">{$value.before_status_name}</td>
                        <td style="color:black">{$value.inventory_status_name}</td>
                        <td style="color:black">{$value.note}</td>
                    </tr>
                    {/foreach}
                </tbody>


            </table>
        </div>
    </div>
</section>
<script>

</script>
