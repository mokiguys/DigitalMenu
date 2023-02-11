@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Bills | Minemenu</title>
@endsection
@section('main')
    <!-- section-bills -->

    <div class="bills_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>
                        @lang('text.bill')
                    </h1>
                </div>
                <div class="col-12">
                    <form action="{{route('bills.store')}}" method="POST">
                        @csrf
                        <div class="bills_form">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="bills_first_name">
                                            @lang('text.fullName')
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <input type="text" class="form-control" name="fullname"
                                               id="bills_first_name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="bills_mobile">
                                            @lang("text.phone")
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <input type="text" name="phone" id="bills_mobile"
                                               class="form-control text-left">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="country">
                                            @lang('text.country_single')
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="0" selected disabled>@lang('text.select_your_desired_country')</option>
                                            @foreach($data['country'] as $item)
                                                <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="province">
                                            @lang('text.province_single')
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <select name="province" id="province" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="city">
                                            @lang('text.city')
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <select name="city" id="city" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="bills_form_item">
                                        <label for="bills_address">
                                            @lang('text.address')
                                            <i class="fas fa-asterisk"></i>
                                        </label>
                                        <input type="text" name="address" class="form-control" id="bills_address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bills_form_item">
                                        <label for="bills_description">
                                            @lang('text.description')
                                        </label>
                                        <textarea name="description" id="bills_description" class="form-control"
                                                  cols="30"
                                                  rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bills_form_item">
                                        <label for="online_payment" class="label_radio">
                                            @lang('text.online_payment')
                                        </label>
                                        <input type="radio" name="way_payment" id="online_payment" disabled
                                               class="input_radio" value="1">
                                        <label for="location_payment" class="label_radio">
                                            @lang('text.payment_on_the_spot')
                                        </label>
                                        <input type="radio" name="way_payment" id="location_payment" checked
                                               class="input_radio" value="2">
                                    </div>
                                </div>
                                <div class="col-12 text-left">
                                    <div class="bills_form_input p-4">
                                        <input type="submit" class="btn btn-info" value="@lang('text.order_submit')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $("#bills_city").select2({
            dir: "rtl"
        });
        $("#bills_province").select2({
            dir: "rtl"
        });
        $("#bills_country").select2({
            dir: "rtl"
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
