@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Categories | Minemneu</title>
@endsection
@section('cssFiles')

@endsection
@section('main')
    <div id="map"></div>
    <!-- start listing result -->
    <div class="search-result-wrapper">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <div class="search-result-title">
                            <span>
                                {{$data['shop']->count()}}
                            </span>
                        @lang("text.result_search")
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start listing filter -->
    <div class="filter-form-wrapper">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 text-right text-md-right pb-3">
                        <select name="newest" class="select-newest">
                            <option value="ایران">ایران</option>
                            <option value="ترکیه">ترکیه</option>

                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-right text-md-right pb-3">
                        <select name="newest" multiple data-placeholder="استان" class="select-newest">
                            <option value="تهران">تهران</option>
                            <option value="خوزستان">خوزستان</option>
                            <option value="گیلان">گیلان</option>
                            <option value="فارس">فارس</option>
                            <option value="شیراز">شیراز</option>
                            <option value="شیراز">اصفهان</option>
                            <option value="شیراز">سمنان</option>

                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-right text-md-right pb-3">
                        <select name="regions" multiple data-placeholder="شهر" class="select-newest select-regions">
                            <option value="تهران"> تهران</option>
                            <option value="کرج">کرج</option>
                            <option value="شیراز">شیراز</option>
                            <option value="تبریز">تبریز</option>
                            <option value="اهواز">اهواز</option>
                            <option value="کیش">کیش</option>
                            <option value="بندرعباس">بندرعباس</option>

                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-right text-md-right pb-3 pb-lg-0">
                        <select name="newest" class="select-newest">
                            <option value="بهترین نرخ">بهترین نرخ</option>
                            <option value="جدیدترین">جدیدترین</option>
                            <option value="قدیمی‌ترین">قدیمی‌ترین</option>

                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-lg-right text-md-right pb-3 pb-lg-0">
                        <select name="newest" multiple data-placeholder="دسته بندی ها"
                                class="select-newest select-restaurant">
                            <option value="رستوران">رستوران</option>
                            <option value="کافه">کافه</option>
                            <option value="سفره‌خانه">سفره‌خانه</option>
                            <option value="فست فود">فست ‌فود</option>

                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-right text-md-right pb-3 pb-lg-0">
                        <select name="amenities" multiple data-placeholder="امکانات"
                                class="select-newest select-amenities">
                            <option value="خانوادگی دوستی">خانوادگی دوستی</option>
                            <option value="پارکینگ">پارکینگ</option>
                            <option value="رزرو">رزرو</option>
                            <option value="اینترنت">اینترنت</option>
                            <option value="بالکن">بالکن</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- app offer Section -->
    <section class="offer_section offer-section-shops">
        <div class="container-fluid">
            <div class="row shops-content">
                @foreach($data['shop'] as $item)
                <div class="col-12 col-sm-6 col-lg-4 mt-5">
                    <div class="offer_box">
                        <a class="link_box_offer">
                            <div class="status_shop open_shop">
                                <span>@lang("text.open_shop")</span>
                            </div>
                        </a>
                        <div class="offer-circular-wrapper">
                            <div class="shop_icon_header" style="background-color: rgb(170,58,58);">
                                <i class="fad {{$item->CategoryStore['icon']}}"></i>
                            </div>
                            <div class="shop_raing">
                                4.5
                            </div>
                            <div class="shop_logo">
                                <div class="logo_minimal"
                                     style="background-image: url({{asset('site/uploader/shop/'.$item->logo)}});"></div>
                            </div>
                            <div class="shop_image">
                                <div class="content_wrapper">
                                    <div class="content_title_description">
                                        <div class="title_shop">@lang("text.special")</div>
                                        <h6 class="description_shop">@lang("text.see_shop",['name' => $item[app()->getLocale()]])</h6>
                                    </div>
                                </div>
                                <div class="content_image">
                                    <div class="inner_image">
                                        <div class="image"
                                             style="background-image: url({{asset('site/uploader/shop/'.$item->main_image)}});"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-card-data-arrow-before text-center"></div>
                        <address class="address_shop">
                                <span>{{$item['address_'.app()->getLocale()]}}</span>
                        </address>
                        <div class="shop_data">
                            <div class="shop-card-content-excerpt">
                                {{mb_substr($item['description_'.app()->getLocale()],0,300)}}
                            </div>
                            <a href="{{route('detail',['category'=>$item->CategoryStore['slug'],'detail'=>str_replace(" ",'-',$item->fa)])}}" class="shop_read_more">
                                @lang("text.more_data")
                            </a>
                            <div class="category_name">
                                <a href="#">{{$item->CategoryStore[app()->getLocale()]}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-12 col-sm-6 col-lg-4 mt-5">--}}
{{--                    <div class="offer_box">--}}
{{--                        <a class="link_box_offer">--}}
{{--                            <div class="status_shop open_shop">--}}
{{--                                <span>اکنون باز است</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <div class="offer-circular-wrapper">--}}
{{--                            <div class="shop_icon_header" style="background-color: #706fd3;">--}}
{{--                                <i class="fad fa-cloud-meatball"></i>--}}
{{--                            </div>--}}
{{--                            <div class="shop_raing">--}}
{{--                                4.5--}}
{{--                            </div>--}}
{{--                            <div class="shop_logo">--}}
{{--                                <div class="logo_minimal"--}}
{{--                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>--}}
{{--                            </div>--}}
{{--                            <div class="shop_image">--}}
{{--                                <div class="content_wrapper">--}}
{{--                                    <div class="content_title_description">--}}
{{--                                        <div class="title_shop">ویژه</div>--}}
{{--                                        <h6 class="description_shop">از سفرخانه ما دیدن فرمایید</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="content_image">--}}
{{--                                    <div class="inner_image">--}}
{{--                                        <div class="image"--}}
{{--                                             style="background-image: url(./public/images/shop_image.jpg);"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="offer-card-data-arrow-before text-center"></div>--}}
{{--                        <address class="address_shop">--}}
{{--                                <span>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
{{--                                    گرافیک است</span>--}}
{{--                        </address>--}}
{{--                        <div class="shop_data">--}}
{{--                            <div class="shop-card-content-excerpt">--}}
{{--                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان--}}
{{--                                گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است--}}
{{--                            </div>--}}
{{--                            <a href="#" class="shop_read_more" title="ادامه مطلب">--}}
{{--                                ادامه مطلب--}}
{{--                            </a>--}}
{{--                            <div class="category_name">--}}
{{--                                <a href="#">سفره خانه</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="navigation-shops pt-5">
            {{$data['shop']->render()}}
        </div>
    </section>

    <!-- app suggested listings -->

    <section class="offer_section offer-content-shops">
        <div class="description_this_section">
            <p class="title">@lang("text.suggested_list")</p>
            <span class="sepratorLine"></span>
{{--            <p class="content"></p>--}}
        </div>
        <div class="container-fluid">
            <div class="row offer_list rtl">
                <div class="col-12 col-lg-3 outline-none">
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
                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>
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
                                             style="background-image: url(./public/images/shop_image.jpg);"></div>
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
                <div class="col-12 col-lg-3 outline-none">
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
                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>
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
                                             style="background-image: url(./public/images/shop_image.jpg);"></div>
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
                <div class="col-12 col-lg-3 outline-none">
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
                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>
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
                                             style="background-image: url(./public/images/shop_image.jpg);"></div>
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
                <div class="col-12 col-lg-3 outline-none">
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
                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>
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
                                             style="background-image: url(./public/images/shop_image.jpg);"></div>
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
                <div class="col-12 col-lg-3 outline-none">
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
                                     style="background-image: url(./public/images/shop_logo.jpg);"></div>
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
                                             style="background-image: url(./public/images/shop_image.jpg);"></div>
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
@section('script')
    <script>
        function getJSONMarkers() {
            const markers = JSON.parse('{!! $data['location_json'] !!}');
            return markers;
        }

        function loadMap() {
            // Initialize Google Maps
            const mapOptions = {
                // center:new google.maps.LatLng(32.12284161131457, 54.07566903395876),
                center:new google.maps.LatLng(35.749501, 51.465609),
                zoom: 11
            }
            const map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Load JSON Data
            const DataMarkers = getJSONMarkers();
            // Initialize Google Markers
            for(data of DataMarkers) {
                let marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(data.lat,data.long),
                    title: data.name
                })
                const infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker,"click",function (){
                    infowindow.open(map,marker)
                })
            }
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('key_google_map')}}&callback=loadMap" async></script>

    <script>
        $(".select-newest").select2({
            dir: "rtl"
        })

        $(".select-regions").select2({
            dir: "rtl"
        })

        $(".select-restaurant").select2({
            dir: "rtl"
        })
        $(".select-amenities").select2({
            dir: "rtl"
        })
    </script>
@endsection
