@extends('admin.layouts.master')
@section('title')
    <title>ویرایش اطلاعات کاربر</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">ویرایش اطلاعات
                            کاربر</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('marketer.update',$data['user']->id)}}"
                              enctype="multipart/form-data">
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ol class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">نام</label>
                                <input type="text" name="name" class="form-control pt-1" id="name"
                                       value="{{$data['user']->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">ایمیل</label>
                                <input type="email" name="email" class="form-control pt-1" id="email"
                                       value="{{$data['user']->email}}">
                            </div>
                            <div class="form-group">
                                <label for="phone"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">شماره همراه</label>
                                <input type="text" name="phone" class="form-control pt-1" id="phone"
                                       value="{{$data['user']->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="Introduced"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">معرف</label>
                                <input type="text" name="Introduced" class="form-control pt-1" id="Introduced"
                                       value="{{$data['user']->Introduced}}">
                            </div>
                                <div class="form-group">
                                    <label for="country"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">کشور</label>
                                    <select name="country" id="country"
                                            class="form-control pt-1">
                                        @foreach(\App\Country::all() as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data['user']->country ? "selected" : "" }}>{{$item[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="province"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">استان</label>
                                    <select name="province" id="province"
                                            class="form-control pt-1">
                                        @foreach(\App\Province::all() as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data['user']->province ? "selected" : "" }}>{{$item[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">شهر</label>
                                    <select name="city" id="city"
                                            class="form-control pt-1">
                                        @foreach(\App\City::all() as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data['user']->city ? "selected" : "" }}>{{$item[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">آدرس</label>
                                    <input type="text" name="address" class="form-control pt-1" id="address"
                                           value="{{$data['user']->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="bank_name"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">نام بانک</label>
                                    <input type="text" name="bank_name" class="form-control pt-1" id="bank_name"
                                           value="{{$data['user']->bank_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="bank_num"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">شماره کارت</label>
                                    <input type="text" name="bank_num" class="form-control pt-1" id="bank_num"
                                           value="{{old('bunk_num',$data['user']->bank_num)}}">
                                </div>
                            <button type="submit"
                                    class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                        </form>
                    </div>
                </div>
            </div>
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
                    $html = '<option value="0" selected disabled>@lang("text.select_default")</option>';
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
                    $html = '<option value="0" selected disabled>@lang("text.select_default")</option>';
                    for ($i = 0; $i < $data.length; $i++) {
                        $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                    }
                    $("#city").html($html)
                }
            });
        });
    </script>
@endsection
