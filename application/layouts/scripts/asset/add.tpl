<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Thêm tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/add">
            <div class="form-group">
                <label class="col-sm-3 control-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Mã</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nhóm tài sản</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="asset_group_id">
                        {foreach $menu_list as $key=>$value}
                        <option value="{$value.group_id}">{$value.description}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cấu hình</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="configuration">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Tình trạng</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="status">
                        {foreach $status_list as $key=>$value}
                            <option value="{$value.status_id}">{$value.status_name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="state">
                        {foreach $state_list as $key=>$value}
                            <option value="{$value.state_id}">{$value.state_name}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 48%">Thêm</button>
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
                    if (value.recordFound) {
                        $(this).parent().append('<div class="err_input">' + value.recordFound + '</div>')
                    }
                }
            });
        });
        {/if}
    });
</script>