
@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
 <div class="bar">
   <div class="weui-row weui-no-gutter">
      <div class="weui-col-20"><i class="fa fa-arrow-left"></i></div>
      <div class="weui-col-50">我的地址</div>
      <div class="weui-col-20"><a href="{{route('address.create')}}"><i class="fa fa-plus"></i></a></div>
    </div>
 </div>

 <div class="address">
   <div class="weui_panel weui_panel_access">
    <div class="weui_panel_bd">
      <div class="weui_media_box weui_media_text">
        <h4 class="weui_media_title">标题一</h4>
        <p class="weui_media_desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
      </div>
      <div class="weui_media_box weui_media_text">
        <h4 class="weui_media_title">标题二</h4>
        <p class="weui_media_desc">由各种物质组成的巨型球状天体，叫做星球。星球有一定的形状，有自己的运行轨道。</p>
      </div>
    </div>
  </div>
 </div>
@stop



@section('init_js')
    <script type="text/javascript" charset="utf-8">
       $(document).on("click", ".weui_media_box", function() {
        $.actions({
          title: "选择操作",
          onClose: function() {
            console.log("close");
          },
          actions: [
            {
              text: "编辑",
              className: "color-primary",
              onClick: function() {
                $.alert("你选择了“编辑”");
              }
            },
            {
              text: "删除",
              className: 'color-danger',
              onClick: function() {
                $.alert("你选择了“删除”");
              }
            }
          ]
        });
      });
    </script>
@stop
