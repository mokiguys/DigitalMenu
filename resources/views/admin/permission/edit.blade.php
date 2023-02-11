@extends('admin.layouts.master')

@section('title')
    <title>ویرایش دسترسی</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">ویرایش دسترسی</h4>
                        <form class="forms-sample" method="post" action="{{route('permission.update',$data['permission']->id)}}"
                              enctype="multipart/form-data">
                            @if($errors->any())
                                <div class="alert alert-danger {{app()->getLocale() != "fa" ? "" : "text-right"}}">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                                @method('put')
                            <div class="form-group">
                                <label for="name"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">عنوان دسترسی</label>
                                <input type="text" name="name" class="form-control pt-1" id="name"
                                       value="{{old('name',$data['permission']->name)}}">
                            </div>
                            <div class="form-group">
                                <label for="label"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">توضیح دسترسی</label>
                                <input type="text" name="label" class="form-control pt-1" id="label"
                                       value="{{old('label',$data['permission']->label)}}">
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

