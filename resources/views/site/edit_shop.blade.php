@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Edit Business | GoogleHall</title>
@endsection
@section('main')
    <!-- start add_listing section -->

    <div class="checkout-page add_listing_page">
        <div class="background-header">
            <div class="checkout-title text-center">
                <h1>@lang("text.edit_detail")</h1>
            </div>
        </div>
        <div class="container add_listing_section text-right">
            <form class="account" method="POST" enctype="multipart/form-data" action="{{route('Business.update',['business'=>$data['business']->id])}}">
                @csrf
                @method('patch')
                <input type="hidden" name="lang" value="{{$_GET['lang']}}">
                <div class="row">
                    <div class="col-12 custom_email_controll">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-email">
                                    @lang("text.email")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="email" id="custom-email" name="email"
                                           placeholder="name@example.com" value="{{$data['business']->email}}"
                                           class="text-left">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-country">
                                    @lang("text.name_business")
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" value="{{$data['business'][$_GET['lang']]}}"
                                           id="custom-listing-title" name="title">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-subtitle">
                                    @lang("text.slogan")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" id="custom-listing-subtitle"
                                           value="{{$data['business']['subtitle_' . $_GET['lang']]}}" name="subtitle"
                                           placeholder="@lang("text.ex_slogan")">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="location_user">
                                    @lang("text.How_display_position")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="alert alert-warning">
                                    <p class="mb-0">@lang("text.how_to_get_map")<a href="#" class="text-primary" download>@lang("text.here")</a>@lang("text.click")</p>
                                </div>
                                <label for="location" class="location_label">@lang("text.geographical")</label>
                                <input type="radio"
                                       {{$data['business']->AddressShop == 3 ? "checked" : ""}} name="AddressShop"
                                       value="3" id="location"
                                       class="input_location">
                                <label for="address" class="location_label">@lang("text.address")</label>
                                <input type="radio" name="AddressShop"
                                       {{$data['business']->AddressShop == 2 ? "checked" : ""}} value="2" id="address"
                                       class="input_location">
                                <label for="both" class="location_label">@lang("text.both")</label>
                                <input type="radio" name="AddressShop"
                                       {{$data['business']->AddressShop == 1 ? "checked" : ""}} value="1" id="both"
                                       class="input_location">
                            </div>
                        </div>
                        <div class="custom_content_location"
                             style="display: {{$data['business']->AddressShop != 1 ? ($data['business']->AddressShop == 3 ? "block" : "none") : "block"}}">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-location">
                                        @lang("text.geographical")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" id="custom-location" name="location"
                                               placeholder="75.66707" value="{{$data['business']->location}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_content_address"
                             style="display: {{$data['business']->AddressShop != 1 ? ($data['business']->AddressShop == 2 ? "block" : "none") : "block"}};">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-location">
                                        @lang("text.address")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" id="custom-address" value="{{$data['business']["address_".$_GET['lang']]}}" name="address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-amenities ">
                                    @lang("text.amenities")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="alert alert-warning">
                                    <p class="mb-0">@lang("text.auto_translate_amenities")</p>
                                </div>
                                <div class="">
                                    <select name="amenities[]" multiple data-placeholder="@lang("text.amenities")"
                                            id="custom-listing-amenities"
                                            class="custom-listing-amenities">
                                        @foreach($data['amenities'] as $item)
                                            <option value="{{$item->id}}" {{in_array($item->id,$data['business']->amenities()->pluck('id')->toArray()) ? "selected" : ""}}>{{$item[$_GET['lang']]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-description">
                                    @lang("text.brife_description_store")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                        <textarea name="description" id="custom-listing-description"
                                                  class="custom-listing-description" cols="30" rows="3">{{$data['business']["description_".$_GET['lang']]}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="">
                                    @lang("text.detail_work_hours")
                                </label>
                            </div>
                        </div>
                        <div class="operation_hours">
                            <div class="row">
                                <div class="col-4 p-0">
                                    <ul class="days">
                                        <li class="operation_hours_title">
                                            @lang("text.day")
                                        </li>
                                        <li>@lang("text.saturday")</li>
                                        <li>@lang("text.sunday")</li>
                                        <li>@lang("text.monday")li>
                                        <li>@lang("text.tuesday")</li>
                                        <li>@lang("text.wednesday")</li>
                                        <li>@lang("text.thursday")</li>
                                        <li>@lang("text.friday")</li>
                                    </ul>
                                </div>
                                @php
                                    $clock = $data['business']->clock;
                                    $clock = explode('**',$clock);
                                    $start = array();
                                    $finish = array();
                                        foreach ($clock as $item){
                                            $week_clock = explode('//',$item);
                                            array_push($start,$week_clock[0]);
                                            array_push($finish,$week_clock[1]);
                                        }
                                @endphp
                                <div class="col-4 p-0">
                                    <ul>
                                        <li class="operation_hours_title">
                                            @lang("text.start_of_work")
                                        </li>
                                        <li>
                                            <select name="operation_hours_saturday" id="operation_hours_saturday"
                                                    class="operation_hours_open">
                                                <option value="0" {{$start[0] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[0] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[0] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[0] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[0] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[0] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[0] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[0] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[0] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[0] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[0] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[0] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[0] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[0] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[0] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[0] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[0] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[0] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_open_sunday"
                                                    id="operation_hours_open_sunday" class="operation_hours_open">
                                                <option value="0" {{$start[1] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[1] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[1] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[1] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[1] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[1] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[1] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[1] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[1] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[1] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[1] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[1] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[1] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[1] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[1] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[1] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[1] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[1] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_monday" id="operation_hours_monday" class="operation_hours_open">
                                                <option value="0" {{$start[2] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[2] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[2] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[2] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[2] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[2] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[2] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[2] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[2] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[2] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[2] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[2] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[2] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[2] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[2] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[2] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[2] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[2] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_tuesday" id="operation_hours_tuesday" class="operation_hours_open">
                                                <option value="0" {{$start[3] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[3] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[3] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[3] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[3] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[3] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[3] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[3] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[3] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[3] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[3] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[3] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[3] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[3] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[3] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[3] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[3] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[3] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_wednesday" id="operation_hours_wednesday"
                                                    class="operation_hours_open">
                                                <option value="0" {{$start[4] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[4] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[4] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[4] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[4] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[4] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[4] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[4] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[4] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[4] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[4] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[4] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[4] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[4] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[4] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[4] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[4] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[4] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_thursday" id="operation_hours_thursday"
                                                    class="operation_hours_open">
                                                <option value="0" {{$start[5] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[5] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[5] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[5] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[5] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[5] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[5] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[5] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[5] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[5] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[5] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[5] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[5] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[5] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[5] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[5] == "21:00" ? "selected" : ""}}>21:00</option>
                                                <option value="22:00" {{$start[5] == "22:00" ? "selected" : ""}}>22:00</option>
                                                <option value="23:00" {{$start[5] == "23:00" ? "selected" : ""}}>23:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_friday" id="operation_hours_friday"
                                                    class="operation_hours_open">
                                                <option value="0" {{$start[6] == "0" ? "selected" : ""}}>@lang("text.closed")</option>
                                                <option value="1" {{$start[6] == "1" ? "selected" : ""}}>@lang("text.boarding")</option>
                                                <option value="8:00" {{$start[6] == "8:00" ? "selected" : ""}}>8:00</option>
                                                <option value="9:00" {{$start[6] == "9:00" ? "selected" : ""}}>9:00</option>
                                                <option value="10:00" {{$start[6] == "10:00" ? "selected" : ""}}>10:00</option>
                                                <option value="11:00" {{$start[6] == "11:00" ? "selected" : ""}}>11:00</option>
                                                <option value="12:00" {{$start[6] == "12:00" ? "selected" : ""}}>12:00</option>
                                                <option value="13:00" {{$start[6] == "13:00" ? "selected" : ""}}>13:00</option>
                                                <option value="14:00" {{$start[6] == "14:00" ? "selected" : ""}}>14:00</option>
                                                <option value="15:00" {{$start[6] == "15:00" ? "selected" : ""}}>15:00</option>
                                                <option value="16:00" {{$start[6] == "16:00" ? "selected" : ""}}>16:00</option>
                                                <option value="17:00" {{$start[6] == "17:00" ? "selected" : ""}}>17:00</option>
                                                <option value="18:00" {{$start[6] == "18:00" ? "selected" : ""}}>18:00</option>
                                                <option value="19:00" {{$start[6] == "19:00" ? "selected" : ""}}>19:00</option>
                                                <option value="20:00" {{$start[6] == "20:00" ? "selected" : ""}}>20:00</option>
                                                <option value="21:00" {{$start[6] == "21:00" ? "selected" : ""}}>20:00</option>
                                                <option value="22:00" {{$start[6] == "22:00" ? "selected" : ""}}>20:00</option>
                                                <option value="23:00" {{$start[6] == "23:00" ? "selected" : ""}}>20:00</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-4 p-0">
                                    <ul>
                                        <li class="operation_hours_title">
                                            @lang("text.end_of_work")
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_saturday"
                                                    id="operation_hours_close_saturday" class="operation_hours_close">
                                                <option {{$finish[0] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[0] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[0] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[0] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[0] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[0] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[0] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[0] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[0] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[0] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[0] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[0] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[0] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[0] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[0] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[0] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[0] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_sunday"
                                                    id="operation_hours_close_sunday" class="operation_hours_close">
                                                <option {{$finish[1] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[1] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[1] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[1] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[1] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[1] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[1] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[1] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[1] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[1] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[1] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[1] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[1] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[1] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[1] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[1] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[1] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_monday"
                                                    id="operation_hours_close_monday" class="operation_hours_close">
                                                <option {{$finish[2] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[2] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[2] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[2] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[2] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[2] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[2] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[2] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[2] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[2] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[2] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[2] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[2] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[2] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[2] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[2] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[2] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_tuesday"
                                                    id="operation_hours_close_tuesday" class="operation_hours_close">
                                                <option {{$finish[3] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[3] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[3] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[3] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[3] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[3] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[3] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[3] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[3] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[3] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[3] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[3] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[3] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[3] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[3] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[3] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[3] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_wednesday"
                                                    id="operation_hours_close_wednesday" class="operation_hours_close">
                                                <option {{$finish[4] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[4] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[4] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[4] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[4] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[4] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[4] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[4] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[4] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[4] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[4] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[4] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[4] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[4] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[4] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[4] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[4] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_thursday"
                                                    id="operation_hours_close_thursday" class="operation_hours_close">
                                                <option {{$finish[5] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[5] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[5] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[5] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[5] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[5] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[5] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[5] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[5] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[5] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[5] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[5] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[5] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[5] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[5] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[5] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[5] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="operation_hours_close_friday"
                                                    id="operation_hours_close_friday" class="operation_hours_close">
                                                <option {{$finish[6] == "8:00" ? "selected" : ""}} value="8:00">8:00</option>
                                                <option {{$finish[6] == "9:00" ? "selected" : ""}} value="9:00">9:00</option>
                                                <option {{$finish[6] == "10:00" ? "selected" : ""}} value="10:00">10:00</option>
                                                <option {{$finish[6] == "11:00" ? "selected" : ""}} value="11:00">11:00</option>
                                                <option {{$finish[6] == "12:00" ? "selected" : ""}} value="12:00">12:00</option>
                                                <option {{$finish[6] == "13:00" ? "selected" : ""}} value="13:00">13:00</option>
                                                <option {{$finish[6] == "14:00" ? "selected" : ""}} value="14:00">14:00</option>
                                                <option {{$finish[6] == "15:00" ? "selected" : ""}} value="15:00">15:00</option>
                                                <option {{$finish[6] == "16:00" ? "selected" : ""}} value="16:00">16:00</option>
                                                <option {{$finish[6] == "17:00" ? "selected" : ""}} value="17:00">17:00</option>
                                                <option {{$finish[6] == "18:00" ? "selected" : ""}} value="18:00">18:00</option>
                                                <option {{$finish[6] == "19:00" ? "selected" : ""}} value="19:00">19:00</option>
                                                <option {{$finish[6] == "20:00" ? "selected" : ""}} value="20:00">20:00</option>
                                                <option {{$finish[6] == "21:00" ? "selected" : ""}} value="21:00">21:00</option>
                                                <option {{$finish[6] == "22:00" ? "selected" : ""}} value="22:00">21:00</option>
                                                <option {{$finish[6] == "23:00" ? "selected" : ""}} value="23:00">23:00</option>
                                                <option {{$finish[6] == "24:00" ? "selected" : ""}} value="24:00">24:00</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="main_image">
                                    @lang("text.main_picture")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="alert alert-warning">
                                    <p class="mb-0">@lang("text.main_picture_description")</p>
                                </div>
                                @if($data['business']->main_image != "null" && $data['business']->main_image != null)
                                    <div class="parent_current_image_gallery">
                                        <div class="current_image_gallery">
                                            <img src="{{asset('site/uploader/shop/'.$data['business']->main_image)}}">
                                        </div>
                                    </div>
                                @endif
                                <div class="custom_feild">
                                    <input type="file" name="main_image" id="main_image" class="input_file">
                                    <small>
                                        @lang("text.max_size_image")
                                    </small>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="listing_logo">
                                    @lang("text.logo")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                @if($data['business']->logo != "null" && $data['business']->logo != null)
                                    <div class="parent_current_image_gallery">
                                        <div class="current_image_gallery">
                                            <img src="{{asset('site/uploader/shop/'.$data['business']->logo)}}">
                                        </div>
                                    </div>
                                @endif
                                <div class="custom_feild">
                                    <input type="file" name="logo" id="listing_logo" class="input_file">
                                    <small>
                                       @lang("text.max_size_image")
                                    </small>
                                    <br>
                                    <small>
                                        @lang("text.recommended_image_size")
                                        <br>
                                        <a href="https://agencyberkeh.com/Berif" style="color: #919191;">
                                            <span style="text-decoration: underline; color: #1c45ef;">@lang("text.dont_logo")</span>
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="image_gallery">@lang("text.photo_gallery")</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="holder_gallery">
                                    @if($data['business']->gallery_image1 != "null" && $data['business']->gallery_image1 != null)
                                        <div class="parent_current_image_gallery">
                                            <div class="current_image_gallery">
                                                <img src="{{asset('site/uploader/shop/'.$data['business']->gallery_image1)}}">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="custom_feild" style="width:100%;">
                                        <input type="file" name="image_gallery_1" id="image_gallery_1"
                                               class="input_file mb-3">
                                        @if($data['business']->gallery_image2 != "null" && $data['business']->gallery_image2 != null)
                                        <div class="parent_current_image_gallery">
                                            <div class="current_image_gallery">
                                                <img src="{{asset('site/uploader/shop/'.$data['business']->gallery_image2)}}">
                                            </div>
                                        </div>
                                        @endif
                                        <input type="file" name="image_gallery_2" id="image_gallery_2"
                                               class="input_file mb-3">
                                        @if($data['business']->gallery_image3 != "null" && $data['business']->gallery_image3 != null)
                                            <div class="parent_current_image_gallery">
                                                <div class="current_image_gallery">
                                                    <img src="{{asset('site/uploader/shop/'.$data['business']->gallery_image3)}}">
                                                </div>
                                            </div>
                                        @endif
                                        <input type="file" name="image_gallery_3" id="image_gallery_3"
                                               class="input_file mb-3">
                                        @if($data['business']->gallery_image4 != "null" && $data['business']->gallery_image4 != null)
                                            <div class="parent_current_image_gallery">
                                                <div class="current_image_gallery">
                                                    <img src="{{asset('site/uploader/shop/'.$data['business']->gallery_image4)}}">
                                                </div>
                                            </div>
                                        @endif
                                        <input type="file" name="image_gallery_4" id="image_gallery_4"
                                               class="input_file mb-3">
                                        @if($data['business']->gallery_image5 != "null" && $data['business']->gallery_image5 != null)
                                            <div class="parent_current_image_gallery">
                                                <div class="current_image_gallery">
                                                    <img src="{{asset('site/uploader/shop/'.$data['business']->gallery_image5)}}">
                                                </div>
                                            </div>
                                        @endif
                                        <input type="file" name="image_gallery_5" id="image_gallery_5"
                                               class="input_file mb-3">
                                        <small>
                                            @lang("text.photo_gallery_des_1")
                                            <br>
                                            @lang("text.photo_gallery_des_2")
                                            <br>
                                            @lang("text.max_size_image")
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="video_link">
                                    @lang("text.detail_video")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" name="video_link" id="video_link" value="{{$data['business']->video_link}}" class="input_file text-left"
                                           placeholder="https://www.aparat.com/v/9Ewhu">
                                    <small>@lang("text.des_video")</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="phone">
                                    @lang("text.tell")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="tel" name="tell" id="tell" value="{{$data['business']->tell}}" class="input_file text-left">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="fax">
                                    @lang("text.fax")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="tel" name="fax" id="fax" value="{{$data['business']->fax}}" class="input_file text-left">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="mobile">
                                    @lang("text.phone")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="tel" name="phone" id="phone" value="{{$data['business']->phone}}" class="input_file text-left">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="whatsapp">
                                    @lang("text.whatsapp")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" name="whatsapp" id="whatsapp" value="{{$data['business']->WhatsApp}}" class="input_file text-left">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="website">
                                    @lang("text.website")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" name="website" value="{{$data['business']->website}}" id="website" class="input_file text-left"
                                           placeholder="https://example.com">
                                    <small>
                                        <a href="https://berkehtech.com" style="color: #919191;"><span style="text-decoration: underline; color: #1c45ef;">@lang("text.dont_website")</span></a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="">
                                    @lang("text.social_media")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div>
                                    <input type="checkbox" class="input_checkbox_social_network">
                                    <small>
                                       @lang("text.social_detail")
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="custom_social_network" style="display: none;">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="facebook">
                                        @lang("text.facebook")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="facebook" value="{{$data['business']->facebook}}" id="facebook" class="input_file text-left"
                                               placeholder="@lang("text.social_link")">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="instagram">
                                        @lang("text.instagram")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="instagram" id="instagram" value="{{$data['business']->instagram}}" class="input_file text-left"
                                               placeholder="@lang("text.social_link")">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="youtube">
                                        @lang("text.youtube")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="youtube" id="youtube" value="{{$data['business']->youtube}}" class="input_file text-left"
                                               placeholder="@lang("text.social_link")">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="twitter">
                                        @lang("text.twitter")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="twitter" id="twitter" value="{{$data['business']->twitter}}" class="input_file text-left"
                                               placeholder="@lang("text.social_link")">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="telegram">
                                        @lang("text.telegram")
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="telegram" id="telegram" value="{{$data['business']->telegram}}" class="input_file text-left"
                                               placeholder="@lang("text.social_link")">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="">
                                    @lang("text.link")
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div>
                                    <input type="checkbox" class="input_checkbox_social_network">
                                    <small>
                                        @lang("text.more_link_des")
                                    </small>
                                </div>
                            </div>
                        </div>
                        @php
                        if($data['business']->external_link != null){
                            $external = $data['business']->external_link;
                            $external = explode('***',$external);
                            $titles = array();
                            $links = array();
                            foreach ($external as $item){
                                $aboslote_link = explode('!!!',$item);
                                array_push($titles,$aboslote_link[0]);
                                array_push($links,$aboslote_link[1]);
                            }
                            }
                        @endphp
                        <div class="custom_social_network" style="display: none;">
                            <div class="account_content row">
                                <div class="col-12 col-md-4 pb-2">
                                    <input type="text" name="title_link[]" placeholder="@lang("text.page_title")"
                                           class="input_title_link" value="{{$data['business']->external_link != null ? (array_key_exists(0,$titles) ? $titles[0] : "") : ""}}">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="link[]" class="input_file text-left"
                                               placeholder="@lang("text.social_link")" value="{{$data['business']->external_link != null ? (array_key_exists(0,$links) ? $links[0] : "") : ""}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4 pb-2">
                                    <input type="text" name="title_link[]" placeholder="@lang("text.page_title")"
                                           class="input_title_link" value="{{$data['business']->external_link != null ? (array_key_exists(1,$titles) ? $titles[1] : "") : ""}}">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="link[]" id="link2" class="input_file text-left"
                                               placeholder="@lang("text.social_link")" value="{{$data['business']->external_link != null ? (array_key_exists(1,$links) ? $links[1] : "") : ""}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4 pb-2">
                                    <input type="text" name="title_link[]" placeholder="@lang("text.page_title")"
                                           class="input_title_link" value="{{$data['business']->external_link != null ? (array_key_exists(2,$titles) ? $titles[2] : "") : ""}}">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="link[]" id="link3" class="input_file text-left"
                                               placeholder="@lang("text.social_link")" value="{{$data['business']->external_link != null ? (array_key_exists(2,$links) ? $links[2] : "") : ""}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="account_content row">
                                <div class="col-12 col-md-4 pb-2">
                                    <input type="text" name="title_link[]" placeholder="@lang("text.page_title")"
                                           class="input_title_link" value="{{$data['business']->external_link != null ? (array_key_exists(3,$titles) ? $titles[3] : "") : ""}}">
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" name="link[]" id="link3" class="input_file text-left"
                                               placeholder="@lang("text.social_link")" value="{{$data['business']->external_link != null ? (array_key_exists(3,$links) ? $links[3] : "") : ""}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 button_submit_job">
                        <input type="submit" class="btn" value="@lang("text.submit")">
                    </div>
                </div>
            </form>

        </div>

    </div>


@endsection
@section('script')
    <script>
        $(".custom-listing-province").select2({
            dir: "rtl"
        });
        $(".custom-listing-job").select2({
            dir: "rtl"
        });
        $(".custom-listing-country").select2({
            dir: "rtl"
        });
        $(".custom-listing-city").select2({
            dir: "rtl"
        });
        $(".custom-listing-amenities").select2({
            dir: "rtl"
        });
        $(".operation_hours_open").select2({
            dir: "rtl"
        });
        $(".operation_hours_close").select2({
            dir: "rtl"
        });
        $(".catalog_section").select2({
            dir: "rtl"
        });
    </script>

@endsection
