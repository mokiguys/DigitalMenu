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
                        <h4 class="card-title text-right">ویرایش کردن درباره ما</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('about.update')}}"
                              enctype="multipart/form-data">
                            @method('put')
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
                                <label for="fa" class="float-right">توضیح فارسی</label>
                                <textarea name="fa" class="form-control" style="height: 150px" id="fa"
                                          placeholder="توضیح را وارد کیند">{{$data['about']->fa}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="en" class="float-right">توضیح انگلیسی</label>
                                <textarea name="en" class="form-control ltr-style" style="height: 150px" id="en"
                                          placeholder="توضیح را وارد کیند">{{$data['about']->en}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tr" class="float-right">توضیح ترکی</label>
                                <textarea name="tr" class="form-control ltr-style" style="height: 150px" id="tr"
                                          placeholder="توضیح را وارد کیند">{{$data['about']->tr}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
