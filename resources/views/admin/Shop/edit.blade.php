@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.ShopEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.ShopEdit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('shop.update',['shop'=>$data['shop']->id])}}"
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
                                       value="{{$data['shop']->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{$data['shop']->en}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{$data['shop']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle_fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.subtitle_fa')</label>
                                <input type="text" name="subtitle_fa" class="form-control pt-1" id="subtitle_fa"
                                       value="{{$data['shop']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle_en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.subtitle_en')</label>
                                <input type="text" name="subtitle_en" class="form-control pt-1" id="subtitle_en"
                                       value="{{$data['shop']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle_tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.subtitle_tr')</label>
                                <input type="text" name="subtitle_tr" class="form-control pt-1" id="subtitle_tr"
                                       value="{{$data['shop']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="country"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.country')</label>
                                <select name="country" id="country" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    @foreach($data['country'] as $value)
                                        <option
                                            value="{{$value->id}}" {{$data['shop']->country_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="province"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.province')</label>
                                <select name="province" id="province" class="form-control pt-1">
                                    @foreach($data['province'] as $value)
                                        <option
                                            value="{{$value->id}}" {{$data['shop']->province_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.cities')</label>
                                <select name="city" id="city" class="form-control pt-1">
                                    @foreach($data['city'] as $value)
                                        <option
                                            value="{{$value->id}}" {{$data['shop']->city_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                <select name="category_id" id="category_id" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    @foreach($data['categoryStore'] as $value)
                                        <option
                                            value="{{$value->id}}" {{$data['shop']->category_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description_fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_fa')</label>
                                <textarea name="description_fa" style="height: 150px" class="form-control pt-1"
                                          id="description_fa"
                                >{{$data['shop']->description_fa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_en')</label>
                                <textarea name="description_en" style="height: 150px" class="form-control pt-1"
                                          id="description_en"
                                >{{$data['shop']->description_fa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_tr')</label>
                                <textarea name="description_tr" style="height: 150px" class="form-control pt-1"
                                          id="description_tr"
                                >{{$data['shop']->description_fa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="type_address"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.address_type')</label>
                                <select name="type_address" id="type_address" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    <option value="1">موقعیت جغرافیایی</option>
                                    <option value="2">آدرس</option>
                                    <option value="3">هردو</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.location')</label>
                                <input type="text" name="location" class="form-control pt-1" id="location"
                                       value="{{$data['shop']->location}}">
                            </div>
                            <div class="form-group">
                                <label for="address_fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.address_fa')</label>
                                <input type="text" name="address_fa" class="form-control pt-1" id="address_fa"
                                       value="{{$data['shop']->address_fa}}">
                            </div>
                            <div class="form-group">
                                <label for="address_en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.address_en')</label>
                                <input type="text" name="address_en" class="form-control pt-1" id="address_en"
                                       value="{{$data['shop']->address_en}}">
                            </div>
                            <div class="form-group">
                                <label for="address_tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.address_tr')</label>
                                <input type="text" name="address_tr" class="form-control pt-1" id="address_tr"
                                       value="{{$data['shop']->address_tr}}">
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
        });
    </script>
@endsection
