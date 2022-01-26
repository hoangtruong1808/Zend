<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Cập nhật tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/update/id/{{$asset.asset_id}}">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên123</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{$asset.name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mã</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="{{$asset.code}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nhóm tài sản</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="asset_group_id">
                        {foreach $menu_list as $key=>$value}
                            <option value="{$value.group_id}"  {($value.group_id==$asset.asset_group_id)?'selected="selected"':""}>{$value.description}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cấu hình</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="configuration" value="{{$asset.configuration}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tình trạng</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="status">
                        {foreach $status_list as $key=>$value}
                            <option value="{$value.status_id}" {($value.status_id==$asset.status)?'selected="selected"':""}>{$value.status_name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="state">
                        {foreach $state_list as $key=>$value}
                            <option value="{$value.state_id}"  {($value.state_id==$asset.state)?'selected="selected"':""}>{$value.state_name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 47%">Cập nhật</button>
        </form>
    </div>

</section>

<script>
    $(document).ready(function() {
        {if isset($error_input)}
        var err_input = {$error_input|json_encode};
        console.log(err_input);
        $.each( err_input, function(key, value) {
            $('.form-control').each(function () {
                if ($(this).prop('name') == key) {
                    if (value.isEmpty){
                        $(this).parent().append('<div class="err_input">'+value.isEmpty+'</div>');
                    }
                    if (value.stringLengthTooLong) {
                        $(this).parent().append('<div class="err_input">' + value.stringLengthTooLong + '</div>')
                    }
                    if (value.stringLengthTooShort) {
                        $(this).parent().append('<div class="err_input">' + value.stringLengthTooShort + '</div>')
                    }
                }
            });
        });
        {/if}
    });
</script>