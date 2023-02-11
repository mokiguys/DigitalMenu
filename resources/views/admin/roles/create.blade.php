@extends('admin.layouts.master')

@section('title')
    <title>ایجاد مقام جدید</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">ایجاد مقام</h4>
                        <form class="forms-sample" method="post" action="{{route('roles.store')}}"
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

                            <div class="form-group">
                                <label for="name"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">عنوان مقام</label>
                                <input type="text" name="name" class="form-control pt-1" id="name"
                                       value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="label"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">توضیح مقام</label>
                                <input type="text" name="label" class="form-control pt-1" id="label"
                                       value="{{old('label')}}">
                            </div>
                            <div class="form-group">
                                <label for="permissions"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">لیست دسترسی
                                    ها</label>
                                <select name="permissions[]" class="form-control" multiple id="permissions">
                                    @foreach(\App\Permission::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}} - {{$item->label}}</option>
                                    @endforeach
                                </select>
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
@section('script')
    <script>
        $("#permissions").select2()
    </script>
@endsection

