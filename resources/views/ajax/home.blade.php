@if(!$paginate->isEmpty())
 @foreach($paginate as $index => $good)
 <div class="weui-row weui-no-gutter">
    <div class="good_item" >
        <div class="weui_panel weui_panel_access">
            <div class="weui_panel_bd">
                <div class="weui_media_box weui_media_appmsg">
                    <div class="weui_media_hd">
                        <img class="weui_media_appmsg_thumb" src="{!! $good->src !!}" alt="{!!$good->name!!}">
                    </div>
                    <div class="weui_media_bd">
                        <h4 class="weui_media_title">{!!$good->name!!} <span class="summary">{{$good->summary}}</span></h4>
                        <p class="weui_media_desc">
                        <span class='market-price'>{!!$good->market_price!!}</span>
                        <span class='shop-price'>{!!$good->shop_price!!}</span>
                        {!!$good->unit!!} </p>
                         <p class="weui_media_desc summary">月销量:{!!$good->sale_num!!}</p>
                    </div>
                    <div class="cart">
                      <i class="cart_sub fa fa-minus-circle color-error" gid='{{$good->id}}'></i>
                      <span id='goods_{{$good->id}}'>0</span>
                      <i class="cart_add fa fa-plus-circle color-primary" gid='{{$good->id}}'></i>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="message" value='none'><span class="none"><i class="fa fa-none">没有商品</i></span></div>
@endif
