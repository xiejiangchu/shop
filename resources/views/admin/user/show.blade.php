@extends('layouts.admin')


@section('header')
    <section class="content-header">
      <h1>
        用户详情
        <small>用户详情</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">用户详情</li>
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
            <small class="pull-right">{{$item->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            ID:<strong>{{$item->id}}</strong><br>
            手机号：{{$item->mobile}}<br>
            微信：{{$item->wx}}<br>
            电子邮件: {{$item->email}}<br>
            状态: {{trans('globals.status')[$item->status]}}
          </address>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive">
           <table class="table table-striped">
            <thead>
            <tr>
              <th>角色</th>
              <th>角色名称</th>
              <th>角色权限</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($item->roles as $key => $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->display_name}}</td>
              <td>
                @foreach($item->perms as $perm)
                {{$perm->name}}<br>
                @endforeach
              </td>
              <td>delete</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
@stop
