@extends('site.layout.app',['transparent'=>true])
@section('seo')
    <title>Home | Minemenu</title>
@endsection
@section('main')
    <!-- app Navigation -->
    <nav class="navigation-section">
        @php
            $file = explode('.',$data['banner'][0]->media);
        @endphp
        @if($file[1] == "mp4" ||$file[1] == "avi" ||$file[1] == "mkv")
            <div class="background-navigation">
                <video src="{{ asset('site/uploader/banner/'. $data['banner'][0]->media)}}" style="object-fit: fill;" width="100%" autoplay muted height="100%"></video>
            </div>
        @else
            <div class="background-navigation" style="background-image: url({{ asset('site/uploader/banner/'. $data['banner'][0]->media)}})"></div>
        @endif
        <div class="shadow_back"></div>
        <div class="holder_searchBar">
            <h1>
                <p>@lang('text.search_title')</p>
            </h1>
            <p class="content">@lang('text.search_text')</p>
            <form>
                <input type="search" placeholder="@lang('text.search_placeholder')" class="input_searchable">
                <button type="button" class="search_button">
                    <i class="fad fa-search"></i>
                </button>
            </form>
            <div class="action_buttons">
                @foreach($data['categoryShop'] as $item)
                <a href="{{route('categories',['category' => $item->slug])}}" class="category_box">
                    <div class="category_icon">
                        <div class="icon_box" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}}"></div>
                        <span class="icon_holder">
                                <i class="fad {{$item->icon}}"></i>
                         </span>
                    </div>
                    <div class="category_name">{{$item[app()->getLocale()]}}</div>
                </a>
                    @endforeach
            </div>
        </div>
    </nav>

    <!-- app Section -->
    <section class="section_introduction">
        <div class="container">
            <div class="row">
                @foreach($data['cities'] as $key => $item)
                    <div class="col-12 col-lg-{{$key % 2 == 0 ? "8" :"4"}}">
                        <div class="holderBox">
                            <a href="#" class="link"></a>
                            <div class="box_3d-effect-wrapper">
                                <div class="inner_content">
                                    <div class="content_image"
                                         style="background-image: url({{asset('site/uploader/cities/'.$item->image)}});">
                                        <div class="region-overlay" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                        <div class="gradient-overlay"></div>
                                        <div class="region-data">
                                            <div>
                                                <div class="text-centralizer">
                                                    <div class="region-name ribbon">
                                                        {{$item[app()->getLocale()]}}
                                                    </div>
                                                </div>
                                                <div class="text-descrition">
                                                    @lang("text.search_city") {{$item[app()->getLocale()]}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--                                <div class="counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}}">4</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- app Slider Place -->
    <section class="place_section">
        <div class="description_this_section">
            <p class="title">@lang('text.index_title_one')</p>
            <span class="sepratorLine"></span>
            <p class="content">
               @lang('text.index_subtitle_one')
            </p>
        </div>
        <div class="box_place rtl">
            <div class="place_item">
                <div class="place_item_wrapper">
                    <a href="#"></a>
                    <div class="place_3d_effect_wrapper">
                        <div class="place_content_inner">
                            <div class="place_cat_icon" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}}">
                                <i class="fad fa-mug-hot"></i>
                            </div>
                            <div class="place_data_wrapper">
                                <div class="place_inner_overlay" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}}"></div>
                                <div class="place_inner_GradiantOverlay"></div>
                                <div class="place_inner_backgroundOverlay"
                                     style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};box-shadow: 5px 5px {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_image"
                                     style="background-image: url({{asset('site/images/city1.jpg')}});"></div>
                                <div class="place_inner_textWrapper">
                                    <div class="text_title">تهران</div>
                                    <div class="text_description">کافه های شهر تهران</div>
                                </div>
                            </div>
{{--                            <div class="place_counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">4</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="place_item">
                <div class="place_item_wrapper">
                    <a href="#"></a>
                    <div class="place_3d_effect_wrapper">
                        <div class="place_content_inner">
                            <div class="place_cat_icon" style="background-color:#ff9f43;">
                                <i class="fad fa-utensils"></i>
                            </div>
                            <div class="place_data_wrapper">
                                <div class="place_inner_overlay" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_GradiantOverlay"></div>
                                <div class="place_inner_backgroundOverlay"
                                     style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};box-shadow: 5px 5px {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_image"
                                     style="background-image: url({{asset('site/images/city2.jpg')}});"></div>
                                <div class="place_inner_textWrapper">
                                    <div class="text_title">مشهد</div>
                                    <div class="text_description">رستوران های شهر مشهد</div>
                                </div>
                            </div>
{{--                            <div class="place_counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">4</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="place_item">
                <div class="place_item_wrapper">
                    <a href="#"></a>
                    <div class="place_3d_effect_wrapper">
                        <div class="place_content_inner">
                            <div class="place_cat_icon" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
                                <i class="fad fa-cloud-meatball"></i>
                            </div>
                            <div class="place_data_wrapper">
                                <div class="place_inner_overlay" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_GradiantOverlay"></div>
                                <div class="place_inner_backgroundOverlay"
                                     style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};box-shadow: 5px 5px {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_image"
                                     style="background-image: url({{asset('site/images/city3.jpg')}});"></div>
                                <div class="place_inner_textWrapper">
                                    <div class="text_title">شیراز</div>
                                    <div class="text_description">سفرخانه های شهر شیراز</div>
                                </div>
                            </div>
{{--                            <div class="place_counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">4</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="place_item">
                <div class="place_item_wrapper">
                    <a href="#"></a>
                    <div class="place_3d_effect_wrapper">
                        <div class="place_content_inner">
                            <div class="place_cat_icon" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
                                <i class="fad fa-mug-hot"></i>
                            </div>
                            <div class="place_data_wrapper">
                                <div class="place_inner_overlay" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_GradiantOverlay"></div>
                                <div class="place_inner_backgroundOverlay"
                                     style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};box-shadow: 5px 5px {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_image"
                                     style="background-image: url({{asset('site/images/city4.jpg')}});"></div>
                                <div class="place_inner_textWrapper">
                                    <div class="text_title">تهران</div>
                                    <div class="text_description">کافه های شهر تهران</div>
                                </div>
                            </div>
{{--                            <div class="place_counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">4</div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="place_item">
                <div class="place_item_wrapper">
                    <a href="#"></a>
                    <div class="place_3d_effect_wrapper">
                        <div class="place_content_inner">
                            <div class="place_cat_icon" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
                                <i class="fad fa-mug-hot"></i>
                            </div>
                            <div class="place_data_wrapper">
                                <div class="place_inner_overlay" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
                                </div>
                                <div class="place_inner_GradiantOverlay"></div>
                                <div class="place_inner_backgroundOverlay"
                                     style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};box-shadow: 5px 5px {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                <div class="place_inner_image"
                                     style="background-image: url({{asset('site/images/city2.jpg')}});"></div>
                                <div class="place_inner_textWrapper">
                                    <div class="text_title">تهران</div>
                                    <div class="text_description">کافه های شهر تهران</div>
                                </div>
                            </div>
{{--                            <div class="place_counter" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">4</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- app offer Section -->
    <section class="offer_section">
        <div class="description_this_section">
            <p class="title">@lang('text.index_title_two')</p>
            <span class="sepratorLine"></span>
{{--            <p class="content">--}}
{{--                ارائه انواع تخفیف در دسته های مختلف--}}
{{--            </p>--}}
        </div>
        <div class="container-fluid">
            <div class="row offer_list rtl">
                <div class="col-12 col-lg-4">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop close_shop">
                                <span>@lang('text.close_shop')</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
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
                                        <div class="title_shop">@lang('text.special')</div>
                                        <h6 class="description_shop">@lang('text.see_shop',['name' => 'berkeh'])</h6>
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
                            <div class="shop_icon_header" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
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
                            <div class="shop_icon_header" style="background-color:{{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
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
                            <div class="shop_icon_header" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
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
                            <div class="shop_icon_header" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};">
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

    <!-- app Amenities Section -->
    <section class="amenities_section">
        <div class="description_this_section">
            <p class="title">@lang('text.index_title_three')</p>
            <span class="sepratorLine"></span>
            <p class="content">
                @lang('text.index_subtitle_two')
            </p>
        </div>
        <div class="container amenities_holder">
            <div class="amenities_box row">
                @foreach($data['property'] as $item)
                    @if($item->slug != null && $item->slug != "null")
                        <div class="amenities_item col-12 col-md-6 col-lg-4 col-xl-3">
                        <a href="{{route('property.search',['property'=>$item->slug])}}">
                            <div class="amenities_content">
                                <div class="holder"> </div>
                                <div class="content_inner">
                                    <div class="header_icon" data-color="#f5cd79" style="background-color: {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}}">
                                        <i class="fad {{$item->icon}}"></i>
                                    </div>
                                    <div class="image_wrapper">
                                        <div class="overlay" style="border:12px solid {{'#'.$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)].$data['color'][rand(0,15)]}};"></div>
                                        <div class="gradiantOverlay"
                                             style="background: linear-gradient(to bottom, rgba(216,60,188,0) 35%, rgba(216,60,188,1) 100%);">
                                        </div>
                                        <div class="background-overlay"
                                             style="background-color:rgb(216,60,188);box-shadow: 5px 5px rgb(216,60,188);">
                                        </div>
                                        <div class="image" style="background-image: url({{asset('site/uploader/property/' .  $item->image)}});"></div>
                                        <div class="text_holder">
                                            <div class="text">{{$item[app()->getLocale()]}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- blog -->
    <section class="blog">
        <!-- start blog title -->
        <div class="container-fluid">
            <div class="row title-blog">
                <div class="col-12 text-center">
                    <div>
                        <h2 class="py-4">
                                <span>
                                   @lang('text.index_title_four')
                                </span>
                        </h2>
                        <span class="sepratorLine"></span>
                    </div>
                    <div>
                        <p>
                            @lang('text.index_subtitle_three')
                        </p>
                    </div>
                </div>
            </div>

            <!-- end blog title -->
            <!-- start blog item -->
            <div class="row blog-items rtl slider-blog justify-content-center ">
                @foreach($data['blog'] as $item)
                <div class="px-3 blog-item">
                    <article class="blog-item-content">
                        <div class="card-blog">
                            <div class="card-blog-image">
                                <div class="card-blog-title">
                                    <h5>
                                        {{$item->title}}
                                    </h5>
                                </div>
                                <img src="#" alt="" style="background-image: url({{asset('site/uploader/article/'.$item->image)}});">
                            </div>
                            <div class="card-blog-content-date text-center position-relative">
                                <div class="blog-content-date">
                                        <span class="pr-5">
                                            <i class="fad fa-calendar-alt"></i>
                                            <span>
                                                @if(app()->getLocale() == "fa")
                                                    {{jdate($item->created_at)->format('%d %B %Y')}}
                                                @else
                                                    {{$item->created_at}}
                                                @endif
                                            </span>
                                        </span>
                                </div>
                            </div>
                            <div class="blog-card-body p-5">
                                <div class="blog-card-body-content text-center">
                                    <p class="text-center">
                                        {{$item->short_text}}
                                    </p>
                                    <a href="{{route('blog.detail',$item->slug)}}" class="shop_read_more position-relative">
                                        @lang('text.read_more')
                                    </a>
                                </div>
                                <div class="blog-category-name position-relative text-center pt-2">
                                    <a class="position-relative text-dark">
                                        {{$item->category[0][app()->getLocale()]}}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <!-- end blog item -->
        </div>
    </section>
    <!-- app register section -->
    <section class="register_section">
        <div class="container holder_register">
            <div class="row">
                <div class="col-12 wrapper">
                    <div class="row">
                        <div class="col-12 col-md-8 content_register">
                            <div class="data_content">
                                <div class="content_info">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content_wrapper">
                                                <div class="section_title">
                                                    <div class="title">
                                                        <h2>ثبت نام</h2>
                                                    </div>
                                                    <div class="subtitle">چگونه در ماین منو ثبت نام کنیم ؟</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="description">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                استفاده
                                                از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد
                                            </div>
                                            <div class="button_register">
                                                <a href="{{route('sign')}}">رفتن به فرم ثبت نام</a>
                                            </div>
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
@endsection
