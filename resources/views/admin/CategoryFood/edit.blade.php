@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.CategoryFoodTitleEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CategoryFoodTitleEdit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('categoryFood.update',['categoryFood'=>$data['categoryFood']->id])}}"
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
                                <label for="category_id"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                <select name="category_id" id="category_id" class="form-control pt-1">
                                    @foreach($data['categoryStore'] as $value)
                                        <option
                                            value="{{$value->id}}" {{$data['categoryFood']->categoryShop_id == $value->id ? "selected" : ""}}>{{$value[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>
                                <input type="text" name="fa" class="form-control pt-1" id="fa"
                                       value="{{$data['categoryFood']->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{$data['categoryFood']->en}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{$data['categoryFood']->tr}}">
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
