@extends('layouts.admin')


@section('header')
    <section class="content-header">
      <h1>
          分类管理
        <small> 分类管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active"> 分类管理</li>
      </ol>
    </section>
@stop

@section('content')
 <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">所有分类</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 60px">编号</th>
              <th>名称</th>
              <th>状态</th>
              <th>级别</th>
              <th>更新时间</th>
              <th>操作</th>
            </tr>
             @foreach($paginate as $item)
            <tr class='bg-blue'>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
              {{$item->is_delete?'删除':"正常"}}
              {{$item->is_recommend?'推荐':""}}
              </td>
              <td>{{$item->level}}</td>
              <td>
                {{$item->updated_at}}
              </td>
              <td><i class="fa fa-minus-circle"></i><i class="fa fa-plus-circle"></td>
            </tr>
                 @foreach($item->children as $child)
                  <tr>
                    <td>{{$child->id}}</td>
                    <td>{{$child->name}}</td>
                    <td>
                    {{$child->is_delete?'删除':"正常"}}
                    {{$child->is_recommend?'推荐':""}}
                    </td>
                     <td>{{$child->level}}</td>
                    <td>
                     {{$item->updated_at}}
                    </td>
                    <td><i class="fa fa-minus-circle"></i><i class="fa fa-plus-circle"></i></td>
                  </tr>
                  @endforeach
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
