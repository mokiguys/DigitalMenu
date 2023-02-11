@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Shop detail | Minemenu</title>
@endsection
@section('main')

    <!-- header top bar -->
    <section class="header_top_bar">
        <div class="header_topbar_inner">
            <div class="header_topbar_item">
                <a href="#GPS-shop-content">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show compass_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_routing")</div>
                </a>
            </div>
            <div class="header_topbar_item">
                <a href="#contact_us">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show call_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_contact")</div>
                </a>
            </div>
            <div class="header_topbar_item">
                <a href="#send_message">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show at_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_message")</div>
                </a>
            </div>
            <div class="header_topbar_item">
                <a href="#video">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show video_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_video")</div>
                </a>
            </div>
            <div class="header_topbar_item">
                <a href="#social_box">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show share_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_share")</div>
                </a>
            </div>
            <div class="header_topbar_item hidden">
                <a href="#scoring">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show reviews_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_rating")</div>
                </a>
            </div>
            <div class="header_topbar_item">
                <a href="#menu">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show menu_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_menu")</div>
                </a>
            </div>
            <div class="header_topbar_item hidden">
                <a href="#map">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show map_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_map")</div>
                </a>
            </div>
            <div class="header_topbar_item hidden">
                <a href="#clock_close">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show clock_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_work_hours")</div>
                </a>
            </div>
            <div class="header_topbar_item more_item">
                <a href="#">
                    <div class="header_topbar_item_icon">
                        <div class="icon_show plus_icon"></div>
                    </div>
                    <div class="header_topbar_title">@lang("text.detail_more")</div>
                </a>
            </div>
        </div>
    </section>
    <!-- app Slider section-->
    <section class="slider_section">
        <div class="header_slider">
            <div class="text_shop">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="#">
                                <div class="type_shop">{{$data['shop'][0]->CategoryStore[app()->getLocale()]}}</div>
                            </a>
                            <div class="title_shop">
                                <h1>{{$data['shop'][0][app()->getLocale()]}}</h1>
                            </div>
                            <div class="description_shop">
                                <span>{{$data['shop'][0]['subtitle_'.app()->getLocale()]}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slides">
            <div class="container_slide">
                @if($data['shop'][0]->gallery_image1 != null && $data['shop'][0]->gallery_image1 != 'null')
                    <div class="slider_item">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->gallery_image1)}}"
                             alt="{{$data['shop'][0]->fa}}">
                    </div>
                @endif
                @if($data['shop'][0]->gallery_image2 != null && $data['shop'][0]->gallery_image2 != 'null')
                    <div class="slider_item">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->gallery_image2)}}"
                             alt="{{$data['shop'][0]->fa}}">
                    </div>
                @endif
                @if($data['shop'][0]->gallery_image3 != null && $data['shop'][0]->gallery_image3 != 'null')
                    <div class="slider_item">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->gallery_image3)}}"
                             alt="{{$data['shop'][0]->fa}}">
                    </div>
                @endif
                @if($data['shop'][0]->gallery_image4 != null && $data['shop'][0]->gallery_image4 != 'null')
                    <div class="slider_item">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->gallery_image4)}}"
                             alt="{{$data['shop'][0]->fa}}">
                    </div>
                @endif
                @if($data['shop'][0]->gallery_image5 != null && $data['shop'][0]->gallery_image5 != 'null')
                    <div class="slider_item">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->gallery_image5)}}"
                             alt="{{$data['shop'][0]->fa}}">
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- app main -->
    <section class="main_detail_section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="description_shop_holder">
                        <div class="tagline_wrapper">
                            <div class="tagline_inner">
                                <div class="tagline_category_icon">
                                    <div class="tagline_ctaegory_link_wrapper">
                                        <a href="#">
                                            <div class="category-icon-wrapper">
                                                <div class="category-icon-box"
                                                     style="background-color: rgb(179,29,69);"></div>
                                                <span>
                                                        <i class="fad {{$data['shop'][0]->CategoryStore['icon']}}"></i>
                                                    </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <h3>{{$data['shop'][0]['subtitle_'.app()->getLocale()]}}</h3>
                            </div>
                        </div>
                        {{--                        <div class="row text-center">--}}
                        {{--                            <div class="col-12">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    <div class="col-12 ">--}}
                        {{--                                        <div class="title_populr">--}}
                        {{--                                            <p>--}}
                        {{--                                                محبوبترین ها--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="food_slider">--}}
                        {{--                                            <div class="col-6">--}}
                        {{--                                                <a href="#">--}}
                        {{--                                                    <div class="image_food"--}}
                        {{--                                                         style="background-image: url({{asset('site/images/food.jpg')}});">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="content">--}}
                        {{--                                                        <span>کباب بره با فلان مخلفات</span>--}}
                        {{--                                                        <div class="dis-flex">--}}
                        {{--                                                            <span class="discount">33000 تومان</span>--}}
                        {{--                                                            <span class="after_discount">25,000 تومان</span>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </a>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-6">--}}
                        {{--                                                <a href="#">--}}
                        {{--                                                    <div class="image_food"--}}
                        {{--                                                         style="background-image: url({{asset('site/images/food.jpg')}});">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="content">--}}
                        {{--                                                        <span>کباب بره با فلان مخلفات</span>--}}
                        {{--                                                        <div class="dis-flex">--}}
                        {{--                                                            <span class="discount">33000 تومان</span>--}}
                        {{--                                                            <span class="after_discount">25,000 تومان</span>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </a>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-6">--}}
                        {{--                                                <a href="#">--}}
                        {{--                                                    <div class="image_food"--}}
                        {{--                                                         style="background-image: url({{asset('site/images/food.jpg')}});">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="content">--}}
                        {{--                                                        <span>کباب بره با فلان مخلفات</span>--}}
                        {{--                                                        <div class="dis-flex">--}}
                        {{--                                                            <span class="discount">33000 تومان</span>--}}
                        {{--                                                            <span class="after_discount">25,000 تومان</span>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </a>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="col-6">--}}
                        {{--                                                <a href="#">--}}
                        {{--                                                    <div class="image_food"--}}
                        {{--                                                         style="background-image: url({{asset('site/images/food.jpg')}});">--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <div class="content">--}}
                        {{--                                                        <span>کباب بره با فلان مخلفات</span>--}}
                        {{--                                                        <div class="dis-flex">--}}
                        {{--                                                            <span class="discount">33000 تومان</span>--}}
                        {{--                                                            <span class="after_discount">25,000 تومان</span>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </a>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        @if($data['shop'][0]->video_link != null || $data['shop'][0]->video_link != "null")
                            <div class="description_box_acc" id="video">
                            <div class="list_acc">
                                <div class="accordion-group">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="video_watch collapse_acc blue_collapse">
                                                @lang("text.detail_video")
                                                <div class="flag_acc blue_flag">@lang("text.viewing")</div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <video src="{{$data['shop'][0]->video_link}}" controls
                                                           width="100%"></video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group" id="clock_close">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="clock_close collapse_acc red_collapse">
                                                ساعات کار
                                                <div class="flag_acc red_flag">اکنون بسته است</div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="table_hour_wrapper">
                                                <table>
                                                    <tbody>
                                                    @php
                                                        $clock = $data['shop'][0]->clock;
                                                        $clock = explode('**',$clock);
                                                        $start = array();
                                                        $finish = array();
                                                            foreach ($clock as $item){
                                                                $week_clock = explode('//',$item);
                                                                array_push($start,$week_clock[0]);
                                                                array_push($finish,$week_clock[1]);
                                                            }
                                                    @endphp
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[0] == 0)
                                                                            تعطیل
                                                                        @elseif($start[0] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[0]}} ~ {{$finish[0]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">شنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[1] == 0)
                                                                            تعطیل
                                                                        @elseif($start[1] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[1]}} ~ {{$finish[1]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">یکشنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[2] == 0)
                                                                            تعطیل
                                                                        @elseif($start[2] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[2]}} ~ {{$finish[2]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">دوشنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[3] == 0)
                                                                            تعطیل
                                                                        @elseif($start[3] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[3]}} ~ {{$finish[3]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">سه شنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[4] == 0)
                                                                            تعطیل
                                                                        @elseif($start[4] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[4]}} ~ {{$finish[4]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">چهارشنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[5] == 0)
                                                                            تعطیل
                                                                        @elseif($start[5] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[5]}} ~ {{$finish[5]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">پنجشنبه</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="featured_day">
                                                        <td class="start-time-field">
                                                                    <span>
                                                                        @if($start[6] == 0)
                                                                            تعطیل
                                                                        @elseif($start[6] == 1)
                                                                            شبانه روزی
                                                                        @else
                                                                            {{$start[6]}} ~ {{$finish[6]}}
                                                                        @endif
                                                                    </span>
                                                        </td>
                                                        <td class="day">
                                                            <span class="day_name">جمعه</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="description collapse_acc black_collapse">
                                                توضیحات
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="text_main">
                                                <p>{{$data['shop'][0]['description_'.app()->getLocale()]}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group" id="menu">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="menu collapse_acc black_collapse">
                                                منو
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="menu_list">
                                                <ul>
                                                    @foreach($data['menu'] as $item)
                                                        <li class="food_icon">
                                                            <a href="#">
                                                                <div class="image_food"
                                                                     style="background-image: url({{asset('site/uploader/menu/'.$item->image)}});">
                                                                </div>
                                                                <div class="content">
                                                                    <span>{{$item[app()->getLocale()]}}</span>
                                                                    <div class="dis-flex">
                                                                        @php
                                                                            $price = $item->price;
                                                                            $discount = $item->discount;
                                                                            $end_price = $price - ($price * $discount / 100);
                                                                        @endphp
                                                                        @if($item->discount != 0)
                                                                            <span class="discount">{{$price}} {{$item->currency == 1 ? "ریال" : "لیر"}}</span>
                                                                            <span class="after_discount red_color">{{$end_price}} {{$item->currency == 1 ? "ریال" : "لیر"}}</span>
                                                                        @else
                                                                            <span class="after_discount red_color">{{$item->price}} {{$item->currency == 1 ? "ریال" : "لیر"}}</span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <a href="{{route('shop.menu',['category'=>$data['shop'][0]->CategoryStore['slug'],'detail'=>str_replace(" ",'-',$data['shop'][0]->fa)])}}" class="btn btn-primary btn-block">منوی کامل</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="amenities collapse_acc black_collapse">
                                                امکانات
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="amenities_list">
                                                @foreach($data['shop'][0]->amenities()->pluck(app()->getLocale()) as $item)
                                                    <a class="am_wifi">
                                                        <span>{{$item}}</span>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group" id="send_message">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="at collapse_acc black_collapse">
                                                ارسال پیام برای رستوران
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <form method="POST" action="#" class="sent_message_to_shop">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="text"
                                                                           placeholder="نام و نام خانوادگی">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <div class="form-group">
                                                                    <input type="email" placeholder="ایمیل">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                        <textarea name="message"
                                                                                  placeholder="پیام شما"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="recaptcha">
                                                                    Recaptcha Box
                                                                </div>
                                                            </div>
                                                            <div class="col-12 text-right">
                                                                <input type="submit" value="ارسال">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group" id="contact_us">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="contact collapse_acc black_collapse">
                                                ارتباط با ما
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="row contact_section">
                                                <div class="col-12 ">
                                                    <p class="address">{{$data['shop'][0]['address_'.app()->getLocale()]}}</p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="tell">{{$data['shop'][0]['tell']}}</p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="fax">{{$data['shop'][0]['fax']}}</p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="whatsapp">{{$data['shop'][0]['WhatsApp']}}
                                                        <span>(واتساپ)</span></p>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <p class="email">{{$data['shop'][0]['email']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="panel_heading">
                                        <h4 class="panel_title">
                                            <a class="more_link collapse_acc black_collapse">
                                                موارد بیشتر
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="collapseThree hide_collapse">
                                        <div class="panel_body">
                                            <div class="row more_link_section">
                                                <div class="col-12 header_section">
                                                    برای دریافت اطلاعات بیشتر به لینک های زیر مراجعه فرمائید.
                                                </div>
                                                <div class="col-12 box_info_link">
                                                    <div class="row">
                                                        @php
                                                        $links = $data['shop'][0]['external_link'];
                                                        $links_exploded = explode('***',$links);
                                                        @endphp
                                                        @foreach($links_exploded as $item)
                                                            @php
                                                                $more_link = explode('!!!',$item);
                                                            @endphp
                                                            <div class="col-12 col-md-6 more_info_link">
                                                                <a href="{{$more_link[1]}}">
                                                                    {{$more_link[0]}}
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="logo_box">
                        <div class="logo-container">
                            <div class="logo-wrapper">
                                <div class="logo-image"
                                     style="background-image: url({{asset('site/uploader/shop/'.$data['shop'][0]->logo)}})"></div>
                            </div>
                        </div>
                    </div>
                    <div class="Qr_box">
                        <h3>@lang("text.fast_access_to_menu")</h3>
                        <div class="Qr-container">
                            <div class="Qr-wrapper">
                                <div class="Qr-image" style="background-image: url({{asset('site/uploader/Qrcode/'.$data['shop'][0]->id.'/public.png')}});"></div>
                        </div>
                    </div>
                    <div class="social_box" id="social_box">
                        <h3>@lang("text.follow_us")</h3>
                        <div class="social_network">
                            <a href="#">
                                <div class="icon_social facebook_bg">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <div class="title_social">@lang("text.facebook")</div>
                            </a>
                            <a href="#">
                                <div class="icon_social twitter_bg">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="title_social">@lang("text.twitter")</div>
                            </a>
                            <a href="#">
                                <div class="icon_social insta_bg">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="title_social">@lang("text.instagram")</div>
                            </a>
                            <a href="#">
                                <div class="icon_social telegram_bg">
                                    <i class="fab fa-telegram"></i>
                                </div>
                                <div class="title_social">@lang("text.telegram")</div>
                            </a>
                            <a href="#">
                                <div class="icon_social youtube_bg">
                                    <i class="fab fa-youtube"></i>
                                </div>
                                <div class="title_social">@lang("text.youtube")</div>
                            </a>
                            <a href="#">
                                <div class="icon_social whatsapp_bg">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <div class="title_social">@lang("text.whatsapp")</div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="contact_box">
                        <h3>ارتباط با ما</h3>
                        <div>
                            <ul>
                                <li class="address_contact_shop">تهران ، خیابان بنی هاشم ، رو به روی پاساژ الماس بنی
                                    هاشم ، کوچه سپید ، مجتمع سپیده</li>
                                <li class="phone_contact_shop">+981234567</li>
                                <li class="fax_contact_shop">+981234567</li>
                                <li class="whatsapp_contact_shop">+981234567 <span>(واتساپ)</span></li>
                                <li class="email_contact_shop">shop@gmail.com</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- app GPS -->

    <section class="GPS-shop text-center">
        <div class="container">
            <div class="GPS-title">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3>@lang("text.browse_map")</h3>
                        </div>
                    </div>
                </div>
                <div class="GPS-shop-content" id="GPS-shop-content">
                    <div class="row">
                        <div class="GPS_margin col-12 col-md-6 col-lg-4">
                            <div class="map-button">
                                <div class="map-icon">
                                        <span>
                                            <i class="far fa-compass"></i>
                                        </span>
                                </div>
                                <div class="map-button-content">
                                    <a href="https://www.google.com/maps/dir//{{$data['shop'][0]->location}}?hl={{app()->getLocale() == "fa" ? "fa-IR" : "en-US"}}">@lang("text.location")</a>
                                </div>
                            </div>
                        </div>
                        <div class="GPS_margin col-12 col-md-6 col-lg-4 d-md-none d-lg-block">
                            <div class="map-button">
                                <div class="map-icon">
                                        <span>
                                            <i class="fal fa-location"></i>
                                        </span>
                                </div>
                                <div class="map-button-content">
                                    <a class="GEO_location_text">@lang("text.geographical")</a>
                                    <span class="GEO_location"
                                          style="display: none;">{{$data['shop'][0]['location']}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="GPS_margin col-12 col-md-6 col-lg-4">
                            <div class="map-button address">
                                <div class="">
                                    <span>{{$data['shop'][0]['address_'.app()->getLocale()]}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map" id="map">
                        <div class="row">
                            <div class="col-12">
                               <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$data['shop'][0]->location}}&amp;key={{env('key_google_map')}}"></iframe>
{{--                               <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=35.50572837505239, 51.228586526278235&amp;key=AIzaSyAYtCVecI5_FEEQhgWGX1rFdyUz0zKBXVc"></iframe>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="GPS_margin col-12 col-md-6 col-lg-4">
                            <div class="map-button">
                                <div class="map-icon">
                                        <span>
                                            <i class="fal fa-location-arrow"></i>
                                        </span>
                                </div>
                                <div class="map-button-content">
                                    <a href="#">{{$data['shop'][0]->Cities[app()->getLocale()]}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="GPS_margin col-12 col-md-6 col-lg-4">
                            <div class="map-button">
                                <div class="map-icon">
                                        <span>
                                            <i class="fal fa-map-marker-alt"></i>
                                        </span>
                                </div>
                                <div class="map-button-content">
                                    <a href="#">{{$data['shop'][0]->CategoryStore[app()->getLocale()]}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-md-none d-lg-block">
                            <div class="map-button">
                                <div class="map-icon">
                                        <span>
                                            <i class="fal fa-search-plus"></i>
                                        </span>
                                </div>
                                <div class="map-button-content">
                                    <a href="#">@lang("text.similar_places")</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- app comment -->
    <section class="comment_shop">
        <div class="comment_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="section-title">
                                    <h2>@lang("text.user_comments")</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comemnt_box">
                        <div class="listing-review container-fluid">
                            <div class="row">
                                <div class="col-12 col-lg-4 text-center mb-3">
                                    <div class="review-first-col-inner">
                                        <div class="average-review">
                                            <div class="mood-icon icon-happy"></div>
                                            <div class="listing-average-rating">{{$data['rank_float']}}</div>
                                            <div class="stars">
                                                <div class="review-stars">
                                                        <span class="stars-rating">
                                                            @for($i=1;$i<=floor($data['rank_float']);$i++)
                                                            <span class="dashicons dashicons-star"><i
                                                                    class="fas fa-star"></i></span>
                                                            @endfor
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="review-stats">
                                                <div class="review_counter">{{count($data['comment'])}}</div>
                                                <div class="text">@lang("text.comments")</div>
                                            </div>
                                            <div class="average-review-shape"></div>
                                        </div>
                                    </div>
                                    <div class="write-review-button-wrapper">
                                        <div class="write-review">
                                            <a href="#scoring">
                                                <span><i class="fal fa-star-half-alt"></i></span>
                                                @lang("text.send_comment")
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="review-second-col-inner">
                                        <div class="post-comments-wrapper">
                                            <aside class="comment_container">
                                                <ul class="comment_list">
                                                    @foreach($data['comment'] as $item)
                                                    <li>
                                                        <div>
                                                            <article>
                                                                <div class="comment_box">
                                                                    <div class="comment_box_inner">
                                                                        <div class="comment_header">
                                                                            <div class="comment_header_media">
                                                                                <div class="user_current_rating">
                                                                                    {{$item->sum}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="comment_header_name">
                                                                                <h5>{{$item->name}}</h5>
                                                                            </div>
                                                                            <div class="comment_header_date">
                                                                                    <span class="calendar">
                                                                                        @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                                                            <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                                                        @else
                                                                                            <span>{{$item->created_at}}</span>
                                                                                        @endif
                                                                                    </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="comment_content">
                                                                            <div class="list_reviews">
                                                                                <div class="stars-rating">
                                                                                    <div class="star_rating_title">
                                                                                        @lang("text.speed")
                                                                                    </div>
                                                                                    <p>
                                                                                        @for($i=1;$i<=$item->rate_speed;$i++)
                                                                                            <span
                                                                                                class="dashicons dashicons-star-filled"><i
                                                                                                    class="fas fa-star"></i></span>
                                                                                        @endfor
                                                                                    </p>
                                                                                </div>
                                                                                <div class="stars-rating">
                                                                                    <div class="star_rating_title">
                                                                                        @lang("text.quality")
                                                                                    </div>
                                                                                    <p>
                                                                                        @for($i=1;$i<=$item->rate_quality;$i++)
                                                                                            <span
                                                                                                class="dashicons dashicons-star-filled"><i
                                                                                                    class="fas fa-star"></i></span>
                                                                                        @endfor
                                                                                    </p>
                                                                                </div>
                                                                                <div class="stars-rating">
                                                                                    <div class="star_rating_title">
                                                                                        @lang("text.price")
                                                                                    </div>
                                                                                    <p>
                                                                                        @for($i=1;$i<=$item->rate_price;$i++)
                                                                                            <span
                                                                                                class="dashicons dashicons-star-filled"><i
                                                                                                    class="fas fa-star"></i></span>
                                                                                        @endfor
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <p class="comment_text">
                                                                                {{$item->comment}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- app suggest section -->
    <!-- app scoring section -->
    <section>
        <div class="scoring_section" id="scoring">
            <div class="container scoring_content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('shopComemnt.store')}}">
                    @csrf
                    <div class="row">
                        <div class="title_scoring_section">
                            <h4>
                                @lang("text.detail_rating")
                            </h4>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="name_scoring">
                                <label for="name">
                                    @lang("text.fullName")
                                </label>
                                <input type="text" name="name" id="name" required value="{{old('name')}}">
                            </div>
                            <div class="email_scoring">
                                <label for="email_scoring">
                                    @lang("text.email")
                                </label>
                                <input type="email" name="email" id="email_scoring" required value="{{old('email')}}">
                            </div>
                        </div>
                        <input name="shop_id" hidden value="{{$data['shop'][0]['id']}}">
                        <div class="col-12 col-md-6">
                            <div class="message_scoring">
                                <label for="message_scoring">
                                   @lang("text.your_message")
                                </label>
                                <textarea name="text" id="message_scoring" cols="50" required rows="5">{{old('text')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="comment_content">
                        <div class="list_reviews">
                            <div class="stars-rating">
                                <div class="star_rating_title">
                                    @lang("text.speed")
                                </div>
                                <p class="submit_rate">
                                    <input type="number" hidden name="rate_speed" value="1">
                                    <span data_rate="1"><i class="fas fa-star"></i></span>
                                    <span data_rate="2"><i class="fal fa-star"></i></span>
                                    <span data_rate="3"><i class="fal fa-star"></i></span>
                                    <span data_rate="4"><i class="fal fa-star"></i></span>
                                    <span data_rate="5"><i class="fal fa-star"></i></span>
                                </p>
                            </div>
                            <div class="stars-rating">
                                <div class="star_rating_title">
                                    @lang("text.quality")
                                </div>
                                <p class="submit_rate">
                                    <input type="number" hidden name="rate_quality" value="1">
                                    <span data_rate="1"><i class="fas fa-star"></i></span>
                                    <span data_rate="2"><i class="fal fa-star"></i></span>
                                    <span data_rate="3"><i class="fal fa-star"></i></span>
                                    <span data_rate="4"><i class="fal fa-star"></i></span>
                                    <span data_rate="5"><i class="fal fa-star"></i></span>
                                </p>
                            </div>
                            <div class="stars-rating">
                                <div class="star_rating_title">
                                    @lang("text.price")
                                </div>
                                <p class="submit_rate">
                                    <input type="number" hidden name="rate_price" value="1">
                                    <span data_rate="1"><i class="fas fa-star"></i></span>
                                    <span data_rate="2"><i class="fal fa-star"></i></span>
                                    <span data_rate="3"><i class="fal fa-star"></i></span>
                                    <span data_rate="4"><i class="fal fa-star"></i></span>
                                    <span data_rate="5"><i class="fal fa-star"></i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="buttom_submit_scoring">
                        <button type="submit">
                            <span><i class="fal fa-star-half-alt"></i></span>
                            @lang("text.send_comment")
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- app offer Section -->
    <section class="offer_section">
        <div class="description_this_section">
            <p class="title">@lang("text.suggestion")</p>
            <span class="sepratorLine"></span>
            <p class="content">
               @lang("text.suggestions_for_you")
            </p>
        </div>
        <div class="container-fluid">
            <div class="row offer_list">
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop close_shop">
                                <span>اکنون بسته است</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: rgb(170,58,58);">
                                <i class="fad fa-mug-hot"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/images/shop_logo.jpg')}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">ویژه</div>
                                        <h6 class="description_shop">از کافه برکه دیدن فرمایید</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/images/shop_image.jpg')}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </div>
                            <a href="#" class="shop_read_more" title="ادامه مطلب">
                                ادامه مطلب
                            </a>
                            <div class="category_name">
                                <a href="#">کافه</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop open_shop">
                                <span>اکنون باز است</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: #706fd3;">
                                <i class="fad fa-cloud-meatball"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/images/shop_logo.jpg')}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">ویژه</div>
                                        <h6 class="description_shop">از سفرخانه ما دیدن فرمایید</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/images/shop_image.jpg')}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </div>
                            <a href="#" class="shop_read_more" title="ادامه مطلب">
                                ادامه مطلب
                            </a>
                            <div class="category_name">
                                <a href="#">سفره خانه</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop close_shop">
                                <span>اکنون بسته است</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: #ff9f43;">
                                <i class="fad fa-utensils"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/images/shop_logo.jpg')}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">ویژه</div>
                                        <h6 class="description_shop">از رستوران برکه دیدن فرمایید</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/images/shop_image.jpg')}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </div>
                            <a href="#" class="shop_read_more" title="ادامه مطلب">
                                ادامه مطلب
                            </a>
                            <div class="category_name">
                                <a href="#">رستوران</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop open_shop">
                                <span>اکنون باز است</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: #ff9f43;">
                                <i class="fad fa-cheeseburger"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/images/shop_logo.jpg')}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">ویژه</div>
                                        <h6 class="description_shop">از کافه برکه دیدن فرمایید</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/images/shop_image.jpg')}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </div>
                            <a href="#" class="shop_read_more" title="ادامه مطلب">
                                ادامه مطلب
                            </a>
                            <div class="category_name">
                                <a href="#">فست فود</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop open_shop">
                                <span>اکنون باز است</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: #706fd3;">
                                <i class="fad fa-cloud-meatball"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/images/shop_logo.jpg')}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">ویژه</div>
                                        <h6 class="description_shop">از سفرخانه ما دیدن فرمایید</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/images/shop_image.jpg')}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک است</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </div>
                            <a href="#" class="shop_read_more" title="ادامه مطلب">
                                ادامه مطلب
                            </a>
                            <div class="category_name">
                                <a href="#">سفره خانه</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
