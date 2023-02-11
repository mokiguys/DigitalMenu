@extends('admin.layouts.master')
@php
    $media = $data['page']->image;
    if($media != 'null'){
    $media = explode('.',$media);
    }else{
    $media = 'null';
    }
@endphp
@section('title')
    <title>{{$data['title']}}</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">ویرایش کردن اطلاعات صفحه</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('page.update',['page' => $data['page']->id])}}"
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
                            @if($data['page']->title != "خدمات ما" && $data['page']->title != "پروژه های پایان یافته" && $data['page']->title != "گواهی نامه ها" && $data['page']->title != "پروژه ها")

                                <div class="form-group">
                                    <label for="image" class="float-right">رسانه</label>
                                    <input type="file" name="image" class="form-control pt-1" id="image"
                                           value="{{old('image')}}">
                                    <div class="mt-2 clearfix text-right">
                                        @if($media!= 'null' && $media[1]!= "mp4")
                                            <img style="border-radius: 10px"
                                                 src="{{ asset('Site/uploader/page/'. $data['page']->image)}}" alt=""
                                                 width="60"
                                                 height="60">
                                        @elseif($media!= 'null' && $media[1]== "mp4")
                                            <video width="300px" height="150px"
                                                   src="{{ asset('Site/uploader/page/'. $data['page']->image)}}"
                                                   controls></video>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if($data['page']->title != "فیلم")
                                @if($data['page']->title != "خدمات ما" && $data['page']->title != "پروژه های پایان یافته" && $data['page']->title != "گواهی نامه ها" && $data['page']->title != "پروژه ها" && $data['page']->title != "استخدام")
                                    <div class="form-group">
                                        <label for="short_text" class="float-right">خلاصه توضیح (فارسی)</label>
                                        <textarea type="text" name="short_text"
                                                  class="form-control" style="height: 150px;" id="short_text"
                                        >{{$data['page']->short_text}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_text_en" class="float-right">خلاصه توضیح (خارجی)</label>
                                        <textarea type="text" name="short_text_en"
                                                  class="form-control text-left" style="direction: ltr;height: 150px;"
                                                  id="short_text_en"
                                        >{{$data['page']->short_text_en}}</textarea>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="text" class="float-right">توضیحات (فارسی)</label>
                                    <textarea type="text" name="text" style="height: 150px;" class="form-control"
                                              id="text"
                                    >{{$data['page']->text}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="text_en" class="float-right">توضیحات (انگلیسی)</label>
                                    <textarea type="text" name="text_en" class="form-control text-left"
                                              style="height: 150px;direction: ltr" id="text_en"
                                    >{{$data['page']->text_en}}</textarea>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
