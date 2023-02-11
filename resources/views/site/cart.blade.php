@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Cart | Minemenu</title>
@endsection
@section('main')
    <!-- section-cart-page -->

    <div class="cart_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="cart_title">
                        <h1>
                            @lang('text.cart')
                        </h1>
                    </div>
                </div>
                <div class="col-12">
                    <div class="cart-content">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang('text.title_order')
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.price")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang('text.discount')
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang('text.count_order')
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.sum_price")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang('text.delete')
                                    </div>
                                </li>
                                @foreach($data['cart'] as $item)
                                    <li>
                                        <div class="li_your_listing custom_li_cart_page">
                                            {{$item->name}}
                                        </div>
                                        <div class="li_your_listing custom_li_cart_page">
                                            {{number_format($item->price)}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                        </div>
                                        <div class="li_your_listing custom_li_cart_page">
                                            {{$item->discount}} %
                                        </div>
                                        <div class="li_your_listing custom_li_cart_page">
                                            <div class="custom_cart_number">
                                                <select class="form-control text-center count_product"
                                                        data-id="{{$item->id}}">
                                                    @for($i = 1; $i < 100; $i++)
                                                        <option
                                                            value="{{$i}}" {{$item->count == $i ? "selected" : ""}}>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="li_your_listing custom_li_cart_page">
                                            {{number_format($item->final_price)}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                        </div>
                                        <div class="li_your_listing custom_li_cart_page">
                                            <form method="post" action="{{route('cart.destroy',$item->id)}}">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" hidden>
                                                <button type="button" class="btn delete btn-outline-danger"><i
                                                        class="fad fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="cart_total">
                                <div class="title_total text-right">
                                    <p>
                                        @lang('text.sum_order')
                                    </p>
                                    <p>@lang('text.order_tax_description',["tax" => $data['shop']->enable_tax == 1 ? $data['setting'][0]->value_add_tax : 0])</p>
                                    <p>@lang('text.service_charge_order',["service" => $data['shop']->service_charge]) {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</p>
                                </div>
                                <div class="table_total">
                                    <ul class="ul_your_listing">
                                        <li>
                                            <div class="li_title_your_listing custom_li_cart_page">
                                                @lang('text.sum_order')
                                            </div>
                                            <div class="li_your_listing custom_li_cart_page">
                                                {{number_format($data['sum_price'])}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['cart'] as $item)
                                    <li>
                                        <div class="title">
                                            {{$item->name}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang('text.price')</span>
                                                <span>{{number_format($item->price)}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang('text.discount')</span>
                                                <span>{{$item->discount}} %</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang('text.count_order')</span>
                                                <span class="custom_cart_number">
                                                    <select class="form-control text-center count_product"
                                                            data-id="{{$item->id}}">
                                                    @for($i = 1; $i < 100; $i++)
                                                            <option
                                                                value="{{$i}}" {{$item->count == $i ? "selected" : ""}}>{{$i}}</option>
                                                        @endfor
                                                </select>
                                                </span>
                                            </div>
                                            <div class="items">
                                                <span>@lang('text.sum_price')</span>
                                                <span>{{number_format($item->final_price)}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang('text.delete')</span>
                                                <span>
                                                    <form method="post" action="{{route('cart.destroy',$item->id)}}">
                                                @csrf
                                                        @method('delete')
                                                <input type="submit" hidden>
                                                <button type="button" class="btn delete btn-outline-danger"><i
                                                        class="fad fa-trash-alt"></i></button>
                                            </form>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <li>
                                    <div class="title">
                                        @lang('text.sum_order')
                                    </div>
                                    <div class="list_item_shop" style="display: none;">
                                        <div class="items">
                                            <span>@lang('text.sum_order')</span>
                                            <span>{{number_format($data['sum_price'])}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="payment_button">
                        <a href="{{route('bills.index')}}" class="btn btn-info">@lang('text.continue_order')</a>
                        <a href="{{route('shop.menu', ['category' => $data['shop']->CategoryStore['slug'], 'detail' => str_replace(" ", '-', $data['shop']->en)])}}" class="btn btn-warning">@lang('text.back_to_menu')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $("body").on('click', '.delete', function () {
            swal("@lang('text.delete_message')", {
                buttons: {
                    cancel: "@lang('text.close')",
                    catch: {
                        text: "@lang('text.delete')",
                        value: "catch",
                    },
                },
            }).then((value) => {
                switch (value) {
                    case "catch":
                        $(this).parent().find("input[type=submit]").click();
                        break;
                }
            });
        });
        $("body").on('change', '.count_product', function () {
            $count = $(this).val();
            $id = $(this).attr('data-id');
            axios.post("{{route('cart.changeCount')}}", {
                count: $count,
                cart: $id,
            })
                .then(function (response) {
                    if (response.data === "done") {
                        swal({
                            icon: "success",
                            text: "{{__("text.success_message_change_count")}}"
                        })
                    }
                })
                .catch(function (error) {

                });
        })
    </script>
@endsection
