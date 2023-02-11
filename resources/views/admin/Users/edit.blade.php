@extends('admin.layouts.master')
@section('title')
    <title>ویرایش اطلاعات کاربر</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">ویرایش اطلاعات کاربر</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('user_business.update',$data['user']->id)}}"
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
                                <label for="name"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">نام</label>
                                <input type="text" name="name" class="form-control pt-1" id="name"
                                       value="{{$data['user']->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">ایمیل</label>
                                <input type="email" name="email" class="form-control pt-1" id="email"
                                       value="{{$data['user']->email}}">
                            </div>
                            <div class="form-group">
                                <label for="phone"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">شماره همراه</label>
                                <input type="text" name="phone" class="form-control pt-1" id="phone"
                                       value="{{$data['user']->phone}}">
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
