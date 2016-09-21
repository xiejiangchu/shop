@extends('layouts.admin')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('header')
    <section class="content-header">
      <h1>
        修改用户信息
        <small>修改用户信息</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">修改用户信息</li>
      </ol>
    </section>
@stop

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"> 用户</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('admin.user.update',$item->id)}}" method='post'>
        	<input type="hidden" value="{{csrf_token()}}" name="_token">
        	<input type="hidden" value="PUT" name="_method">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail1" class="col-sm-2 control-label">用户名</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail1" name='name' placeholder="字母或者下划线" value="{{$item->name}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail2" class="col-sm-2 control-label" >手机号</label>

              <div class="col-sm-10">
                <input type="text" value="{{$item->mobile}}" class="form-control" id="inputEmail2" name='mobile' placeholder="手机号">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">密码</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name='password' placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword4" class="col-sm-2 control-label">角色</label>
               <div class="col-sm-10">
	              <select multiple="multiple" class="form-control" name='roles[]' id="inputPassword4">
	              	@foreach($roles as $role)
	                	<option value='{{$role->id}}' {{$item->hasRole($role->name)? 'selected':''}}>{{$role->display_name}}</option>
	               	@endforeach
	              </select>
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
		                <strong>{{ $errors->first('mobile') }}</strong>
		            </span>
		        	@endif
		         	@if ($errors->has('password'))
		            <span class="help-block text-red">
		                <strong>{{ $errors->first('password') }}</strong>
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
