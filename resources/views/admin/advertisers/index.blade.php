@extends('admin.layouts.app')
@section('pageTitle', 'Advertisers List')
@section('content')
<div class="content-panel">
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th> ID</th>
            <th></i>买方名称</th>
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
                <td>{{ $v->name }}</td>
                <td>{{ $v->buyer_advertiser_id }}</td>
                <td>{{ $v->buyer_id }}</td>
                <td>{{ $v->site_name }}</td>
                <td>{{ $v->domain }}</td>
                <td>{{ $v->created_at }}</td>
                <td><span class="label label-success label-mini">{{ $v->status }}</span></td>
                <td>
                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
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
</div><!-- /content-panel -->
@stop
