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
                        <h4 class="card-title text-right">ویرایش کردن مراحل پروژه</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('certificate.update',['certificate'=>$data['certificate']->id])}}"
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
                                <label for="image" class="float-right">عکس</label>
                                <input type="file" name="image" class="form-control pt-1" id="image">
                                <div class="mt-2 clearfix text-right">
                                    <img style="border-radius: 10px"
                                         src="{{ asset('Site/uploader/certificate/'. $data['certificate']->image)}}" alt=""
                                         width="60"
                                         height="60">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
