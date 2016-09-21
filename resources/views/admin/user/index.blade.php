@extends('layouts.admin')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop


@section('header')
    <section class="content-header">
      <h1>
        用户管理
        <small>用户管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">用户管理</li>
      </ol>
    </section>
@stop

@section('content')
 <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">所有用户</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th>编号</th>
              <th>名称</th>
              <th>手机</th>
              <th>邮件</th>
              <th>微信</th>
              <th>状态</th>
              <th>创建时间</th>
              <th>修改时间</th>
              <th>操作</th>
            </tr>
             @foreach($paginate as $item)
            <tr>
              <td class='text-bold'>{{$item->id}}</td>
              <td class='text-bold'>{{$item->name}}</td>
              <td>{{$item->mobile}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->wx}}</td>
              <td>
                <span class='{{$item->lock?'text-red':"text-green"}}'>{{$item->lock?'锁定':"正常"}}</span>
                <span class='{{$item->verified?'text-green':"text-red"}}'>{{$item->verified?'已验证':"未验证"}}</span>
              </td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                 <a href="javascrtpt:;" class='lock' url="{{route('admin.user.lock',$item->id)}}"><i class="fa {{$item->lock? 'fa-unlock-alt text-green':'fa-lock text-red'}}"></i></a>
                <a href="javascrtpt:;" class='verified' url='{{route('admin.user.verified',$item->id)}}'><i class="fa {{!$item->verified? 'fa-check-square-o text-green':'fa-close text-red'}}"></i></a>
                <a href="{{route('admin.user.edit',$item->id)}}"><i class="fa fa-edit text-green"></i></a>
                <a href="{{route('admin.user.show',$item->id)}}"><i class="fa fa-info-circle text-black"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>


        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            {{$paginate->render()}}
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
@stop

@section('init_js')
  <script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.verified', function(event) {
      var url=$(event.target).parent('a').attr('url');
      $.post(url, {}, function(data, textStatus, xhr) {

      });
    });

     $(document).on('click', '.lock', function(event) {
      var url=$(event.target).parent('a').attr('url');
      $.post(url, {}, function(data, textStatus, xhr) {
        $.toast("操作成功");
      });
    });
     $(document).on('click', '.destroy', function(event) {
      var url=$(event.target).parent('a').attr('url');
       $.ajax({
            'url': url,
            'type': 'delete',
            'dataType': 'json',
            'data': {},
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });
  </script>
@stop
