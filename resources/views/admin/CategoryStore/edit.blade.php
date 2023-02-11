@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.AmenitiesTitleEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CategoryStoreTitleEdit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('categoryStore.update',['categoryStore'=>$data['categoryStore']->id])}}"
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
                                       value="{{$data['categoryStore']->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{$data['categoryStore']->en}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{$data['categoryStore']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="icon"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">ایکن</label>
                                <input type="text" name="icon" class="form-control pt-1" id="icon"
                                       value="{{$data['categoryStore']->icon}}">
                            </div>
                            <div class="form-group">
                                <label for="slug"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">اسلاگ</label>
                                <input type="text" name="slug" class="form-control pt-1" id="slug"
                                       value="{{$data['categoryStore']->slug}}">
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
