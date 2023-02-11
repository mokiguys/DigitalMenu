@extends('admin.layouts.master')
@section('title')
    <title>ویرایش تگ</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">ویرایش تگ</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('article.update',['article'=>$data['article']->id])}}"
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
                                    <label for="lang" class="float-right">@lang('text.lang')</label>
                                    <select class="form-control pt-1" id="lang" name="lang">
                                        <option {{$data['article']->lang == "fa" ? "selected" : ""}} value="fa">@lang('text.persian')</option>
                                        <option {{$data['article']->lang == "en" ? "selected" : ""}} value="en">@lang('text.english')</option>
                                        <option {{$data['article']->lang == "tr" ? "selected" : ""}} value="tr">@lang('text.turkish')</option>
                                        <option {{$data['article']->lang == "ar" ? "selected" : ""}} value="ar">@lang('text.arabic')</option>
                                        <option {{$data['article']->lang == "ru" ? "selected" : ""}} value="ru">@lang('text.russia')</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="float-right">دسته بندی</label>
                                    <select class="form-control pt-1" id="category" name="category">
                                        <option disabled selected>دسته بندی خود را انتخاب کنید</option>
                                        @foreach($data['category'] as $item)
                                            <option value="{{$item->id}}" {{$item->id == $data['article']->Category[0]['id'] ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="float-right">@lang('text.title')</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{old('title',$data['article']->title)}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="float-right">اسلاگ</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                           value="{{old('slug',$data['article']->slug)}}">
                                </div>
                                <div class="form-group">
                                    <label for="short_text" class="float-right">توضیحات کوتاه</label>
                                    <textarea name="short_text" id="short_text"
                                              class="form-control">{{old('short_text',$data['article']->short_text)}}</textarea>
                                </div>
                                <div class="form-group d-flex flex-column align-items-start">
                                    <label for="editor1" class="float-right">توضیحات</label>
                                    <div class="w-100">
                                    <textarea name="text" id="editor1"
                                              class="form-control ckeditor">{{old('text',$data['article']->text)}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-column align-items-start">
                                    <label for="image" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.image')</label>
                                    <input type="file" name="image" class="form-control pt-1" id="image">
                                    <div class="mt-2 clearfix {{app()->getLocale() != "fa" ? "" : "float-right"}}">
                                    <img style="border-radius: 10px"
                                         src="{{ asset('Site/uploader/article/'. $data['article']->image)}}" alt=""
                                         width="60"
                                         height="60">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="float-right">تگ</label>
                                    <select class="form-control pt-1" id="tag" name="tag[]" multiple>
                                        @foreach($data['tag'] as $tag)
                                            <option value="{{$tag->id}}" {{in_array($tag->id,$data['article']->Tag()->pluck('id')->toArray()) ? "selected" : ""}}>{{$tag[app()->getLocale()]}}</option>
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
        $("#tag").select2({
            dir: 'rtl'
        });
    </script>
@endsection
