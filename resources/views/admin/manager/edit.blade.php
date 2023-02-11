@extends('admin.layouts.master')
@section('title')
    <title>ویرایش اطلاعات مدیر</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">ویرایش کردن مدیر</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('manager.update',$manager->id)}}"
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
                                <label for="name" class="float-right">نام</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="نام را وارد کیند" value="{{$manager->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="float-right">ایمیل</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       value="{{$manager->email}}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
