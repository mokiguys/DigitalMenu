@extends('admin.layouts.master')
@section('title')
    <title>تغییر رمز عبور</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">تغییر رمز عبور</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('manager.updatePassword', $data['user']->id)}}"
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
