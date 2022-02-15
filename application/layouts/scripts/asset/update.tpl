<style>
    #image-area {
        position: relative;
        width: 100%;
        height: 100%;
        margin-left: 26%;
    }
    #image-area img{
        margin-top: 10px; ;
    }
    #remove-image-btn{
        position: absolute;
        top: 0%;
        left: 95%;
        transform: translate(-100%, -200%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 11px;
        padding: 1px 4px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
<section>
    <header class="panel-heading">
        <div class="col-sm-12">
            Cập nhật tài sản
        </div>
    </header>
    <div class="table-agile-info">

        <form class="form-horizontal bucket-form" method="POST" action="/asset/update/id/{{$asset.asset_id}}" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Tên</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="{{$asset.name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label required-label">Mã</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="{{$asset.code}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Nhóm tài sản</label>
                <div class="col-sm-6">
                    <select class="form-control m-bot15" name="asset_group_id">
                        {foreach $menu_list as $key=>$value}
                            <option value="{$value.group_id}" {($value.group_id==$asset.asset_group_id)?'selected="selected"':""}>{$value.description}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Cấu hình</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="configuration"  value="{{$asset.configuration}}">
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
                <div class="row">
                    <label class="col-sm-3 control-label required-label">Hình ảnh</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" id="imgInp" name="image" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>
                <div class="row">
                    <span id="image-area">
                        <img src="/images/asset_images/{$asset.image}" id="blah" width="150px" height="120px">
                        <div id="remove-image-btn"><i class="fas fa-times"></i></div>
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-left: 47%">Cập nhật</button>
        </form>
    </div>

</section>

<script>
    $(document).ready(function() {

        function RemoveImageClick(){
            $('#remove-image-btn').click(function() {
                $('#image-area img').remove();
                $('#remove-image-btn').remove();
                $('#imgInp').val('');
            });
        }

        RemoveImageClick();

        $('#imgInp').change(function(){
            $('.err_input').remove();
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-area img').remove();
                    $('#remove-image-btn').remove();
                    $('#image-area').append('<img src="' + e.target.result +'" id="blah" width="150px" height="120px">' + '<div href="" id="remove-image-btn"><i class="fas fa-times"></i></div>');
                    RemoveImageClick()
                }

                reader.readAsDataURL(this.files[0]);
            }
        });


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
                    if (value.fileSizeTooBig) {
                        $(this).parent().append('<div class="err_input">' + value.fileSizeTooBig + '</div>')
                    }
                    if (value.fileUploadErrorNoFile) {
                        $(this).parent().append('<div class="err_input">' + value.fileUploadErrorNoFile + '</div>')
                    }
                }
            });
        });
        {/if}

    });
</script>

