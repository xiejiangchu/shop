@extends('layouts.app')

@section('content')
<div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
    <div class="swiper-slide"><img src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
  </div>
   <div class="swiper-pagination"></div>
</div>

<div class="bd">
        <div class="weui_cells_title">带说明的列表项</div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>标题文字</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </div>
        </div>
        <div class="weui_cells_title">带图标、说明的列表项</div>
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" width="20"></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>标题文字</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </div>
            <div class="weui_cell">
                <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" width="20"></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>标题文字</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </div>
        </div>
        <div class="weui_cells_title">带跳转的列表项</div>
        <div class="weui_cells weui_cells_access">
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
        </div>
        <div class="weui_cells_title">带说明、跳转的列表项</div>
        <div class="weui_cells weui_cells_access">
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </a>
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </a>
        </div>
        <div class="weui_cells_title">带图标、说明、跳转的列表项</div>
        <div class="weui_cells weui_cells_access">
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" width="20"></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </a>
            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" width="20"></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">说明文字</div>
            </a>
        </div>
        <div class="weui_cells_title">单选列表项</div>
        <div class="weui_cells weui_cells_radio">
            <label class="weui_cell weui_check_label" for="x11">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">
                    <input type="radio" class="weui_check" name="radio1" id="x11">
                    <span class="weui_icon_checked"></span>
                </div>
            </label>
            <label class="weui_cell weui_check_label" for="x12">
                <div class="weui_cell_bd weui_cell_primary">
                    <p>cell standard</p>
                </div>
                <div class="weui_cell_ft">
                    <input type="radio" name="radio1" class="weui_check" id="x12" checked="checked">
                    <span class="weui_icon_checked"></span>
                </div>
            </label>
        </div>
        <div class="weui_cells_title">复选列表项</div>
        <div class="weui_cells weui_cells_checkbox">
            <label class="weui_cell weui_check_label" for="s11">
                <div class="weui_cell_hd">
                    <input type="checkbox" class="weui_check" name="checkbox1" id="s11" checked="checked">
                    <i class="weui_icon_checked"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>standard is dealt for u.</p>
                </div>
            </label>
            <label class="weui_cell weui_check_label" for="s12">
                <div class="weui_cell_hd">
                    <input type="checkbox" name="checkbox1" class="weui_check" id="s12">
                    <i class="weui_icon_checked"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>standard is dealicient for u.</p>
                </div>
            </label>
        </div>
    </div>
@endsection

@section('footer')
<div class="weui_tabbar" style="position:fixed;bottom:0;">
    <a href="javascript:;" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_button.png" alt="">
      </div>
      <p class="weui_tabbar_label">首页</p>
    </a>
    <a href="javascript:;" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_msg.png" alt="">
      </div>
      <p class="weui_tabbar_label">订单</p>
    </a>
    <a href="javascript:;" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="./images/icon_nav_cell.png" alt="">
      </div>
      <p class="weui_tabbar_label">我</p>
    </a>
  </div>
@stop

@section('init_js')
    <script type="text/javascript" charset="utf-8">
          $(".swiper-container").swiper({
            loop: true,
            autoplay: 3000
          });
    </script>
@stop
