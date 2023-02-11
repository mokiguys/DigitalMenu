@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>User Panel | Minemenu</title>
@endsection
@section('main')

    <!-- start header background -->
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                   @lang("text.order")
                </h1>
            </div>
        </div>
        <!-- start section -->
        <div class="section_account_page">
            <div class="container-fluid">
                <div class="row">
                    <div id="orders" class="col-12 item_dashboard orders">
                        <div class="detail_order_content">
                            <div class="your_listing d-none d-lg-block">
                                <!-- desktop -->
                                <ul class="ul_your_listing">
                                    <li>
                                        <div class="li_title_your_listing">
                                            @lang("text.row")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.customer_name")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.phone")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.order_date")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.order_status")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.payment_method")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.payment_status")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.place_order")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.detail")
                                        </div>
                                    </li>
                                    @foreach($data['orders'] as $key => $item)
                                        <li>
                                            <div class="li_your_listing">
                                                #{{$key+1}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->fullname}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->phone}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{jdate($item->created_at)->ago()}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->status_order == 0 ? __("text.not_send_order") : __("text.send_order")}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->order_way == 1 ? __("text.online_payment") : __("text.payment_on_the_spot")}}
                                            </div>
                                            <div class="li_your_listing {{$item->order_way == 2 ? "text-secondary" : ($item->payment == 0 ? "text-danger" : "text-success")}}">
                                                {{$item->order_way == 2 ? "-" : ($item->payment == 0 ? __("text.unpaid") : __("text.paid"))}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->order_place == "public" ? __("text.out_of_store") : __("text.table") . $item->order_place }}
                                            </div>
                                            <div class="li_your_listing">
                                                <a href="{{route('order.detailList',['shop'=>$item->shop_id,'list'=>$item->id])}}" class="btn btn-primary btn-block">
                                                    @lang("text.view")
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list_shop_mobile d-lg-none">
                                <!-- mobile -->
                                <ul>
                                    @foreach($data['orders'] as $key => $item)
                                        <li>
                                        <div class="title">
                                            @lang("text.detail_order")
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.order_code")</span>
                                                <span>#{{$key+1}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.customer_name")</span>
                                                <span>{{$item->fullname}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.phone")</span>
                                                <span>{{$item->phone}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.order_date")</span>
                                                <span>{{jdate($item->created_at)->ago()}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.payment_method")</span>
                                                <span>{{$item->order_way == 1 ? __("text.online_payment") : __("text.payment_on_the_spot")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.payment_status")</span>
                                                <span class="text-success">{{$item->order_way == 2 ? "-" : ($item->payment == 0 ? __("text.unpaid") : __("text.paid"))}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.detail")</span>
                                                <span>
                                                        <a href="{{route('order.detailList',['shop'=>$item->shop_id,'list'=>$item->id])}}" class="btn btn-info">
                                                            @lang("text.view")
                                                        </a>
                                                    </span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {{$data['orders']->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <input type="submit" hidden id="logout">
    </form>
@endsection
@section('script')
    <script>
        $(".country").select2({
            dir: "rtl"
        });
        $(".province").select2({
            dir: "rtl"
        });
        $(".city").select2({
            dir: "rtl"
        });
        $(".t_ticket").select2({
            dir: "rtl"
        });
        $(".exit-class").click(function () {
            swal("{{__("text.exit_panel")}}", {
                buttons: {
                    cancel: "{{__("text.cansel")}}",
                    catch: {
                        text: "{{__("text.exit")}}",
                        value: "catch",
                    },
                },
            }).then((value) => {
                switch (value) {
                    case "catch":
                        $("#logout").click();
                        break;
                }
            });
        });
        $("#country").change(function () {
            $country = $(this).val();
            $csrf = "{{@csrf_token()}}";
            $method = "post";
            $.ajax({
                url: "{{route('cities.GetProvince')}}",
                type: 'post',
                data: {_token: $csrf, _method: $method, country: $country},
                success: function (response) {
                    $data = JSON.parse(response);
                    $html = ' <option value="0" selected disabled>@lang("text.select_default")</option>';
                    for ($i = 0; $i < $data.length; $i++) {
                        $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                    }
                    $("#province").html($html)
                }
            });
        });
        $("#province").change(function () {
            $province = $(this).val();
            $country = $("#country").val();
            $csrf = "{{@csrf_token()}}";
            $method = "post";
            $.ajax({
                url: "{{route('cities.GetCity')}}",
                type: 'post',
                data: {_token: $csrf, _method: $method, country: $country, province: $province},
                success: function (response) {
                    $data = JSON.parse(response);
                    $html = ' <option value="0" selected disabled>@lang("text.select_default")</option>';
                    for ($i = 0; $i < $data.length; $i++) {
                        $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                    }
                    $("#city").html($html)
                }
            });
        });
        $(".close_ticket").click(function () {
            swal("{{__("text.close_message_ticket")}}", {
                buttons: {
                    cancel: "@lang('text.close')",
                    catch: {
                        text: "{{__("text.close")}}",
                        value: "catch",
                    },
                },
            }).then((value) => {
                $id = $(this).attr('data-id');
                $csrf = "{{@csrf_token()}}";
                $method = "put";
                $.ajax({
                    url: 'closeTicketUser',
                    type: 'post',
                    data: {_token: $csrf, _method: $method, id: $id},
                    success: function (response) {
                        if (response === "done") {
                            swal('{{__("text.success_closed")}}', {
                                icon: 'success'
                            })
                        }
                    }
                });
            });
        });
    </script>
@endsection
