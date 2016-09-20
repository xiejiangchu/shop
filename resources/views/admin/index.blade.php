@extends('layouts.admin')


@section('header')
    <section class="content-header">
      <h1>
        首页
        <small>综合信息</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.admin')}}"><i class="fa fa-dashboard"></i> 管理系统</a></li>
        <li class="active">首页</li>
      </ol>
    </section>
@stop

@section('content')
<div class="row">
	　<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="info-box bg-red">
		  <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
		  <div class="info-box-content">
		    <span class="info-box-text">订单数</span>
		    <span class="info-box-number">31,310</span>
		    <!-- The progress section is optional -->
		    <div class="progress">
		      <div class="progress-bar" style="width: 70%"></div>
		    </div>
		    <span class="progress-description">
		      70% 30天
		    </span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="info-box bg-yellow">
		  <span class="info-box-icon"><i class="fa fa-cube"></i></span>
		  <div class="info-box-content">
		    <span class="info-box-text">销售额</span>
		    <span class="info-box-number">31,310</span>
		    <!-- The progress section is optional -->
		    <div class="progress">
		      <div class="progress-bar" style="width: 70%"></div>
		    </div>
		    <span class="progress-description">
		      70% 30天
		    </span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="info-box bg-green">
		  <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
		  <div class="info-box-content">
		    <span class="info-box-text">商品总数</span>
		    <span class="info-box-number">41,410</span>
		    <!-- The progress section is optional -->
		    <div class="progress">
		      <div class="progress-bar" style="width: 70%"></div>
		    </div>
		    <span class="progress-description">
		      70% 30天
		    </span>
		  </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	</div>
</div>

@stop
