@extends('layouts.admin')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('header')
    <section class="content-header">
      <h1>
        角色详情
        <small>角色详情</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">角色详情</li>
      </ol>
    </section>
@stop

@section('content')
  <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{$item->name}}
            <small class="pull-right">{{$item->display_name}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            角色名称:{{$item->name}}<br>
            角色显示名称:{{$item->display_name}}<br>
            角色描述:<strong>{{$item->description}}</strong><br>
          </address>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive">
           <table class="table table-striped">
            <thead>
            <tr>
              <th>拥有权限</th>
              <th>权限名称</th>
              <th>权限描述</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($item->perms as $key => $perm)
            <tr>
              <td>{{$perm->name}}</td>
              <td>{{$perm->display_name}}</td>
              <td>{{$perm->description}}</td>
              <td>
                 <a href="{{route('admin.role.edit',$item->id)}}"><i class="fa fa-edit text-green"></i></a>
                 <a href="{{route('admin.role.show',$item->id)}}"><i class="fa fa-info-circle text-black"></i></a>
                 <a href="javascrtpt:;" class='lock' url="{{route('admin.role.destroy',$item->id)}}"><i class="fa fa-remove text-red"></i></a>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </section>
@stop
