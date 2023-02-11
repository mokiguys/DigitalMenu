@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>User Panel | Minemenu </title>
@endsection
@section('main')

    <!-- start header background -->
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                    @lang("text.user_panel")
                </h1>
            </div>
        </div>
        <!-- start section -->
        <div class="section_account_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul class="content_account">
                                <li class="box_dashboard" data-target="dashboard">
                                    <a href="#dashboard" class="active">
                                        @lang("text.dashboard")
                                        <div class="icon_account">
                                            <i class="fal fa-cog"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="info">
                                    <a href="#info" class="">
                                        @lang("text.personal_information")
                                        <div class="icon_account">
                                            <i class="fal fa-user"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="shops_list">
                                    <a href="#shops" class="">
                                        @lang("text.list_of_stores")
                                        <div class="icon_account">
                                            <i class="fal fa-store"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="setting">
                                    <a href="#setting" class="">
                                        @lang("text.store_settings")
                                        <div class="icon_account">
                                            <i class="fal fa-cog"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard">
                                    <a href="{{route('plans')}}">
                                        @lang("text.add_store")
                                        <div class="icon_account">
                                            <i class="fal fa-store-alt"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="bills_list">
                                    <a href="#bills" class="">
                                        @lang("text.bill")
                                        <div class="icon_account">
                                            <i class="fal fa-file-invoice-dollar"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="shop_comment">
                                    <a href="#shop_comment">
                                        @lang("text.comemnt_business_title")
                                        <div class="icon_account">
                                            <i class="fal fa-comment-alt-dollar"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="food_comment">
                                    <a href="#food_comment">
                                        @lang("text.comemnt_menu_title")
                                        <div class="icon_account">
                                            <i class="fal fa-comment-alt-dots"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="client_message">
                                    <a href="#client_message">
                                        @lang("text.user_message")
                                        <div class="icon_account">
                                            <i class="fal fa-comment-alt-lines"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="dav">
                                    <a href="#dav">
                                        @lang("text.ad_title")
                                        <div class="icon_account">
                                            <i class="fal fa-ad"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="ticket">
                                    <a href="#ticket" class="">
                                        @lang("text.ticket")
                                        <div class="icon_account">
                                            <i class="fal fa-comments-alt"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard exit-class">
                                    <a class="">
                                        @lang("text.exit")
                                        <div class="icon_account">
                                            <i class="fal fa-lock-open"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="dashboard" class="col-12 item_dashboard dashboard">
                        <div class="text_account">
                            <p>
                                @lang("text.say_hello",['name' => auth()->user()->name])
                                <br>
                                <br>
                                <br>
                                @lang("text.message_welcome")
                            </p>
                        </div>
                    </div>
                    <div id="info" class="col-12 item_dashboard info" style="display: none;">
                        <div class="account_detail">
                            <form method="POST" action="{{route('user.update.user',['user'=>Auth::id()])}}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="first_name">
                                            <label for="first_name">
                                                @lang("text.fullName")
                                                <i class="fas fa-star-of-life star_icon"></i>
                                            </label>
                                            <input type="text" id="first_name" value="{{$data['user'][0]->name}}"
                                                   name="name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="email_account">
                                            <label for="email_account">
                                                @lang("text.email")
                                                <i class="fas fa-star-of-life star_icon"></i>
                                            </label>
                                            <input disabled type="email" id="email_account"
                                                   value="{{$data['user'][0]->email}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="email_account">
                                            <label for="email_account">
                                                @lang("text.phone")
                                                <i class="fas fa-star-of-life star_icon"></i>
                                            </label>
                                            <input type="tel" id="email_account" value="{{$data['user'][0]->phone}}"
                                                   name="phone">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="country">
                                            @lang("text.country_single")
                                            <i class="fas fa-star-of-life star_icon"></i>
                                        </label>
                                        <div class="custom_country">
                                            <select name="country" id="country" class="country">
                                                <option value="0" selected disabled>@lang("text.select_default")
                                                </option>
                                                @foreach($data['country'] as $item)
                                                    <option
                                                        value="{{$item->id}}" {{$data['user'][0]->country == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="province">
                                            @lang("text.province_single")
                                            <i class="fas fa-star-of-life star_icon"></i>
                                        </label>
                                        <div class="custom_country">
                                            <select name="province" id="province" class="province">
                                                <option value="0" selected disabled>@lang("text.select_default")
                                                </option>
                                                @foreach($data['province'] as $item)
                                                    <option
                                                        value="{{$item->id}}" {{$data['user'][0]->province == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="city">
                                            @lang("text.city")
                                            <i class="fas fa-star-of-life star_icon"></i>
                                        </label>
                                        <div class="custom_city">
                                            <select name="city" id="city" class="city">
                                                <option value="0" selected disabled>@lang("text.select_default")
                                                </option>
                                                @foreach($data['city'] as $item)
                                                    <option
                                                        value="{{$item->id}}" {{$data['user'][0]->city == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="address_account">
                                            <label for="address_account">
                                                @lang("text.address")
                                                <i class="fas fa-star-of-life star_icon"></i>
                                            </label>
                                            <input type="text" value="{{$data['user'][0]->address}}"
                                                   id="address_account" name="address">
                                        </div>
                                    </div>
                                    <div class="col-12 submit_account">
                                        <input type="submit" class="btn" value="@lang("text.address")">
                                    </div>
                                </div>
                            </form>
                            <div class="col-12 text-center">
                                <div class="change_pass_title">
                                    @lang("text.change_password_data")
                                </div>
                            </div>
                            <form method="POST" action="{{route('user.update.password',['user'=>Auth::id()])}}">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="current_password">
                                            <label for="current_password">
                                                @lang("text.current_password")
                                            </label>
                                            <span class="pass_input">
                                                <input type="password" id="current_password" name="current_password">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="new_password">
                                            <label for="new_password">
                                                @lang("text.new_password")
                                            </label>
                                            <span class="pass_input">
                                                <input type="password" id="new_password" name="new_password">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="confirm_new_password">
                                            <label for="confirm_new_password">
                                                @lang("text.confirm_new_password")
                                            </label>
                                            <span class="pass_input">
                                                <input type="password" id="confirm_new_password"
                                                       name="confirm_password">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 submit_account">
                                        <input type="submit" class="btn" value="@lang("text.change_password_data")">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="shops" class="col-12 item_dashboard shops_list" style="display: none;">
                        <div class="alert alert-warning">
                            <p class="mb-0 text-right">@lang("text.description_after_buy_plan")</p>
                        </div>
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                {{-- header list--}}
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.titleFood")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.store_confirmation")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.category")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.city")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.plan")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.status_shop")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.expire")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.qr")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.edit_menu")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.edit_shop")
                                    </div>
                                    <div class="li_title_your_listing">
                                       @lang("text.activiti_store")
                                    </div>
                                </li>
                                {{-- item list--}}
                                @foreach($data['shops'] as $key => $item)
                                    <li>
                                        <div class="li_your_listing">
                                            @switch(app()->getLocale())
                                                @case('fa')
                                                <td>{{$item->fa}}</td>
                                                @break
                                                @case('en')
                                                <td>{{$item->en}}</td>
                                                @break
                                                @case('tr')
                                                <td>{{$item->tr}}</td>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->confirmAdmin == 1 ? __('text.accepted') : __('text.not_approved')}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->CategoryStore[app()->getLocale()]}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->Cities[app()->getLocale()]}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}
                                        </div>
                                        @if($item->finish_time > 0 && $item->status_order == 1 && $item->stop == 0)
                                            <div class="li_your_listing text-success font-weight-bold">
                                                {{__("text.active")}}
                                            </div>
                                            <div
                                                class="li_your_listing font-weight-bold">{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</div>
                                        @else
                                            <div class="li_your_listing text-danger font-weight-bold">
                                                {{ __("text.deActive")}}
                                            </div>
                                            <div class="li_your_listing font-weight-bold text-secondary">
                                                @lang("text.stop")
                                            </div>
                                        @endif
                                        <div class="li_your_listing">
                                            <a href="{{route('Qr.index',['shop'=>$item->id])}}"
                                               class="btn btn-info text-light">
                                                <i class="fas fa-qrcode"></i>
                                            </a>
                                        </div>
                                        <div class="li_your_listing">
                                            <a href="{{route('user_menu.index',['shop'=>$item->id])}}"
                                               class="btn btn-warning text-light">
                                                <i class="fas fa-file-edit"></i>
                                            </a>
                                        </div>
                                        <div class="li_your_listing">
                                            <a data-target="#edit_menu_{{$item->id}}" data-toggle="modal"
                                               class="btn btn-success text-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="li_your_listing">
                                            @if($item->status_order == 1)
                                                <form action="{{route('Business.stop',['business'=>$item->id])}}"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="stop"
                                                           value="{{$item->stop == 0 ? 1 : 0}}">
                                                    <button type="submit"
                                                            class="btn btn-{{$item->stop == 0 ? "danger" : "success"}}">
                                                        <i class="fas fa-ban"></i></button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </li>
                                    <div class="modal fade edit_custom_modal" id="edit_menu_{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'fa'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.persian")
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'en'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.english")
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'tr'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.turkish")
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['shops'] as $key => $item)
                                    <li>
                                        <div class="title">
                                            @switch(app()->getLocale())
                                                @case('fa')
                                                <td>{{$item->fa}}</td>
                                                @break
                                                @case('en')
                                                <td>{{$item->en}}</td>
                                                @break
                                                @case('tr')
                                                <td>{{$item->tr}}</td>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.store_confirmation")</span>
                                                <span>{{$item->confirmAdmin == 1 ? __('text.accepted') : __('text.not_approved')}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.category")</span>
                                                <span>{{$item->CategoryStore[app()->getLocale()]}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.city")</span>
                                                <span>{{$item->Cities[app()->getLocale()]}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.plan")</span>
                                                <span>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</span>
                                            </div>
                                            @if($item->finish_time > 0 && $item->status_order == 1 && $item->stop == 0)
                                                <div class="items">
                                                    <span>@lang("text.status_shop")</span>
                                                    <span
                                                        class="text-success font-weight-bold">{{__("text.active")}}</span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.expire")</span>
                                                    <span
                                                        class="font-weight-bold">{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</span>
                                                </div>
                                            @else
                                                <div class="items">
                                                    <span>@lang("text.status_shop")</span>
                                                    <span
                                                        class="text-danger font-weight-bold">{{ __("text.deActive")}}</span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.expire")</span>
                                                    <span class="font-weight-bold text-secondary">@lang("text.stop")</span>
                                                </div>
                                            @endif
                                            <div class="items mb-2">
                                                <span>@lang("text.qr")</span>
                                                <span>
                                                    <a href="{{route('Qr.index',['shop'=>$item->id])}}" class="btn btn-info">
                                                        <i class="fal fa-qrcode"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.edit_menu")</span>
                                                <span>
                                                    <a href="{{route('user_menu.index',['shop'=>$item->id])}}"
                                                       class="btn btn-warning">
                                                        <i class="fal fa-file-edit"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.edit_shop")</span>
                                                <span>
                                                    <a data-target="#edit_menu_mobile_{{$item->id}}" data-toggle="modal"
                                                       class="btn btn-success text-light">
                                                        <i class="fal fa-edit"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.activiti_store")</span>
                                                <span>
                                                    @if($item->status_order == 1)
                                                        <form
                                                            action="{{route('Business.stop',['business'=>$item->id])}}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <input type="hidden" name="stop"
                                                                   value="{{$item->stop == 0 ? 1 : 0}}">
                                                        <button type="submit"
                                                                class="btn btn-{{$item->stop == 0 ? "danger" : "success"}}"><i
                                                                class="fas fa-ban"></i></button>
                                                        </form>
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <div class="modal fade edit_custom_modal" id="edit_menu_mobile_{{$item->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'fa'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.persian")
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'en'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.english")
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <a href="{{route('Business.edit',['business'=>$item->id,'lang'=>'tr'])}}"
                                                               class="a_modal">
                                                                <span>
                                                                    @lang("text.turkish")
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="bills" class="col-12 item_dashboard bills_list" style="display: none;">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.store_name")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.planType")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.type_transaction")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.payment_status")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.activiti_store")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.expire")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.amount_paid")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.bill_payment")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.recharge")
                                    </div>
                                </li>
                                @foreach($data['shops'] as $item)
                                    <li>
                                        <div class="li_your_listing">
                                            @switch(app()->getLocale())
                                                @case('fa')
                                                <td>{{$item->fa}}</td>
                                                @break
                                                @case('en')
                                                <td>{{$item->en}}</td>
                                                @break
                                                @case('tr')
                                                <td>{{$item->tr}}</td>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->typePayment == 1 ? __("text.buy_a_plan") : __("text.recharge")}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->status_order == 1 ? __('text.success') : __("text.unpaid")}}
                                        </div>
                                        <div class="li_your_listing">
                                            @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                {{jdate($item->created_at)->format('%d %B %y')}}
                                            @else
                                                {{$item->created_at}}
                                            @endif
                                        </div>
                                        <div class="li_your_listing">
                                            @if($item->finish_time > 0 && $item->status_order == 1)
                                                {{__("text.active")}}
                                            @else
                                                {{ __("text.deActive")}}
                                            @endif
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->price}} {{$item->currency == 1 ? __("text.rial") : ($item->currency == 2 ? "$" : "TL")}}
                                        </div>
                                        <div class="li_your_listing">
                                            @if($item->status_order == 0 && $item->plan != 1)
                                                <a href="#" class="btn btn-danger text-light">
                                                    <i class="fal fa-file-invoice-dollar"></i>
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </div>
                                        <div class="li_your_listing">
                                            @if($item->finish_time < 20 || $item->plan == 1)
                                                <a href="#" class="btn btn-warning">
                                                    <i class="fal fa-file-invoice-dollar"></i>
                                                </a>
                                            @else
                                                -
                                            @endif

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['shops'] as $item)
                                    <li>
                                        <div class="title">
                                            @switch(app()->getLocale())
                                                @case('fa')
                                                <td>{{$item->fa}}</td>
                                                @break
                                                @case('en')
                                                <td>{{$item->en}}</td>
                                                @break
                                                @case('tr')
                                                <td>{{$item->tr}}</td>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.planType")</span>
                                                <span>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.type_transaction")</span>
                                                <span>{{$item->typePayment == 1 ? __("text.buy_a_plan") : __("text.recharge")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.payment_status")</span>
                                                <span>{{$item->status_order == 1 ? __('text.success') : __("text.unpaid")}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.date")</span>
                                                @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                @else
                                                    <span>{{$item->created_at}}</span>
                                                @endif
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.activiti_store")</span>
                                                <span>@if($item->finish_time > 0 && $item->status_order == 1)
                                                        {{__("text.active")}}
                                                    @else
                                                        {{ __("text.deActive")}}
                                                    @endif</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.expire")</span>
                                                <span>{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.amount_paid")</span>
                                                <span>{{$item->price}} {{$item->currency == 1 ? "ریال" : ($item->currency == 2 ? "$" : "TL")}}</span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.bill_payment")</span>
                                                <span>
                                                    @if($item->status_order == 0 && $item->plan != 1)
                                                        <a href="#" class="btn btn-danger">
                                                        <i class="fal fa-file-invoice-dollar"></i>
                                                    </a>
                                                    @else
                                                        -
                                                    @endif

                                                </span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.recharge")</span>
                                                <span>
                                                    @if($item->finish_time < 20 || $item->plan == 1)
                                                        <a href="#" class="btn btn-warning">
                                                            <i class="fal fa-file-invoice-dollar"></i>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                    </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="ticket" class="col-12 item_dashboard ticket" style="display: none;">
                        <form action="{{route('ticketSite.store')}}" method="POST">
                            @csrf
                            <div class="ticket_section">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="ticket_subject">
                                            <label for="ticket">
                                                @lang("text.subject_ticket")
                                            </label>
                                            <div class="custom_ticket">
                                                <select name="subject" id="ticket" class="t_ticket">
                                                    <option value="0" selected disabled>@lang("text.select_subject_ticket")</option>
                                                    @foreach($data['ticketSubject'] as $item)
                                                        <option
                                                            value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ticket_message">
                                            <label for="message">@lang("text.your_message")</label>
                                            <div class="message_box">
                                                <textarea name="message" id="message" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn custom_input"
                                               value="@lang("text.send_message")">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 shops_list ticket_list">
                                <div class="your_listing d-none d-lg-block">
                                    <!-- desktop -->
                                    <ul class="ul_your_listing">
                                        <li>
                                            <div class="li_title_your_listing">
                                                @lang("text.subject_ticket")
                                            </div>
                                            <div class="li_title_your_listing">
                                                @lang("text.date")
                                            </div>
                                            <div class="li_title_your_listing">
                                                @lang("text.status_ticket")
                                            </div>
                                            <div class="li_title_your_listing">
                                                @lang("text.awnser")
                                            </div>
                                            <div class="li_title_your_listing">
                                                @lang("text.close")
                                            </div>
                                        </li>
                                        @foreach($data['ticket_list'] as $item)
                                            <li>
                                                <div class="li_your_listing">
                                                    @foreach($data['ticketSubject'] as $su)
                                                        @if($item->subject == $su->id)
                                                            {{$su[app()->getLocale()]}}
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="li_your_listing">
                                                    @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                        {{jdate($item->created_at)->format('%d %B %y')}}
                                                    @else
                                                        {{$item->created_at}}
                                                    @endif
                                                </div>
                                                <div class="li_your_listing">
                                                    @if($item->user_agent == "Admin" && $item->close == 0)
                                                        <span class="font-weight-bold text-success">
                                                        @lang("text.answered")
                                                        </span>
                                                    @elseif($item->user_agent == "Admin" && $item->close == 1)
                                                        <span class="font-weight-bold text-secondary">
                                                        @lang("text.closed")
                                                        </span>
                                                    @elseif($item->user_agent != "Admin" && $item->close == 0)
                                                        <span class="font-weight-bold text-warning">
                                                        @lang("text.not_answered")
                                                        </span>
                                                    @elseif($item->user_agent != "Admin" && $item->close == 1)
                                                        <span class="font-weight-bold text-secondary">
                                                        @lang("text.closed")
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="li_your_listing">
                                                    @if($item->close == 0)
                                                        <a href="{{route('ticketSite.show',['ticket'=>$item->parent_id])}}"
                                                           class="btn btn-info text-light">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                                <div class="li_your_listing">
                                                    @if($item->close == 0)
                                                        <a class="btn close_ticket text-light btn-danger"
                                                           data-id="{{$item->id}}">
                                                            <i class="fas fa-ban"></i>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="list_shop_mobile d-lg-none">
                                    <!-- mobile -->
                                    <ul>
                                        @foreach($data['ticket_list'] as $item)
                                            <li>
                                                <div class="title">
                                                    @foreach($data['ticketSubject'] as $su)
                                                        @if($item->subject == $su->id)
                                                            {{$su[app()->getLocale()]}}
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="list_item_shop" style="display: none;">
                                                    <div class="items">
                                                        <span>@lang("text.date")</span>
                                                        @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                            <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                        @else
                                                            <span>{{$item->created_at}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="items">
                                                        <span>@lang("text.status_ticket")</span>
                                                        @if($item->user_agent == "Admin" && $item->close == 0)
                                                            <span class="font-weight-bold text-success">
                                                        @lang("text.answered")
                                                        </span>
                                                        @elseif($item->user_agent == "Admin" && $item->close == 1)
                                                            <span class="font-weight-bold text-secondary">
                                                        @lang("text.closed")
                                                        </span>
                                                        @elseif($item->user_agent != "Admin" && $item->close == 0)
                                                            <span class="font-weight-bold text-warning">
                                                        @lang("text.not_answered")
                                                        </span>
                                                        @elseif($item->user_agent != "Admin" && $item->close == 1)
                                                            <span class="font-weight-bold text-secondary">
                                                        @lang("text.closed")
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="items mb-2">
                                                        <span>پاسخ</span>
                                                        <span>
                                                            @if($item->close == 0)
                                                                <a href="{{route('ticketSite.show',['ticket'=>$item->parent_id])}}"
                                                                   class="btn btn-info text-light">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                            @else
                                                                -
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="items mb-2">
                                                        <span>@lang("text.close")</span>
                                                        <span>
                                                            @if($item->close == 0)
                                                                <a class="btn close_ticket text-light btn-danger"
                                                                   data-id="{{$item->id}}">
                                                            <i class="fas fa-ban"></i>
                                                        </a>
                                                            @else
                                                                -
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="setting" class="col-12 item_dashboard setting" style="display: none;">
                        <div class="setting_table">
                            <div class="your_listing d-none d-lg-block">
                                <!-- desktop -->
                                <ul class="ul_your_listing">
                                    <li>
                                        <div class="li_title_your_listing">
                                            @lang("text.store_name")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.value_added",["value" => $data['setting']->value_add_tax])
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.service_fee_subject")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.activiti_store")
                                        </div>
                                    </li>
                                    @foreach($data['shops'] as $key => $item)
                                        <li>
                                            <div class="li_your_listing">
                                                @switch(app()->getLocale())
                                                    @case('fa')
                                                    <td>{{$item->fa}}</td>
                                                    @break
                                                    @case('en')
                                                    <td>{{$item->en}}</td>
                                                    @break
                                                    @case('tr')
                                                    <td>{{$item->tr}}</td>
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="li_your_listing">
                                                <input type="checkbox" class="enable_tax" data-id="{{$item->id}}" {{$item->enable_tax == 1 ? "checked" : ""}}>
                                            </div>
                                            <div class="li_your_listing">
                                                <input type="number" id="service" class="form-control service_charge text-center"
                                                       name="service" data-id="{{$item->id}}" value="{{$item->service_charge}}" min="0">
                                            </div>
                                            <div class="li_your_listing">
                                                @if($item->status_order == 1)
                                                    <form
                                                        action="{{route('Business.stop',['business'=>$item->id])}}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="stop"
                                                               value="{{$item->stop == 0 ? 1 : 0}}">
                                                        <button type="submit"
                                                                class="btn btn-{{$item->stop == 1 ? "danger" : "success"}}">
                                                            {{$item->stop == 1 ? __("text.deActive") : __("text.active")}}
                                                        </button>
                                                    </form>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list_shop_mobile d-lg-none">
                                <!-- mobile -->
                                <ul>
                                    @foreach($data['shops'] as $key => $item)
                                        <li>
                                        <div class="title">
                                            @switch(app()->getLocale())
                                                @case('fa')
                                                {{$item->fa}}
                                                @break
                                                @case('en')
                                                {{$item->en}}
                                                @break
                                                @case('tr')
                                                {{$item->tr}}
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.value_added",["value" => $data['setting']->value_add_tax])</span>
                                                <span><input type="checkbox" class="enable_tax" data-id="{{$item->id}}" {{$item->enable_tax == 1 ? "checked" : ""}}></span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.service_fee_subject")</span>
                                                <span>
                                                        <input type="number" id="service" class="form-control service_charge text-center"
                                                               name="service" data-id="{{$item->id}}" value="{{$item->service_charge}}" min="0">
                                                    </span>
                                            </div>
                                            <div class="items mt-3">
                                                <span>@lang("text.activiti_store")</span>
                                                <span>
                                                        @if($item->status_order == 1)
                                                        <form
                                                            action="{{route('Business.stop',['business'=>$item->id])}}"
                                                            method="post">
                                                        @csrf
                                                            @method('put')
                                                        <input type="hidden" name="stop"
                                                               value="{{$item->stop == 0 ? 1 : 0}}">
                                                        <button type="submit"
                                                                class="btn btn-{{$item->stop == 1 ? "danger" : "success"}}">
                                                            {{$item->stop == 1 ? __("text.deActive") : __("text.active")}}
                                                        </button>
                                                    </form>
                                                    @else
                                                        -
                                                    @endif
                                                    </span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="shop_comment" class="col-12 item_dashboard shop_comment" style="display: none;">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.fullName")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.email")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.point_quality")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.point_speed")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.point_price")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.show_comemnt")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.confirm_comment")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.delete")
                                    </div>
                                </li>
                                @foreach($data['shopcomment'] as $key => $item)
                                <li>
                                    <div class="li_your_listing">
                                        {{$item->name}}
                                    </div>
                                    <div class="li_your_listing">
                                        @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                            {{jdate($item->created_at)->format('%d %B %y')}}
                                        @else
                                            {{$item->created_at}}
                                        @endif
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->email}}
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->rate_quality}}
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->rate_speed}}
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->rate_price}}
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#show_comment_{{$key}}" data-toggle="modal"
                                           class="btn btn-success text-light">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <input type="checkbox" data_shop="" class="Approved_comments">
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="show_comment_{{$key}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                {{$item->comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['shopcomment'] as $key => $item)
                                    <li>
                                        <div class="title">
                                            {{$item->name}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.date")</span>
                                                @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                @else
                                                    <span>{{$item->created_at}}</span>
                                                @endif
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.email")</span>
                                                <span>{{$item->email}}</span>
                                            </div>
                                            <div class="items">
                                                <span>{{$item->rate_quality}}</span>
                                                <span>{{$item->rate_quality}}</span>
                                            </div>
                                            <div class="items">
                                                <span>{{$item->rate_speed}}</span>
                                                <span>{{$item->rate_speed}}</span>
                                            </div>
                                            <div class="items">
                                                <span>{{$item->rate_price}}</span>
                                                <span>{{$item->rate_price}}</span>
                                            </div>

                                            <div class="items mb-2">
                                                <span>@lang("text.show_comemnt")</span>
                                                <span>
                                                        <a data-target="#show_comment_mobile_{{$key}}" data-toggle="modal"
                                                           class="btn btn-success text-light">
                                                            <i class="fal fa-eye"></i>
                                                        </a>
                                                    </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.confirm_comment")</span>
                                                <span>
                                                        <input type="checkbox" class="approved_comment_mobile">
                                                    </span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.delete")</span>
                                                <span>
                                                        <a href="#" class="btn btn-danger">
                                                            <i class="fal fa-trash-alt"></i>
                                                        </a>
                                                    </span>
                                            </div>
                                        </div>
                                    </li>
                                    <div class="modal fade edit_custom_modal" id="show_comment_mobile_{{$key}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                {{$item->comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="food_comment" class="col-12 item_dashboard food_comment" style="display: none;">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.fullName")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.email")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.store_name")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.food_name")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.show_comemnt")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.confirm_comment")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.delete")
                                    </div>
                                </li>
                                @foreach($data['food_co'] as $item)
                                <li>
                                    <div class="li_your_listing">
                                        {{$item->name}}
                                    </div>
                                    <div class="li_your_listing">
                                        @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                            {{jdate($item->created_at)->format('%d %B %y')}}
                                        @else
                                            {{$item->created_at}}
                                        @endif
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->email}}
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->Shop[app()->getLocale()]}}
                                    </div>
                                    <div class="li_your_listing">
                                        {{$item->Menu[app()->getLocale()]}}
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#show_comment_food_{{$item->id}}" data-toggle="modal"
                                           class="btn btn-success text-light">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <input type="checkbox" {{$item->submit == 1 ? "checked" : ""}} data_type="food" data_id="{{$item->id}}" class="submit_comment Approved_comments">
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="show_comment_food_{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal text-{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? "right" : "left"}}">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment text-{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? "right" : "left"}}">
                                                            <p>
                                                                {{$item->comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['food_co'] as $key => $item)
                                    <li>
                                        <div class="title">
                                            {{$item->name}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.date")</span>
                                                @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                @else
                                                    <span>{{$item->created_at}}</span>
                                                @endif
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.email")</span>
                                                <span>{{$item->email}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.store_name")</span>
                                                <span>{{$item->Shop[app()->getLocale()]}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.food_name")</span>
                                                <span>{{$item->Menu[app()->getLocale()]}}</span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.show_comemnt")</span>
                                                <span>
                                                        <a data-target="#show_comment_food_mobile_{{$key}}" data-toggle="modal"
                                                           class="btn btn-success text-light">
                                                            <i class="fal fa-eye"></i>
                                                        </a>
                                                    </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.confirm_comment")</span>
                                                <span>
                                                        <input type="checkbox" {{$item->submit == 1 ? "checked" : ""}} data_type="food" data_id="{{$item->id}}" class="submit_comment Approved_comments">
                                                    </span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.delete")</span>
                                                <span>
                                                        <a href="#" class="btn btn-danger">
                                                            <i class="fal fa-trash-alt"></i>
                                                        </a>
                                                    </span>
                                            </div>
                                        </div>
                                    </li>
                                    <div class="modal fade edit_custom_modal" id="show_comment_food_mobile_{{$key}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger text-{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? "right" : "left"}}">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment text-{{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? "right" : "left"}}">
                                                            <p>
                                                                {{$item->comment}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="client_message" class="col-12 item_dashboard client_message" style="display: none;">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.fullName")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.email")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.show_comemnt")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.delete")
                                    </div>
                                </li>
                                <li>
                                    <div class="li_your_listing">
                                        مرتضی حلاجی
                                    </div>
                                    <div class="li_your_listing">
                                        1399/07/07
                                    </div>
                                    <div class="li_your_listing">
                                        Berkeh.tech@gmail
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#client_message_1" data-toggle="modal"
                                           class="btn btn-success text-light">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="li_your_listing">
                                        مرتضی حلاجی
                                    </div>
                                    <div class="li_your_listing">
                                        1399/07/07
                                    </div>
                                    <div class="li_your_listing">
                                        Berkeh.tech@gmail
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#client_message_2" data-toggle="modal"
                                           class="btn btn-success text-light">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="li_your_listing">
                                        مرتضی حلاجی
                                    </div>
                                    <div class="li_your_listing">
                                        1399/07/07
                                    </div>
                                    <div class="li_your_listing">
                                        Berkeh.tech@gmail
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#client_message_3" data-toggle="modal"
                                           class="btn btn-success text-light">
                                            <i class="fal fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_3">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                <li>
                                    <div class="title">
                                        پیام مششتری
                                    </div>
                                    <div class="list_item_shop" style="display: none;">
                                        <div class="items">
                                            <span>نام</span>
                                            <span>مرتضی حلاجی</span>
                                        </div>
                                        <div class="items">
                                            <span>تاریخ</span>
                                            <span>1399/07/07</span>
                                        </div>
                                        <div class="items">
                                            <span>ایمیل</span>
                                            <span>berkeh.tech@gmail</span>
                                        </div>
                                        <div class="items mb-2">
                                            <span>نمایش نظر</span>
                                            <span>
                                                    <a data-target="#client_message_mobile_3" data-toggle="modal"
                                                       class="btn btn-success text-light">
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                </span>
                                        </div>
                                        <div class="items">
                                            <span>حذف</span>
                                            <span>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fal fa-trash-alt"></i>
                                                    </a>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_mobile_1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="title">
                                        پیام مشتری
                                    </div>
                                    <div class="list_item_shop" style="display: none;">
                                        <div class="items">
                                            <span>نام</span>
                                            <span>مرتضی حلاجی</span>
                                        </div>
                                        <div class="items">
                                            <span>تاریخ</span>
                                            <span>1399/07/07</span>
                                        </div>
                                        <div class="items">
                                            <span>ایمیل</span>
                                            <span>berkeh.tech@gmail</span>
                                        </div>
                                        <div class="items mb-2">
                                            <span>نمایش نظر</span>
                                            <span>
                                                    <a data-target="#client_message_mobile_3" data-toggle="modal"
                                                       class="btn btn-success text-light">
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                </span>
                                        </div>
                                        <div class="items">
                                            <span>حذف</span>
                                            <span>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fal fa-trash-alt"></i>
                                                    </a>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_mobile_2">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <li>
                                    <div class="title">
                                        پیام مشتری
                                    </div>
                                    <div class="list_item_shop" style="display: none;">
                                        <div class="items">
                                            <span>نام</span>
                                            <span>مرتضی حلاجی</span>
                                        </div>
                                        <div class="items">
                                            <span>تاریخ</span>
                                            <span>1399/07/07</span>
                                        </div>
                                        <div class="items">
                                            <span>ایمیل</span>
                                            <span>berkeh.tech@gmail</span>
                                        </div>
                                        <div class="items mb-2">
                                            <span>نمایش نظر</span>
                                            <span>
                                                    <a data-target="#client_message_mobile_3" data-toggle="modal"
                                                       class="btn btn-success text-light">
                                                        <i class="fal fa-eye"></i>
                                                    </a>
                                                </span>
                                        </div>
                                        <div class="items">
                                            <span>حذف</span>
                                            <span>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fal fa-trash-alt"></i>
                                                    </a>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                                <div class="modal fade edit_custom_modal" id="client_message_mobile_3">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="close_modal bg-danger">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="modal_comment">
                                                            <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing
                                                                elit. Animi repellendus sunt saepe corrupti
                                                                adipisci, necessitatibus obcaecati culpa officia.
                                                                Error dolorem facilis
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div id="dav" class="col-12 item_dashboard dav" style="display: none;">
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        عنوان پلن تبلیغاتی
                                    </div>
                                    <div class="li_title_your_listing">
                                        مدت زمان
                                    </div>
                                    <div class="li_title_your_listing">
                                        قیمت
                                    </div>
                                    <div class="li_title_your_listing">
                                        توضیحات
                                    </div>
                                    <div class="li_title_your_listing">
                                        سفارش
                                    </div>
                                </li>
                                <li>
                                    <div class="li_your_listing">
                                        رستوران برکه
                                    </div>
                                    <div class="li_your_listing">
                                        یک ماه
                                    </div>
                                    <div class="li_your_listing">
                                        300000 تومان
                                    </div>
                                    <div class="li_your_listing">
                                        <a data-target="#Advertise_1" data-toggle="modal" class="btn btn-success text-light">
                                            <i class="fal fa-file-edit"></i>
                                        </a>
                                    </div>
                                    <div class="li_your_listing">
                                        <a href="#" class="btn btn-danger">
                                            <i class="fal fa-ad"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <div class="modal fade edit_custom_modal modal_advertise" id="Advertise_1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="close_modal bg-danger">
                                                        <i class="fal fa-times"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="description_advertise">
                                                        <p>
                                                            Lorem ipsum dolor, sit amet consectetur
                                                            adipisicing elit. Ullam ipsam dolorum at et
                                                            sapiente, facere laudantium fuga magni error
                                                            reiciendis, corporis officiis! Qui eius
                                                            natus possimus odio magni, nulla
                                                            exercitationem.
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                <li>
                                    <div class="title">
                                        برکه
                                    </div>
                                    <div class="list_item_shop" style="display: none;">
                                        <div class="items">
                                            <span>عنوان پلن تبلیغاتی</span>
                                            <span>رستوران برکه</span>
                                        </div>
                                        <div class="items">
                                            <span>مدت زمان</span>
                                            <span>یک ماه</span>
                                        </div>
                                        <div class="items">
                                            <span>قیمت</span>
                                            <span>300000 تومان</span>
                                        </div>
                                        <div class="items mb-2">
                                            <span>توضیحات</span>
                                            <span>
                                                    <a data-target="#Advertise_mobile_1" data-toggle="modal"
                                                       class="btn btn-success text-light">
                                                        <i class="fal fa-file-edit"></i>
                                                    </a>
                                                </span>
                                        </div>
                                        <div class="items mb-2">
                                            <span>سفارش</span>
                                            <span>
                                                    <a href="#" class="btn btn-danger">
                                                        <i class="fal fa-ad"></i>
                                                    </a>
                                                </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="modal fade edit_custom_modal modal_advertise" id="Advertise_mobile_1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="close_modal bg-danger">
                                                        <i class="fal fa-times"></i>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="description_advertise">
                                                        <p>
                                                            Lorem ipsum dolor, sit amet consectetur
                                                            adipisicing elit. Ullam ipsam dolorum at et
                                                            sapiente, facere laudantium fuga magni error
                                                            reiciendis, corporis officiis! Qui eius
                                                            natus possimus odio magni, nulla
                                                            exercitationem.
                                                        </p>
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
            swal("@lang("text.exit_panel")", {
                buttons: {
                    cancel: "@lang("text.cansel")",
                    catch: {
                        text: "@lang("text.exit")",
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
                url: "{{route('main.GetProvince')}}",
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
                url: "{{route('main.GetCity')}}",
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
            swal("@lang("text.close_message_ticket")", {
                buttons: {
                    cancel: "@lang('text.close')",
                    catch: {
                        text: "@lang("text.close")",
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
                            swal('@lang("text.success_closed")', {
                                icon: 'success'
                            })
                        }
                    }
                });
            });
        });

        $('body').on('click', '.enable_tax', function () {
            $shop_id = $(this).attr('data-id');
            axios.post("{{route('business.tax')}}", {
                shop: $shop_id,
            })
                .then(function (response) {
                        swal({
                            icon: "success",
                            text: "@lang("text.success_submited")"
                        })
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
        $('body').on('change', '.service_charge', function () {
            $shop_id = $(this).attr('data-id');
            $price = $(this).val();
            axios.post("{{route('business.service_charge')}}", {
                shop: $shop_id,
                price : $price
            })
                .then(function (response) {

                })
                .catch(function (error) {
                    console.log(error);
                });
        })
        $('body').on('click', '.submit_comment', function () {
            $comment_id = $(this).attr('data_id');
            $comment_type = $(this).attr('data_type');
            if($comment_type == "food"){
                $url = "{{route('submitComment.Food')}}";
            }
            axios.post($url, {
                comemnt_id: $comment_id,
            })
                .then(function (response) {
                    swal({
                        icon: "success",
                        text: "@lang("text.success_submited")"
                    })
                })
                .catch(function (error) {

                });
        })
    </script>
@endsection
