@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.foodsTitleEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.foodsTitleEdit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('food.update',['food'=>$data['food']->id])}}"
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
                                       value="{{$data['food']->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{$data['food']->en}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{$data['food']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="ingredient"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.ingredients')</label>
                                <select name="ingredient[]" multiple id="ingredient" class="form-control pt-1">
                                    @foreach($data['ingredient'] as $value)
                                        <option
                                            value="{{$value->id}}" {{in_array($value->id,$data['food']->ingredients()->pluck('id')->toArray()) ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="categoryShop_id"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                    <select name="categoryShop_id" id="categoryShop_id" class="form-control pt-1">
                                        <option value="0" selected disabled>@lang('text.select_default')</option>
                                        @foreach($data['categoryStore'] as $value)
                                            <option
                                                value="{{$value->id}}" {{$data['food']->categoryShop_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoryFood_id"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.MenuCategory')</label>
                                    <select name="categoryFood_id" id="categoryFood_id" class="form-control pt-1">
                                        @foreach($data['categoryFood'] as $value)
                                            <option
                                                value="{{$value->id}}" {{$data['food']->categoryFood_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                        @endforeach
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
            $("#ingredient").select2({
                dir: 'rtl'
            });
            $("#categoryShop_id").change(function () {
                $shop = $(this).val();
                $csrf = "{{@csrf_token()}}";
                $method = "post";
                $.ajax({
                    url: "{{route('categoryFood.shop')}}",
                    type: 'post',
                    data: {_token: $csrf, _method: $method, shop: $shop},
                    success: function (response) {
                        $data = JSON.parse(response);
                        $html = ' <option value="0" selected disabled>@lang("text.select_default")</option>';
                        for ($i = 0; $i < $data.length; $i++) {
                            $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                        }
                        $("#categoryFood_id").html($html)
                    }
                });
            })
        });
    </script>
@endsection
