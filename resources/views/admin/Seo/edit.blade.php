@extends('admin.layouts.master')
@section('title')
    <title>{{$data['title']}}</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">ویرایش کردن سئو</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('seo.update',['seo' => $data['seo']->id])}}"
                              enctype="multipart/form-data">
                            @method('put')
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="name" class="float-right">عنوان صفحه</label>
                                <input type="text" name="namePage" class="form-control" id="name"
                                       value="{{$data['seo']->name}}">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" style="text-align: left;direction: ltr;"
                                       class="form-control" id="url"
                                       value="{{$data['seo']->url}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{$data['seo']->title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          style="height: 150px">{{$data['seo']->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="keywords">keywords</label>
                                <input type="text" name="keywords" class="form-control"
                                       placeholder="کلمات کلیدی را با , جدا کنید" id="keywords"
                                       value="{{$data['seo']->keywords}}">
                            </div>
                            <div class="alert alert-warning">
                                <ul class="mb-0 text-right" style="direction: rtl">
                                    <li>بین دو خاصیت از * استفاده کنید</li>
                                    <li>برای جدا سازی کلید و مقدار از ;;; استفاده کنید</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="metaProperties">MetaProperties</label>
                                <textarea name="metaProperties" id="metaProperties" class="form-control"
                                          style="height: 150px;text-align: left;direction: ltr;">{{$data['seo']->metaProperties}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="OgType">OpenGraph Type</label>
                                <input type="text" name="OgType" class="form-control"
                                       style="text-align: left;direction: ltr;" id="OgType"
                                       value="{{$data['seo']->OgType}}">
                            </div>
                            <div class="alert alert-warning">
                                <ul class="mb-0 text-right" style="direction: rtl">
                                    <li>بین دو خاصیت از * استفاده کنید</li>
                                    <li>برای جدا سازی کلید و مقدار از ;;; استفاده کنید</li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="OgProperties">OpenGraph Properties</label>
                                <textarea name="OgProperties" id="OgProperties" class="form-control"
                                          style="height: 150px;text-align: left;direction: ltr;">{{$data['seo']->OgProperties}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
