@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Menu | Minemenu</title>
@endsection
@section('main')
    <!-- start menu section -->
    {{--  new menu  --}}
    <div class="menu_page">
        <div class="container-fluid">
            <div class="row menu_page_section">
                <div class="col-6" style="display: flex;
                        align-items: center;">
                    <div class="menu_page_title">
                        <h1>
                            {{$data['shop'][0][app()->getLocale()]}}
                        </h1>
                    </div>
                </div>
                <div class="col-6">
                    <div class="menu_page_logo">
                        <img src="{{asset('site/uploader/shop/'.$data['shop'][0]->logo)}}"
                             alt="{{$data['shop'][0][app()->getLocale()]}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="menu_page_ul">
                        <ul class="list_filter_food">
                            <li>
                                <div class="menu_items menu_active" data-filter="*">
                                    @lang('text.all_category')
                                </div>
                            </li>
                            @foreach($data['menuCategory'] as $item)
                                <li>
                                    <div class="menu_items"
                                         data-filter=".product-{{$item->CategoryFood['id']}}">{{$item->CategoryFood[app()->getLocale()]}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu_page_body">
                <div class="row grid">
                    @foreach($data['menu'] as $menus)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-5 product-{{$menus->CategoryFood['id']}}">
                            <div class="menu_page_item">
                                <div class="item_img more-data-menu" data-id="{{$menus->id}}">
                                    <img src="{{asset('site/uploader/menu/'.$menus->image)}}"
                                         alt="{{$menus[app()->getLocale()]}}">
                                    @if($menus->discount != 0)
                                        <div class="discount_label">
                                            <img src="{{asset('site/images/SaleTag.png')}}" alt="SaleTag"
                                                 class="sale_tag">
                                            <div class="dis_label">
                                                {{$menus->discount}}%
                                            </div>
                                        </div>
                                    @endif
                                    {{-- loading --}}
                                    <div class="cover-food" style="display: none">
                                        <div class="lds-ring">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    {{-- end loading --}}
                                </div>
                                <div class="item_body">
                                    <div class="item_body_title">
                                        <p class="more-data-menu" data-id="{{$menus->id}}">
                                            {{$menus[app()->getLocale()]}}
                                        </p>
                                    </div>
                                    <div class="item_body_content">
                                        <div class="item_body_price">
                                            @php
                                                $price = $menus->price;
                                                $discount = $menus->discount;
                                                $end_price = $price - ($price * $discount / 100);
                                            @endphp
                                            @if($menus->discount != 0)
                                                <span
                                                    class="discounted-price">{{number_format($menus->price)}}</span>
                                                <span
                                                    class="price-final">{{number_format(ceil($end_price))}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}} </span>
                                            @else
                                                <span
                                                    class="price-final">{{number_format($menus->price)}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}} </span>
                                            @endif
                                        </div>
                                        <div class="food_name">
                                            #{{$menus->CategoryFood[app()->getLocale()]}}
                                        </div>
                                    </div>
                                    <div class="item_body_button">
                                        <div class="card_button order_fast" data_food_id="{{$menus->id}}" data_shop_id="{{$menus->shop_id}}">
                                            <button>
                                                <i class="fal fa-shopping-cart"></i>
                                            </button>
                                        </div>
                                        <div class="information_button">
                                            <button class="more-data-menu" data-id="{{$menus->id}}">
                                                <i class="fal fa-info-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="modal-detail-menu" style="display: none;">
        <div class=" custom_modal">
            <div class="detail_food">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="food-img">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="food_detail">
                            <div class="food_name">
                                    <span>

                                    </span>
                            </div>
                            <div class="food_discount">
                                    <span>
                                        @lang('text.discount') :
                                    </span>
                                <span style="color: #ff0000;">

                                    </span>
                            </div>
                            <div class="food_price">
                                    <span class="d-none d-sm-block">
                                        @lang('text.price') :
                                    </span>
                                <span class="discounted-price">

                                    </span>
                                <span class="arrow_icon">
                                        <i class="far fa-arrow-left"></i>
                                    </span>
                                <span class="price-final">

                                    </span>
                            </div>
                            <div class="food_content">

                            </div>
                            <div class="food_button">
                                <div class="food_order">
                                    <button class="order">@lang('text.order_submit')</button>
                                    <select name="food_number" id="food_number">
                                        @for($i=1;$i<=20;$i++)
                                            <option value="{{$i}}">{{$i}} @lang('text.count')</option>
                                        @endfor
                                    </select>
                                    <button
                                        class="d-none d-lg-block close_modal_menu">@lang('text.close_modal_food')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="food_description">
                            <p>
                            </p>
                        </div>
                        <button class="d-block d-lg-none close_modal_menu">@lang('text.close_modal_food')</button>
                    </div>
                    <div class="col-12">
                        <div class="send_comment mt-3">
                            <div class="user_comments d-none d-sm-block" data-open="0">
                                    <span
                                        class="p{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? "l" : "r"}}-2">
                                        @lang('text.user_comments')
                                    </span>
                                <i class="far fa-angle-up"></i>
                            </div>
                            <div class="send_comments_button" data-open="0">
                                <button type="button" class="send_button">
                                    @lang('text.send_comment')
                                </button>
                            </div>
                        </div>
                        <div class="form_comments" style="display: none;">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('commentFood.store')}}" method="post">
                                <div class="row mt-5">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="name" id="full_name" value="{{old('name')}}" class="input_comment"
                                               placeholder="@lang('text.fullName')">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="email" id="mail" value="{{old('email')}}" class="input_comment"
                                               placeholder="@lang('text.email')">
                                    </div>
                                    <input type="hidden" class="food_id" name="food_id">
                                    <input type="hidden" class="shop_id" name="shop_id">
                                    @csrf
                                    <div class="col-12">
                                            <textarea name="text" id="user-comment" class="input_comment"
                                                      cols="30" rows="5"
                                                      placeholder="@lang('text.your_message')">{{old('text')}}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="send-comment">
                                            <button type="submit" id="send-button">
                                                @lang('text.send_comment')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="comments-message" style="display: none;">
                            <div class="row mt-5 comments_body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  end new menu  --}}

