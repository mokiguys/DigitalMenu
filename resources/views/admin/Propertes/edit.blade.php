@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.edit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.edit')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('propertes.update',['properte'=>$data['property']->id])}}"
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
                                <label for="title_fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>
                                <input type="text" name="fa" class="form-control pt-1" id="title_fa"
                                       value="{{$data['property']->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="title_en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="title_en"
                                       value="{{$data['property']->en}}">
                            </div>
                            <div class="form-group">
                                <label for="title_tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="title_tr"
                                       value="{{$data['property']->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="title_ar"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_ar')</label>
                                <input type="text" name="ar" class="form-control pt-1" id="title_ar"
                                       value="{{$data['property']->ar}}">
                            </div>
                            <div class="form-group">
                                <label for="description_fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_fa')</label>
                                <textarea name="description_fa" class="form-control pt-1" style="height: 200px"
                                          placeholder="@lang('text.roles_Separate')"
                                          id="description_fa">{{$data['property']->description_fa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_en')</label>
                                <textarea name="description_en" class="form-control pt-1"
                                          style="text-align: left;direction: ltr;height: 200px"
                                          placeholder="@lang('text.roles_Separate')"
                                          id="description_en">{{$data['property']->description_en}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_tr')</label>
                                <textarea name="description_tr" class="form-control pt-1"
                                          style="text-align: left;direction: ltr;height: 200px"
                                          placeholder="@lang('text.roles_Separate')"
                                          id="description_tr">{{$data['property']->description_tr}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description_ar"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.description_ar')</label>
                                <textarea name="description_ar" class="form-control pt-1" style="height: 200px;"
                                          placeholder="@lang('text.roles_Separate')"
                                          id="description_ar">{{$data['property']->description_ar}}</textarea>
                            </div>
                            <div class="form-group clearfix">
                                <label for="image"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.image')</label>
                                <input type="file" name="image" class="form-control pt-1" id="image">
                                <div class="mt-2 clearfix {{app()->getLocale() != "fa" ? "" : "float-right"}}">
                                    <img style="border-radius: 10px"
                                         src="{{ asset('Site/uploader/property/'. $data['property']->image)}}" alt=""
                                         width="60"
                                         height="60">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="icon"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">ایکن</label>
                                <input type="text" name="icon" class="form-control pt-1" id="icon"
                                       value="{{$data['property']->icon}}">
                            </div>
                            <div class="form-group">
                                <label for="slug"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">اسلاگ</label>
                                <input type="text" name="slug" class="form-control pt-1" id="slug"
                                       value="{{$data['property']->slug}}">
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

