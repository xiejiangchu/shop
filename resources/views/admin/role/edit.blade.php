@extends('layouts.admin')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('header')
    <section class="content-header">
      <h1>
        修改角色信息
        <small>修改角色信息</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">修改角色信息</li>
      </ol>
    </section>
@stop

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"> 角色</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('admin.role.update',$item->id)}}" method='post'>
        	<input type="hidden" value="{{csrf_token()}}" name="_token">
        	<input type="hidden" value="PUT" name="_method">
          <div class="box-body">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">角色名</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name='name' placeholder="字母或者下划线" value="{{$item->name}}">
              </div>
            </div>
            <div class="form-group">
              <label for="display_name" class="col-sm-2 control-label" >显示名称</label>

              <div class="col-sm-10">
                <input type="text" value="{{$item->display_name}}" class="form-control" id="display_name" name='display_name' placeholder="显示名称">
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="col-sm-2 control-label">描述</label>
               <div class="col-sm-10">
                <textarea class="form-control" rows="3" id='description' name='description'  placeholder="角色描述...">{{$item->description}}</textarea>
              </div>s
            </div>

            <div class="form-group">
              <label for="perms" class="col-sm-2 control-label">权限</label>
               <div class="col-sm-10">
                <select multiple="multiple" class="form-control" name='perms[]' id="perms">
                  <option value='0'>不选择</option>
                  @foreach($permissions as $permission)
                    <option value='{{$permission->id}}' {{$item->hasPermission($permission->name)? 'selected':''}}>{{$permission->display_name}}</option>
                  @endforeach
                </select>
               </div>
            </div>
          </div>
	        <div class="form-group">
	             <label for="inputPassword4" class="col-sm-2 control-label"></label>
	             <div class="col-sm-10">
	             	@if ($errors->has('name'))
		            <span class="help-block text-red">
		                <strong>{{ $errors->first('name') }}</strong>
		            </span>
		        	@endif
	              	@if ($errors->has('mobile'))
		            <span class="help-block text-red">
		                <strong>{{ $errors->first('display_name') }}</strong>
		            </span>
		        	@endif
		         	@if ($errors->has('password'))
		            <span class="help-block text-red">
		                <strong>{{ $errors->first('description') }}</strong>
		            </span>
		            @endif
	             </div>
            </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">修改</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->
    </div>
</div>
@stop
