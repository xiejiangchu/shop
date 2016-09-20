@extends('layouts.admin')


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
              <th style="width: 10px">编号</th>
              <th>名称</th>
              <th>手机</th>
              <th>邮件</th>
              <th>微信</th>
              <th>状态</th>
              <th>创建时间</th>
              <th>修改时间</th>
              <th style="width: 40px">操作</th>
            </tr>
             @foreach($paginate as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->mobile}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->wx}}</td>
              <td>
              {{$item->status?'正常':"锁定"}}
              {{$item->verified?'未验证':"已验证"}}
              </td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td><span>通过验证</span><span>更改密码</span><span>锁定</span></td>
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
