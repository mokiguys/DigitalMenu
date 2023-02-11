@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Detail Order | Minemenu</title>
@endsection
@section('main')

    <!-- section-detail-order -->

    <div class="detail_order_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="detail_order_type">
                        <p>
                            @lang("text.order_code") #{{$data['detail'][0]->key}}
                        </p>
                        <p>
                            {{jdate($data['detail'][0]->created_at)->ago()}}
                        </p>
                    </div>
                    <div class="col-12 text-center mt-5">
                        <h2 class="mb-5">
                            @lang('text.detail_order')
                        </h2>
                    </div>
                    <div class="col-12">
                        <div class="detail_order_content">
                            <div class="your_listing d-none d-lg-block">
                                <!-- desktop -->
                                <ul class="ul_your_listing">
                                    <li>
                                        <div class="li_title_your_listing">
                                            @lang("text.titleFood")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.price")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.discount")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.count_order")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.end_price")
                                        </div>
                                    </li>
                                    @php
                                        $names = $data['detail'][0]->product_name;
                                        $names = explode("//",$names);
                                        $prices = $data['detail'][0]->product_price;
                                        $prices = explode("//",$prices);
                                        $counts = $data['detail'][0]->product_count;
                                        $counts = explode("//",$counts);
                                        $discounts = $data['detail'][0]->product_discount;
                                        $discounts = explode("//",$discounts);
                                        $finalPrice = $data['detail'][0]->product_finalPrice;
                                        $finalPrice = explode("//",$finalPrice);
                                    @endphp
                                    @foreach($names as $key => $item)
                                        <li>
                                            <div class="li_your_listing">
                                                {{$item}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$prices[$key]}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$discounts[$key]}}%
                                            </div>
                                            <div class="li_your_listing">
                                                {{$counts[$key]}}  @lang('text.tedad')
                                            </div>
                                            <div class="li_your_listing">
                                                {{$finalPrice[$key]}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list_shop_mobile d-lg-none">
                                <!-- mobile -->
                                <ul>
                                    @foreach($names as $key => $item)
                                    <li>
                                        <div class="title">
                                            {{$item}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang('text.price')</span>
                                                <span>{{$prices[$key]}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang('text.discount')</span>
                                                <span>{{$discounts[$key]}}%</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.count_order")</span>
                                                <span>{{$counts[$key]}} @lang('text.tedad')</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.end_price")</span>
                                                <span>{{$finalPrice[$key]}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</span>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-5 px-5">
                        <h6 class="mb-3 font-weight-bold">
                           @lang("text.customer_description")
                        </h6>
                        <p>
                            {{$data['detail'][0]->description}}
                        </p>
                    </div>
                    <div class="col-12 my-5 px-5">
                        <h6 class="mb-3 font-weight-bold">
                            @lang("text.customer_specifications")
                        </h6>
                        <p>
                            <span>{{$data['detail'][0]->fullname}}</span><br>
                            <span>{{$data['detail'][0]->address}}</span><br>
                            <span>{{$data['detail'][0]->country_id}}</span><br>
                            <span>{{$data['detail'][0]->province_id}}</span><br>
                            <span>{{$data['detail'][0]->city_id}}</span><br>
                            <span>@lang("text.place_order") :{{$data['detail'][0]->order_place == "public" ? __("text.out_of_store") : __("text.table") . $item->order_place}}</span><br>
                            <span>@lang("text.value_added_subject") : {{$data['detail'][0]->tax}} %</span><br>
                            <span>@lang("text.service_fee_subject") : {{$data['detail'][0]->service_charge}}{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}} </span><br>
                        </p>
                        <div class="tell">
                            <p>
                                {{$data['detail'][0]->phone}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
