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
        <div class="col-sm-3">
            <ul style="display: flex; list-style: none;" class="crumb">
                <li><a href="/">Trang chủ</a></li>
                <li>Danh sách kiểm kê</li>
            </ul>
        </div>
        <div class="col-sm-6">
            Danh sách kiểm kê
        </div>
        <div class="col-sm-3">
{*            <div class="add-data">*}
{*                <a href="/user/add" class="btn btn-success" style="" class="card-title" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</a>*}
{*                <span style="margin-left: 10px;"><a class="btn btn-danger" data-toggle="modal" data-target="#multi-delete-data" ><i class="fas fa-times"></i> Xóa</a></span>*}
{*            </div>*}
        </div>
    </header>
    <div class="table-agile-info">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
{*                    <th style="width:60px;" class="no-sort">*}
{*                        <input type="checkbox" class="check-control" id="all-checked">*}
{*                    </th>*}
                    <th style="color:black">ID</th>
                    <th style="color:black">Người kiểm kê</th>
                    <th style="color:black">Ngày kiểm kê</th>
                    <th style="color:black">Lưu ý</th>
                    <th style="color:black" class="no-sort">Thao tác</th>
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
                {foreach $inventory_list  as $key=>$value}
                    <tr>
{*                        <td><label class="i-checks m-b-none"><input type="checkbox" class="delete_item_check" value="{$value.user_id}"><i></i></label></td>*}
                        <td style="color:black" >{$value.inventory_id}</td>
                        <td style="color:black" >{$value.user_name}</td>
                        <td style="color:black" >{$value.inventory_date}</td>
                        <td style="color:black" >{$value.note}</td>
                        <td>
                            <a href="/inventory/detail/inventory_id/{$value.inventory_id}"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>


            </table>
        </div>
    </div>
</section>