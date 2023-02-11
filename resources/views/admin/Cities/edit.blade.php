@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.CityTitleEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CityTitleEdit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('cities.update',['city'=>$data['cities']->id])}}"
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
                                    <label for="fa"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>
                                    <input type="text" name="fa" class="form-control pt-1" id="fa"
                                           value="{{$data['cities']->fa}}">
                                </div>
                                <div class="form-group">
                                    <label for="en"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                    <input type="text" name="en" class="form-control pt-1" id="en"
                                           value="{{$data['cities']->en}}">
                                </div>
                                <div class="form-group">
                                    <label for="tr"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                    <input type="text" name="tr" class="form-control pt-1" id="tr"
                                           value="{{$data['cities']->tr}}">
                                </div>
                                <div class="form-group">
                                    <label for="location"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.location')</label>
                                    <input type="text" placeholder="@lang('text.exm_loc')" name="location"
                                           class="form-control pt-1" id="location"
                                           value="{{$data['cities']->location}}">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.image')</label>
                                    <input type="file" name="image" class="form-control pt-1" id="image">
                                    <div class="mt-2 clearfix {{app()->getLocale() != "fa" ? "" : "float-right"}}">
                                        <img style="border-radius: 10px"
                                             src="{{ asset('Site/uploader/cities/'. $data['cities']->image)}}" alt=""
                                             width="60"
                                             height="60">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.country_single')</label>
                                    <select name="country" id="country" class="form-control pt-1">
                                        <option value="0" selected disabled>@lang('text.select_default')</option>
                                        @foreach($data['country'] as $value)
                                            <option value="{{$value->id}}" {{$data['cities']->country_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="province"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.province_single')</label>
                                    <select name="province" id="province" class="form-control pt-1">
                                        <option value="0" selected disabled>@lang('text.select_default')</option>
                                        @foreach($data['province'] as $value)
                                            <option value="{{$value->id}}" {{$data['cities']->province_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
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
            })
        });
    </script>
@endsection
