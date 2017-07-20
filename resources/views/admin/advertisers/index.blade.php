@extends('admin.layouts.app')
@section('pageTitle', 'Advertisers List')
@section('content')
<div class="content-panel">
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th> ID</th>
            <th>买方名称</th>
            <th>买方广告主ID</th>
            <th>广告主名称</th>
            <th>网站名称</th>
            <th>网址</th>
            <th>提交日期</th>
            <th>审核状态</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($advertisers as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->buyer_company }}</td>
                <td>{{ $v->buyer_advertiser_id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->site_name }}</td>
                <td>{{ $v->domain }}</td>
                <td>{{ $v->created_at }}</td>
                <td>
                    @if($v->status == 1)
                        <button type="button" id="Status{{ $v->id }}" class="btn btn-warning btn-xs" onclick="siteAdvertiserId({{ $v->id }});" data-toggle="modal" data-target="#myModal">待审核</button>
                    @elseif($v->status == 2)
                        <button type="button" id="Status{{ $v->id }}" class="btn btn-success btn-xs" onclick="siteAdvertiserId({{ $v->id }});" data-toggle="modal" data-target="#myModal">通过</button>
                    @elseif($v->status == 3)
                        <button type="button" id="Status{{ $v->id }}" class="btn btn-danger btn-xs" onclick="siteAdvertiserId({{ $v->id }});" data-toggle="modal" data-target="#myModal">拒绝</button>
                    @else
                        <button type="button" id="Status{{ $v->id }}" class="btn btn-theme01 btn-xs" onclick="siteAdvertiserId({{ $v->id }});" data-toggle="modal" data-target="#myModal" disabled>停用</button>
                    @endif
                </td>
                <td>
                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#uploadFile" onclick="siteAdvertiserId({{ $v->id }})"><i class="fa fa-check"></i></button>
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <div style="float:right; margin-right:10px;">
                {!! $advertisers->render() !!}
            </div>
        </div>
    </div>

    <input type="hidden" id="AdvertiserId">
    <!-- 审核广告主 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">审核广告主</h4>
                </div>
                <div class="modal-body">
                    设置广告主的审核状态
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="editStatus(2);" data-dismiss="modal">通过</button>
                    <button type="button" class="btn btn-danger" onclick="editStatus(3);" data-dismiss="modal">拒绝</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 上传资质 -->
    <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">上传资质文件</h4>
                </div>
                <div class="modal-body">
                    <form id="UploadFileForm" class="form-horizontal style-form" action="{{ route('advertiserFiles.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="advertiserId" id="FormAdvertiserId">
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">资质文件</label>
                            <div class="col-sm-9">
                                <input type="file" name="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">编号/登记号</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">主体名称</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="UploadFileFormButton" data-dismiss="modal" onclick="submit();">提交</button>
                </div>
            </div>
        </div>
    </div>

</div><!-- /content-panel -->
<script>
    function siteAdvertiserId(id) {
        $('#AdvertiserId').val(id);
    }

    function editStatus(status) {
        var advertiserId = $('#AdvertiserId').val();
        $.post("{{ route('advertiser.editStatus') }}", { '_token': '{{csrf_token()}}', 'status': status, 'advertiserId': advertiserId }, function (data) {
            if (data.status == 0) {
                if (status == 2) {
                    $("#Status"+advertiserId).attr('class', 'btn btn-success btn-xs');
                    $("#Status"+advertiserId).html('通过');
                }else {
                    $("#Status"+advertiserId).attr('class', 'btn btn-danger btn-xs');
                    $("#Status"+advertiserId).html('拒绝');
                }
            }
        });
    }

    function submit() {
        var advertiserId = $('#AdvertiserId').val();
        $('#FormAdvertiserId').val(advertiserId);
        var formData = new FormData($( "#UploadFileForm" )[0]);
        $.ajax({
            url: "{{ route('advertiserFiles.store') }}",
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if(result.status == 0){
                    alert('ok');
                }else {
                    alert(result.msg);
                }
            },
            error: function (returndata) {
                alert(returndata);
            }
        });
    }

    $('#UploadFileFormButton').click(function () {

    })
</script>
@stop
