
@extends('layouts.app')

@section('head_meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
 <div class="bar">
   <div class="weui-row weui-no-gutter">
      <div class="weui-col-20"><a href="javascript:history.back(-1)"><i class="fa fa-angle-left"></i></a></div>
      <div class="weui-col-50">我的地址</div>
      <div class="weui-col-20"><a href="{{route('address.create')}}"><i class="fa fa-plus-square-o"></i></a></div>
    </div>
 </div>

 <div class="address">
   <div class="weui_panel weui_panel_access">
    <div class="weui_panel_bd">
      @foreach($paginate as $key => $item)
        <div class="weui_media_box weui_media_text" edit-url='{{route('address.edit',$item->id)}}' del-url='{{route('address.destroy',$item->id)}}'>
        <h4 class="weui_media_title">
        {{$item->receiver}} <i class="fa fa-phone phone">{{$item->mobile}}</i>
        </h4>
        <p class='weui_media_desc'>{{$item->city.$item->district.$item->road}}</p>
        <p class="weui_media_desc">{{$item->address}}</p>
        <p class="address-default">
          <i class="fa fa-check-square-o {{$item->default?'active':""}}"></i>
        </p>
      </div>
      @endforeach
    </div>
  </div>
 </div>
@stop



@section('init_js')
    <script type="text/javascript" charset="utf-8">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(document).on("click",".address-default",function(){
         $.confirm("您确定把该地址设置为默认地址？", "确认?", function() {
            $.post(del_url, {"_method": 'delete'}, function(data, textStatus, xhr) {
             $(e.currentTarget).remove();
            });
          }, function() {
              //取消操作
          });
      });
       $(document).on("click", ".weui_media_box", function(e) {
          var edit_url = $(e.currentTarget).attr('edit-url');
          var del_url= $(e.currentTarget).attr('del-url');
          $.actions({
              title: "选择操作",
              onClose: function() {},
              actions: [{
                  text: "编辑",
                  className: "color-primary",
                  onClick: function(e) {
                      window.location.href = edit_url;
                  }
              }, {
                  text: "删除",
                  className: 'color-danger',
                  onClick: function() {
                      $.confirm("您确定删除该条记录？", "确认删除?", function() {
                        $.post(del_url, {"_method": 'delete'}, function(data, textStatus, xhr) {
                         $(e.currentTarget).remove();
                        });
                      }, function() {
                          //取消操作
                      });
                  }
              }]
          });
      });
    </script>
@stop
