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
                              <h4 class="weui_media_title">{!!$good->name!!}</h4>
                              <p class="weui_media_desc">
                              <span class='market-price'>{!!$good->market_price!!}</span>
                              <span class='shop-price'>{!!$good->shop_price!!}</span>
                              {!!'元/'.$good->unit!!} </p>
                               <p class="weui_media_desc summary">月销量:{!!$good->sale_amount!!}</p>
                              <p class="weui_media_desc summary">{!!$good->summary!!}</p>
                          </div>
                          <div class="cart">
                            <a href="">+</a>
                            <span>0</span>
                            <a href="">-</a>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
      @else
      <p class="append">没有结果</p>
      @endif
      @if($paginate->hasMorePages())
      <div class="weui-infinite-scroll">
        <div class="infinite-preloader"></div>
        正在加载
      </div>
      @endif
