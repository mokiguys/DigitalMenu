@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.bannerTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.bannerTitle')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('Banner.update',['banner' => $data['banner']->id])}}"
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
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="img"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.BannerMedia')</label>
                                    <input type="file" name="media" class="form-control pt-1" id="img">
                                    <div class="mt-2 clearfix {{app()->getLocale() != "fa" ? "" : "text-right"}}">
                                       @php
                                            $file = explode('.',$data['banner']->media);
                                       @endphp
                                        @if($file[1] == "mp4" ||$file[1] == "avi" ||$file[1] == "mkv")
                                            <video src="{{ asset('site/uploader/banner/'. $data['banner']->media)}}" width="200" controls height="80"></video>
                                        @else
                                            <img style="border-radius: 10px"
                                                 src="{{ asset('site/uploader/banner/'. $data['banner']->media)}}" alt=""
                                                 width="60"
                                                 height="60">
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <button type="submit"
                                        class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
