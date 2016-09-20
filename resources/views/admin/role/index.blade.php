@extends('layouts.admin')


@section('header')
    <section class="content-header">
      <h1>
        角色管理
        <small>角色管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">角色管理</li>
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
              <th>显示名称</th>
              <th>描述</th>
              <th>修改时间</th>
              <th>操作</th>
            </tr>
             @foreach($paginate as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->display_name}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->updated_at}}</td>
              </td>
              <td><span class="badge bg-red">55%</span></td>
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