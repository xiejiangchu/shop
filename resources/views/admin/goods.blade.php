@extends('layouts.admin')


@section('header')
    <section class="content-header">
      <h1>
        商品管理
        <small>商品管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">商品管理</li>
      </ol>
    </section>
@stop

@section('content')
 <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">所有蔬菜</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">编号</th>
              <th style="width: 40px">NO</th>
              <th>名称</th>
              <th>状态</th>
              <th>价格</th>
              <th>库存</th>
              <th style="width: 40px">操作</th>
            </tr>
             @foreach($paginate as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->no}}</td>
              <td>{{$item->name}}</td>
              <td>
              {{$item->is_delete?'删除':""}}
              {{$item->is_online?'正常':"下架"}}
              {{$item->is_active?'热销':""}}
              {{$item->is_rough?'生':"熟"}}
              {{$item->is_promote?'促销':"未促销"}}
              </td>
              <td>{{$item->shop_price}}</td>
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-danger" style="width: {{$item->market_price}}%"></div>
                </div>
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
