@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.shopAdd')</title>
@endsection
@section('main')
    {{old('useDefaultUser')}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.shopAdd')</h4>
                        <form class="forms-sample" method="post" action="{{route('shop.store')}}"
                              enctype="multipart/form-data">
                            @if($errors->any())
                                <div class="alert alert-danger {{app()->getLocale() != "fa" ? "" : "text-right"}}">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf

                            <div class="form-group {{app()->getLocale() != "fa" ? "" : "text-right"}}">
                                <input type="checkbox"
                                       {{old('result_check_user') != null ? old('result_check_user') == 0 ? "" : 'checked' : 'checked'}} id="useDefaultUser"
                                       value="{{old('result_check_user') != null ? old('result_check_user') == 0 ? 0 : 1 : 1}}">
                                <label for="useDefaultUser" style="margin-top: 3px;">@lang('text.new_user')</label>
                                <input type="hidden" name="result_check_user" value="{{old('result_check_user')}}"
                                       class="value_user_input_check">
                            </div>
                            {{old('useDefaultUser')}}
                            <div class="form-group old_user"
                                 style="display:{{old('result_check_user') != null ? old('result_check_user') == 0 ? "none" : 'block' : 'block'}}">
                                <label for="old_user"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.user')</label>
                                <select name="old_user" id="old_user" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    @foreach($data['users'] as $value)
                                        <option
                                            value="{{$value->id}}">{{"Name : " . $value->name ." / Email : " . $value->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group new_user"
                                 style="display:{{old('result_check_user') != null ? old('result_check_user') == 0 ? "block" : 'none' : 'none'}}">
                                <label for="fullName"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.fullName')</label>
                                <input type="text" name="fullName" class="form-control pt-1" id="fullName"
                                       value="{{old('fullName')}}">
                            </div>
                            <div class="form-group new_user"
                                 style="display:{{old('result_check_user') != null ? old('result_check_user') == 0 ? "block" : 'none' : 'none'}}">
                                <label for="email"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.email')</label>
                                <input type="text" name="email" class="form-control pt-1" id="email"
                                       value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="title"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title')</label>
                                <input type="text" name="title" class="form-control pt-1" id="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="form-group {{app()->getLocale() != "fa" ? "" : "text-right"}}">
                                <input type="checkbox"
                                       {{old('result_check_email') != null ? old('result_check_email') == 0 ? "" : 'checked' : 'checked'}} id="useDefaultEmail"
                                       value="{{old('result_check_email') != null ? old('result_check_email') == 0 ? 0 : 1 : 1}}">
                                <label for="useDefaultEmail" style="margin-top: 3px;">@lang('text.text_email')</label>
                                <input type="hidden" name="result_check_email" value="{{old('result_check_email')}}"
                                       class="value_email_input_check">
                            </div>
                            <div class="form-group emailStore"
                                 style="display:{{old('result_check_email') != null ? old('result_check_email') == 0 ? "block" : 'none' : 'none'}}">
                                <label for="emailShop"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.emailShop')</label>
                                <input type="text" name="emailShop" class="form-control pt-1" id="emailShop"
                                       value="{{old('emailShop')}}">
                            </div>
                            <div class="form-group">
                                <label for="country"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.country')</label>
                                <select name="country" id="country" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    @foreach($data['country'] as $value)
                                        <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="province"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.province')</label>
                                <select name="province" id="province" class="form-control pt-1">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.cities')</label>
                                <select name="city" id="city" class="form-control pt-1">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                <select name="category_id" id="category_id" class="form-control pt-1">
                                    @foreach($data['categoryStore'] as $value)
                                        <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="plan"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.select_plan')</label>
                                <select name="plan" id="plan" class="form-control pt-1">
                                        <option value="1">Free</option>
                                        <option value="2">Standard</option>
                                        <option value="3">Premium</option>
                                </select>
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
        $(function () {
            $("#useDefaultEmail").click(function () {
                $value = $(this).val();
                if ($value == 1) {
                    $(".emailStore").fadeIn(300);
                    $(this).val(0);
                    $(".value_email_input_check").val(0);
                } else {
                    $(".emailStore").fadeOut(300);
                    $(this).val(1);
                    $(".value_email_input_check").val(1);
                }
            })

            $("#useDefaultUser").click(function () {
                $value = $(this).val();
                $width = $("#title").width();
                if ($value == 1) {
                    $(".new_user").fadeIn(300);
                    $(".old_user").fadeOut(300);
                    $(this).val(0);
                    $(".value_user_input_check").val(0);
                } else {
                    $(".new_user").fadeOut(300);
                    $(".old_user").fadeIn(300);
                    $(".select2").css('width', $width);
                    $(this).val(1);
                    $(".value_user_input_check").val(1);
                }
            })
            $("#old_user").select2({
                dir: "rtl"
            })
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
        });
    </script>
@endsection
