@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Add Business | Minemenu</title>
@endsection
@section('main')

    <!-- start add_listing section -->

    <div class="checkout-page add_listing_page">
        <div class="background-header">
            <div class="checkout-title text-center">
                <h1>@lang('text.register_business')</h1>
            </div>
        </div>
        <div class="container add_listing_section text-right">
            <form class="account" action="{{route('Business.store')}}" method="post">
                <div class="row">
                    @csrf
                    @if(auth()->user()->user_type == 'Marketer')
                        <div class="col-12">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-listing-title">
                                        @lang('text.name_business_owner')
                                        <i class="fas fa-star-of-life star_icon"></i>
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" id="custom-listing-title" name="fullname">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-listing-title">
                                        @lang('text.email')
                                        <i class="fas fa-star-of-life star_icon"></i>
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" id="custom-listing-title" name="email">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-listing-title">
                                        @lang('text.password')
                                        <i class="fas fa-star-of-life star_icon"></i>
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="text" id="custom-listing-title" name="password">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endif

                    @if(auth()->user()->user_type == 'User')
                        <div class="col-12">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label class="custom_label_account">
                                        <p>@lang('text.add_new_business')</p>
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="account_text">

                                        <span><b>{{auth()->user()->name}} </b>@lang('text.description_add_new_business')</span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 custom_email_controll">
                            <div class="account_content row">
                                <div class="col-12 col-md-4">
                                    <label for="custom-email">
                                        @lang('text.demo_email')
                                    </label>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="custom_feild">
                                        <input type="email" id="custom-email" name="custom_email"
                                               placeholder="name@example.com" class="text-left">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endif

                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-title">
                                   @lang('text.name_business')
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <input type="text" id="custom-listing-title" name="title">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-warning">
                            <p class="mb-0">@lang('text.text_warning_register')</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-job">
                                    @lang('text.business_type')
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <select name="category_id" id="custom-listing-job"
                                            class="custom-listing-job">
                                        <option value="0" selected disabled>@lang('text.choose_your_business')</option>
                                        @foreach($data['categoryStore'] as $item)
                                            <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
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
                                <label for="custom-listing-country">
                                    @lang('text.country_single')
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <select name="country" id="custom-listing-country"
                                            class="custom-listing-country">
                                        <option value="0" selected disabled>@lang('text.select_your_desired_country')</option>
                                        @foreach($data['country'] as $item)
                                            <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <input type="hidden" value="{{Request::segment(2)}}" name="type">
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-province">
                                    @lang('text.province_single')
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <select name="province" id="custom-listing-province"
                                            class="custom-listing-province">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="account_content row">
                            <div class="col-12 col-md-4">
                                <label for="custom-listing-city">
                                    @lang('text.city')
                                    <i class="fas fa-star-of-life star_icon"></i>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="custom_feild">
                                    <select name="city" id="custom-listing-city"
                                            class="custom-listing-city">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 button_submit_job">
                        <input type="submit" name="submit_job" class="btn" value="ثبت اطلاعات">
                    </div>
                </div>
            </form>

        </div>

    </div>
    <div class="up_button">
            <span>
                <i class="far fa-arrow-up"></i>
            </span>
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
        $("#custom-listing-country").change(function () {
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
                    $("#custom-listing-province").html($html)
                }
            });
        });
        $("#custom-listing-province").change(function () {
            $province = $(this).val();
            $country = $("#custom-listing-country").val();
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
                    $("#custom-listing-city").html($html)
                }
            });
        });
    </script>
@endsection
