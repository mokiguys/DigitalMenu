@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Marketer Panel | Minemenu</title>
@endsection
@section('main')

    <!-- start section -->
    <div class="business_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="content_account">
                            <li class="box_dashboard" data-target="wallet_sec">
                                <a href="#" class="active">
                                    @lang("text.wallet")
                                    <div class="icon_account">
                                        <i class="fal fa-wallet"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="box_dashboard" data-target="information_sec">
                                <a href="#" class="">
                                    @lang("text.change_personal_data")
                                    <div class="icon_account">
                                        <i class="fal fa-edit"></i>
                                    </div>
                                </a>
                            </li>
                            @if(auth()->user()->confirm_admin == 1)
                                <li class="box_dashboard" data-target="list_transaction_sec">
                                    <a href="#" class="">
                                        @lang("text.deposit_list")
                                        <div class="icon_account">
                                            <i class="fal fa-money-check-edit-alt"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="list_shop_sec">
                                    <a href="#" class="">
                                        @lang("text.shopList")
                                        <div class="icon_account">
                                            <i class="fal fa-store"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard">
                                    <a href="{{route('plans')}}" class="">
                                        @lang("text.add_store")
                                        <div class="icon_account">
                                            <i class="fal fa-store-alt"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="list_transaction_shop_sec">
                                    <a href="#" class="">
                                        @lang("text.list_transaction_stores")
                                        <div class="icon_account">
                                            <i class="fal fa-money-check-alt"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="box_dashboard" data-target="list_marketer">
                                    <a href="#" class="">
                                        @lang("text.list_of_marketers")
                                        <div class="icon_account">
                                            <i class="fal fa-user"></i>
                                        </div>
                                    </a>
                                </li>
                            @endif
                            <li class="box_dashboard exit-class">
                                <a href="#" class="">
                                    @lang("text.exit")
                                    <div class="icon_account">
                                        <i class="fal fa-lock-open"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 item_dashboard wallet_sec">
                    <div class="wallet">
                        <h4 class="font-weight-bold">
                            @lang("text.wallet")
                        </h4>
                        <div class="holder_wallet">
                            <div class="text_wallet">
                                <p>
                                    @lang("text.wallet_balance")
                                    : {{auth()->user()->wallet}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                </p>
                                <small>
                                    @lang("text.min_balance")
                                    : {{$data['setting'][0]->min_price}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                </small>
                            </div>
                            <div class="input_wallet">
                                <a href="#" class="btn btn-info">
                                    @lang("text.requiest_balance")
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 item_dashboard information_sec" style="display: none;">
                    <div class="edit_information">
                        <h5 class="font-weight-bold mb-4">
                            @lang("text.change_personal_data")
                        </h5>
                        <form action="{{route('marketer.update.user')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                @if ($errors->any())
                                    <div class="col-12">
                                        <div class="alert alert-danger">
                                            <ul style="{{app()->getLocale() == "fa" ? "padding-right:10px;text-align:right" : ""}}">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <div class="edit_input">
                                        <input type="text" name="fullname" id="fullname"
                                               placeholder="@lang("text.fullName")"
                                               value="{{old('name',auth()->user()->name)}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="edit_input">
                                        <input type="text" name="phone" id="phone"
                                               placeholder="@lang("text.phone")"
                                               value="{{old('phone',auth()->user()->phone)}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="edit_input">
                                        <input type="email" name="email" id="email" placeholder="@lang("text.email")"
                                               value="{{old('email',auth()->user()->email)}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="edit_input">
                                        <input type="text" name="address" id="address"
                                               placeholder="@lang("text.address")"
                                               value="{{old('address',auth()->user()->address)}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="edit_input">
                                        <select name="country" id="country" class="country">
                                            <option value="0" selected disabled>@lang("text.select_default")
                                            </option>
                                            @foreach($data['country'] as $item)
                                                <option
                                                    value="{{$item->id}}" {{auth()->user()->country == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="edit_input">
                                        <select name="province" id="province" class="province">
                                            <option value="0" selected disabled>@lang("text.select_default")
                                            </option>
                                            @foreach($data['province'] as $item)
                                                <option
                                                    value="{{$item->id}}" {{auth()->user()->province == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="edit_input">
                                        <select name="city" id="city" class="city">
                                            <option value="0" selected disabled>@lang("text.select_default")
                                            </option>
                                            @foreach($data['city'] as $item)
                                                <option
                                                    value="{{$item->id}}" {{auth()->user()->city == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="edit_input">
                                        <input type="text" name="bank_num" id="bank_num"
                                               placeholder="@lang("text.bank_card_number")"
                                               value="{{old('bunk_num',auth()->user()->bank_num)}}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="edit_input">
                                        <input type="text" name="bank_name" id="bank_name"
                                               placeholder="@lang("text.bank_name")"
                                               value="{{old('bank_name',auth()->user()->bank_name)}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="edit_information_input">
                                        <input type="submit" id="edit_information"
                                               class="btn btn-info" value="@lang("text.submit")">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h5 class="font-weight-bold mb-4">
                            @lang("text.change_password_data")
                        </h5>
                        <form method="POST" action="{{route('marketer.update.password')}}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="current_password">
                                        <label for="current_password">
                                            @lang("text.current_password")
                                        </label>
                                        <span class="pass_input">
                                                <input type="password" id="current_password" class="form-control"
                                                       name="current_password">
                                            </span>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="new_password">
                                        <label for="new_password">
                                            @lang("text.new_password")
                                        </label>
                                        <span class="pass_input">
                                                <input type="password" class="form-control" id="new_password"
                                                       name="new_password">
                                            </span>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="confirm_new_password">
                                        <label for="confirm_new_password">
                                            @lang("text.confirm_new_password")
                                        </label>
                                        <span class="pass_input">
                                                <input type="password" class="form-control" id="confirm_new_password"
                                                       name="confirm_password">
                                            </span>
                                    </div>
                                </div>
                                <div class="col-12 submit_account">
                                    <input type="submit" class="btn btn-warning"
                                           value="@lang("text.change_password_data")">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 item_dashboard list_transaction_sec" style="display: none;">
                    <div class="shops_list payment_list">
                        <h4>
                            @lang("text.deposit_list")
                        </h4>
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.row")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.type_transaction")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.amount")
                                    </div>
                                </li>
                                @foreach($data['marketer'] as $key => $item)
                                    <li>
                                        <div class="li_your_listing">
                                            {{$key+1}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{jdate($item->created_at)->format('%d %B %y')}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->transaction == 1 ? __("text.increase") : __("text.decrease")}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->money}} {{app()->getLocale() == "fa" || app()->getLocale() == "ar" ? __("text.rial") : __("text.lira")}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['marketer'] as $key => $item)
                                    <li>
                                        <div class="title">
                                            {{$item->transaction == 1 ? __("text.increase") : __("text.decrease")}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>{{__("text.row")}}</span>
                                                <span>{{$key+1}}</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.date")</span>
                                                <span>{{jdate($item->created_at)->format('%d %B %y')}}1399</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.type_transaction")</span>
                                                <span>
                                                 {{$item->transaction == 1 ? __("text.increase") : __("text.decrease")}}
                                            </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.amount")</span>
                                                <span>
                                                  {{$item->money}}  {{$item->transaction == 1 ? __("text.increase") : __("text.decrease")}}
                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 item_dashboard list_shop_sec" style="display: none;">
                    <div class="shops_list payment_list custom_li">
                        <h4>
                            @lang("text.shopList")
                        </h4>
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.store_name")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.plan")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang('text.store_confirmation')
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.edit_shop")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.edit_menu")
                                    </div>
                                </li>
                                @foreach($data['shop'] as $item)
                                    <li>
                                        <div class="li_your_listing">
                                            {{$item[app()->getLocale()]}}
                                        </div>
                                        <div class="li_your_listing">
                                            {{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}
                                        </div>
                                        <div class="li_your_listing">
                                            @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                {{jdate($item->created_at)->format('%d %B %y')}}
                                            @else
                                                {{$item->created_at}}
                                            @endif
                                        </div>
                                        <div class="li_your_listing">
                                            <span class="text-{{$item->confirmAdmin == 0 ? "error" : "success"}}">
                                                {{$item->confirmAdmin == 0 ? __("text.not_approved") : __("text.accepted")}}
                                            </span>
                                        </div>
                                        <div class="li_your_listing">
                                            <a data-target="#edit_menu_mobile_{{$item->id}}" data-toggle="modal"
                                               class="btn btn-success text-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="li_your_listing">
                                            <a href="{{route('user_menu.index',['shop'=>$item->id])}}"
                                               class="btn btn-warning text-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['shop'] as $item)
                                    <li>
                                        <div class="title">
                                            {{$item[app()->getLocale()]}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.plan")</span>
                                                <span>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</span>
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
                                                <span>@lang('text.store_confirmation')</span>
                                                <span class="text-{{$item->confirmAdmin == 0 ? "error" : "success"}}">
                                                {{$item->confirmAdmin == 0 ? __("text.not_approved") : __("text.accepted")}}
                                            </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.edit_shop")</span>
                                                <span>
                                                     <a data-target="#edit_menu_mobile_{{$item->id}}"
                                                        data-toggle="modal"
                                                        class="btn btn-success text-light">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="items mb-2">
                                                <span>@lang("text.edit_menu")</span>
                                                <span>
                                                    <a href="{{route('user_menu.index',['shop'=>$item->id])}}"
                                                       class="btn btn-warning text-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
                </div>
                <div class="col-12 item_dashboard list_transaction_shop_sec" style="display: none;">
                    <div class="transaction_list">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold">
                                    @lang("text.list_transaction_stores")
                                </h5>
                                <p class="font-weight-bold mt-5 mb-3">
                                    @lang("text.filter")
                                </p>
                            </div>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="transaction_input">
                                        <label for="by_data">@lang("text.from")</label>
                                        <div class="edit_input">
                                            <input type="date" name="by_data" id="by_data">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="transaction_input">
                                        <label for="up_to_data">@lang("text.to")</label>
                                        <div class="edit_input">
                                            <input type="date" name="up_to_data" id="up_to_data">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-5">
                                    <a href="#" class="btn btn-info transaction_filter">
                                        @lang("text.filter")
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <div class="shops_list">
                                    <div class="your_listing d-none d-lg-block">
                                        <!-- desktop -->
                                        <ul class="ul_your_listing">
                                            <li>
                                                <div class="li_title_your_listing">
                                                    @lang("text.store_name")
                                                </div>
                                                <div class="li_title_your_listing">
                                                    @lang("text.date")
                                                </div>
                                                <div class="li_title_your_listing">
                                                    @lang('text.plan')
                                                </div>
                                                <div class="li_title_your_listing">
                                                    @lang("text.type_transaction")
                                                </div>
                                                <div class="li_title_your_listing">
                                                    @lang("text.amount")
                                                </div>
                                                <div class="li_title_your_listing">
                                                    @lang("text.payment_result")
                                                </div>
                                            </li>
                                            @foreach($data['payment'] as $item)
                                                <li>
                                                    <div class="li_your_listing">
                                                        {{$item->store_name}}
                                                    </div>
                                                    <div class="li_your_listing">
                                                        {{jdate($item->created_at)->format('%d %B %y')}}
                                                    </div>
                                                    <div class="li_your_listing">
                                                        {{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}
                                                    </div>
                                                    <div class="li_your_listing">
                                                        {{$item->typePayment == 1 ? __("text.buy_a_plan") : __("text.recharge")}}
                                                    </div>
                                                    <div class="li_your_listing">
                                                        {{$item->price}} {{$item->currency == 1 ? __("text.rial") : __("text.lira")}}
                                                    </div>
                                                    <div class="li_your_listing">
                                                        {{$item->status_order == 0 ? __("text.unsuccessful") : __("text.success")}}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="list_shop_mobile d-lg-none">
                                        <!-- mobile -->
                                        <ul>
                                            @foreach($data['payment'] as $item)
                                                <li>
                                                    <div class="title">
                                                        {{$item->store_name}}
                                                    </div>
                                                    <div class="list_item_shop" style="display: none;">
                                                        <div class="items">
                                                            <span>@lang("text.payment_result")</span>
                                                            <span>{{$item->status_order == 0 ? __("text.unsuccessful") : __("text.success")}}</span>
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
                                                            <span>@lang("text.plan")</span>
                                                            <span>
                                                            {{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}
                                                        </span>
                                                        </div>
                                                        <div class="items">
                                                            <span>@lang("text.type_transaction")</span>
                                                            <span>
                                                                {{$item->typePayment == 1 ? __("text.buy_a_plan") : __("text.recharge")}}
                                                        </span>
                                                        </div>
                                                        <div class="items">
                                                            <span>@lang("text.amount")</span>
                                                            <span>
                                                                {{$item->price}} {{$item->currency == 1 ? __("text.rial") : __("text.lira")}}
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
                    </div>
                </div>
                <div class="col-12 item_dashboard list_marketer" style="display: none;">
                    <div class="shops_list payment_list">
                        <h4>
                            @lang("text.list_of_marketers")
                        </h4>
                        <div class="your_listing d-none d-lg-block">
                            <!-- desktop -->
                            <ul class="ul_your_listing">
                                <li>
                                    <div class="li_title_your_listing">
                                        @lang("text.fullName")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.registery_date")
                                    </div>
                                    <div class="li_title_your_listing">
                                        @lang("text.exact_date")
                                    </div>
                                </li>
                                @foreach($data['introduced'] as $value)
                                    <li>
                                        <div class="li_your_listing">
                                            {{$value->name}}
                                        </div>
                                        <div class="li_your_listing">
                                            @lang("text.dayBeen",["day" => $value->created_at->diffInDays(\Carbon\Carbon::now())])
                                        </div>
                                        <div class="li_your_listing">
                                            @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                {{jdate($item->created_at)->format('%d %B %y')}}
                                            @else
                                                {{$item->created_at}}
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="list_shop_mobile d-lg-none">
                            <!-- mobile -->
                            <ul>
                                @foreach($data['introduced'] as $value)
                                    <li>
                                        <div class="title">
                                            {{$value->name}}
                                        </div>
                                        <div class="list_item_shop" style="display: none;">
                                            <div class="items">
                                                <span>@lang("text.registery_date")</span>
                                                <span>@lang("text.dayBeen",["day" => $value->created_at->diffInDays(\Carbon\Carbon::now())])</span>
                                            </div>
                                            <div class="items">
                                                <span>@lang("text.exact_date")</span>
                                                @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                                                @else
                                                    <span>{{$item->created_at}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="up_button">
            <span>
                <i class="far fa-arrow-up"></i>
            </span>
    </div>
    </div>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <input type="submit" hidden id="logout">
    </form>
@endsection

@section('script')
    <script>
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
    </script>
@endsection