@endsection
@section('script')
    <script>
        $('body').on('click', '.more-data-menu', function () {
            $id = $(this).attr('data-id');
            axios.post("{{route('menu.detail')}}", {
                id: $id,
            })
                .then(function (response) {
                    $intgration = "";
                    $(".modal-detail-menu .food-img img").attr('src', "{{asset('site/uploader/menu/')}}/" + response.data[0]['image'] + "")
                    $(".modal-detail-menu .food-img img").attr('alt', response.data[0]["{{app()->getLocale()}}"])
                    $(".modal-detail-menu .food_name span").text(response.data[0]["{{app()->getLocale()}}"])
                    if ($(".lang_site") == "fa" || $(".lang_site") == "ar") {
                        $(".modal-detail-menu .food_discount span:last-child").text("%" + response.data[0]["discount"])
                    } else {
                        $(".modal-detail-menu .food_discount span:last-child").text(response.data[0]["discount"] + "%")
                    }
                    $(".modal-detail-menu .food_id").val(response.data[0]["id"])
                    $(".modal-detail-menu .shop_id").val(response.data[0]["shop_id"])
                    $(".modal-detail-menu .user_comments").attr('data-open',0);
                    $(".modal-detail-menu .user_comments .fa-angle-up").css('transform','rotate(0deg)');
                    $(".modal-detail-menu .food_description p").text(response.data[0]["{{'description_'.app()->getLocale()}}"])
                    $(".modal-detail-menu .order").attr("data-food", response.data[0]["id"])
                    $(".modal-detail-menu select[name=food_number] option:first-child").prop("selected", true)
                    $(".modal-detail-menu .price_order span:last-child").text("{{app()->getLocale() == "fa" ? "T" : (app()->getLocale()== "en" ? "$" : "TL")}}")
                    response.data[0]["ingredients"].forEach(el => {
                        if (el["{{app()->getLocale()}}"] !== null) {
                            $intgration += "<span>"
                            $intgration += el["{{app()->getLocale()}}"]
                            $intgration += "</span>"
                        }
                    })
                    $(".modal-detail-menu .food_content").html($intgration)
                    if (response.data[0]["discount"] != 0) {
                        $(".modal-detail-menu .discounted-price").fadeIn(300)
                        $(".modal-detail-menu .arrow_icon").fadeIn(300)
                        $(".modal-detail-menu .price-final").text(response.data[0]["end_price"] + {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}})
                        $(".modal-detail-menu .discounted-price").text(response.data[0]["price"])
                    } else {
                        $(".modal-detail-menu .discounted-price").fadeOut(300)
                        $(".modal-detail-menu .arrow_icon").fadeOut(300)
                        $(".modal-detail-menu .price-final").text(response.data[0]["price"] + {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}})
                    }
                })
                .catch(function (error) {

                });
            $(".modal_menu").fadeIn(300)
        })
        $('body').on('click', '.order', function () {
            $count = $(".modal-detail-menu select[name=food_number]").val()
            $shop_id = $(".modal-detail-menu .shop_id").val();
            $food_id = $(".modal-detail-menu .food_id").val();
            axios.post("{{route('cart.store')}}", {
                count: $count,
                shop: $shop_id,
                food: $food_id,
                table: "{{isset($_GET['table']) ? $_GET['table'] : 'public'}}"
            })
                .then(function (response) {
                    if (response.data == "done") {
                        swal({
                            icon: "success",
                            text: @lang("text.success_order")
                        })
                    } else if (response.data == "error") {
                        swal({
                            icon: "error",
                            text: @lang("text.last_submit_order_to_cart")
                        })
                    } else if (response.data == "errorExist") {
                        swal({
                            icon: "error",
                            text: @lang("text.not_again")
                        })
                    }
                })
                .catch(function (error) {

                });
        })
        $('body').on('click', '.order_fast', function () {
            $count = 1;
            $shop_id = $(this).attr("data_shop_id");
            $food_id = $(this).attr("data_food_id");
            axios.post("{{route('cart.store')}}", {
                count: $count,
                shop: $shop_id,
                food: $food_id,
                table: "{{isset($_GET['table']) ? $_GET['table'] : 'public'}}"
            })
                .then(function (response) {
                    if (response.data == "done") {
                        swal({
                            icon: "success",
                            text: @lang("text.success_order")
                        })
                    } else if (response.data == "error") {
                        swal({
                            icon: "error",
                            text: @lang("text.last_submit_order_to_cart")
                        })
                    } else if (response.data == "errorExist") {
                        swal({
                            icon: "error",
                            text: @lang("text.not_again")
                        })
                    }
                })
                .catch(function (error) {

                });
        })

        $("body").on('click','.user_comments',function (){
            $food_id = $(".modal-detail-menu .food_id").val();
            axios.post("{{route('commentFood.get')}}", {
                food_id: $food_id,
            })
                .then(function (response) {
                    $comemnts = "";
                    response.data.forEach(el => {
                        $comemnts += '<div class="col-12">'
                        $comemnts += '<div class="custom_comment">'
                        $comemnts += '<div class="user_name d-flex pb-4 align-items-center">'
                        $comemnts += '<span>'+el["name"]+'</span>'
                        $comemnts += '<span class="date">'+el["date"]+'</span>'
                        $comemnts += '</span></div><p>'
                        $comemnts += el["comment"]
                        $comemnts += '</p></div></div>'
                    })
                    $(".comments_body").html($comemnts)

                })
                .catch(function (error) {
                });
        })
    </script>
@endsection
