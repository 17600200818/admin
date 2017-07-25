@extends('admin.layouts.app')
@section('pageTitle', 'Edit Advertiser')
@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <form class="form-horizontal style-form" method="post" action="{{ route('advertisers.update', $advertiser->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">买方名称</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ $buyer->company }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">买方广告主ID</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ $advertiser->buyer_advertiser_id }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">广告主名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" value="{{ $advertiser->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">网站名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_name" class="form-control" value="{{ $advertiser->site_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">网址</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="domain" id="disabledInput" type="text" value="{{ $advertiser->domain }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">通信地址</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" value="{{ $advertiser->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">行业分类</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="form-control" name="category1" id="C1">
                                        @foreach($categoryList['c1'] as $k => $v)
                                            @if($k == $category->c1)
                                                <option value="{{ $k }}" selected>{{ $v }}</option>
                                            @endif
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" name="category2" id="C2">
                                        @foreach($categoryList['c2'] as $k => $v)
                                            @if($k == $category->c2)
                                                <option value="{{ $k }}" selected>{{ $v }}</option>
                                            @endif
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1 col-lg-offset-5">
                            <button type="submit" class="btn btn-theme">提 交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- col-lg-12-->
    </div><!-- /row -->
@stop
@section('script')
<script>
    $(function(){
        $('#C1').change(function () {
            var category1 = $(this).val();
            $.post("{{ route('categories.getCategory2') }}", { '_token': '{{csrf_token()}}', 'category1':  category1}, function (data) {
                var options = '';
                $.each(data, function(idx, obj) {
                    options += '<option value="'+obj.c2+'">'+obj.n2+'</option>'
                });
                $('#C2').empty();
                $('#C2').html(options);
            });
        });
    });
</script>
@stop