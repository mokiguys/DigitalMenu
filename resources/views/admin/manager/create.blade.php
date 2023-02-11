@extends('admin.layouts.master')
@section('title')
    <title>اضافه کردن مدیر</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">اضافه کردن مدیر</h4>
                        <form class="forms-sample" method="post" action="{{route('manager.store')}}"
                              enctype="multipart/form-data">
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="name" class="float-right">نام</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="float-right">ایمیل</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       value="{{old('email')}}">
                            </div>
                            <div class="form-group">
                                <label for="password" class="float-right">رمز عبور</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       value="{{old('password')}}">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="float-right">تکرار رمز عبور</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password_confirmation" value="{{old('password_confirmation')}}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

