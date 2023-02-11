@extends('admin.layouts.master')


@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">اضافه کردن مقاله</h4>
                        <form class="forms-sample" method="post" action="{{route('article.store')}}"
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
                                <label for="lang" class="float-right">@lang('text.lang')</label>
                                <select class="form-control pt-1" id="lang" name="lang">
                                    <option value="fa">@lang('text.persian')</option>
                                    <option value="en">@lang('text.english')</option>
                                    <option value="tr">@lang('text.turkish')</option>
                                    <option value="ar">@lang('text.arabic')</option>
                                    <option value="ru">@lang('text.russia')</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category" class="float-right">دسته بندی</label>
                                <select class="form-control pt-1" id="category" name="category">
                                    @foreach($data['category'] as $item)
                                        <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title" class="float-right">@lang('text.title')</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="float-right">اسلاگ</label>
                                <input type="text" name="slug" class="form-control" id="slug"
                                       value="{{old('slug')}}">
                            </div>
                            <div class="form-group">
                                <label for="short_text" class="float-right">توضیحات کوتاه</label>
                                <textarea name="short_text" id="short_text"
                                          class="form-control">{{old('short_text')}}</textarea>
                            </div>
                            <div class="form-group d-flex flex-column align-items-start">
                                <label for="editor1" class="float-right">توضیحات</label>
                                <div class="w-100">
                                    <textarea name="text" id="editor1"
                                              class="form-control ckeditor">{{old('text')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="float-right">@lang('text.image')</label>
                                <input type="file" name="image" class="form-control pt-1" id="file"
                                       value="{{old('image')}}">
                            </div>
                            <div class="form-group">
                                <label for="tag" class="float-right">تگ</label>
                                <select class="form-control pt-1" id="tag" name="tag[]" multiple>
                                    @foreach($data['tag'] as $tag)
                                        <option value="{{$tag->id}}">{{$tag[app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">@lang('text.submit')</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>زبان</th>
                        <th>تصویر</th>
                        <th>دسته بندی</th>
                        <th>نمایش در صفحه اصلی</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['article'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->lang}}</td>
                            <td>
                                <img src="{{'../site/uploader/article/' . $item->image}}" alt="" width="60" height="60">
                            </td>
                            <td>{{$item->Category[0][app()->getLocale()]}}</td>
                            <td><input type="checkbox" {{$item->show_index == 1 ? "checked" : ""}} class="show_index"
                                       data-id="{{$item->id}}"
                                       value="{{$item->show_index}}"></td>
                            <td><a class="btn-primary btn"
                                   href="{{route('article.edit',['article' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{route('article.destroy',['article' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-danger btn delete-submit" hidden><i class="fad fa-trash"></i>
                                    </button>
                                    <span class="btn-danger btn delete"><i class="fad fa-trash"></i></span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['article']->render()}}
        </div>
        @foreach($data['article'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->title}}</div>
                    <ul style="display: none">
                        <li>
                            <span>زبان</span>
                            <span>{{$item->lang}}</span>
                        </li>
                        <li>
                            <span>تصویر</span>
                            <span><img src="{{'../site/uploader/article/' . $item->image}}" alt="" width="60" height="60"></span>
                        </li>
                        <li>
                            <span>دسته بندی</span>
                            <span>{{$item->Category[0][app()->getLocale()]}}</span>
                        </li>
                        <li>
                            <span>نمایش در صفحه اصلی</span>
                            <span><input type="checkbox" {{$item->show_index == 1 ? "checked" : ""}} class="show_index"
                                         data-id="{{$item->id}}"
                                         value="{{$item->show_index}}"></span>
                        </li>
                        <li>
                            <span>ویرایش</span>
                            <span><a class="btn-primary btn"
                                     href="{{route('article.edit',['article' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>حذف</span>
                            <span>
                                <form action="{{route('article.destroy',['article' => $item->id])}}" method="POST">
                                @csrf
                                    @method('delete')
                                <button class="btn-danger btn delete-submit" hidden><i class="fad fa-trash"></i>
                                </button>
                                <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                </form>
                        </span>
                        </li>
                    </ul>
                </li>
            </ul>
        @endforeach
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("body").on('click', '.delete', function () {
                swal("آیا شما از حذف این مورد اطمینان دارید ؟", {
                    buttons: {
                        cancel: "بستن",
                        catch: {
                            text: "حذف",
                            value: "catch",
                        },
                    },
                }).then((value) => {
                    switch (value) {
                        case "catch":
                            $(this).parent().find(".delete-submit").click();
                            break;
                    }
                });
            });
        });
        $("#tag").select2({
            dir: 'rtl'
        });
        $(function () {
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        })
        $("body").on('click', '.show_index', function () {
            $id = $(this).attr('data-id');

            axios.post("{{route('article.ShowIndex')}}", {
                id: $id,
                _token: "{{@csrf_token()}}",
            })
                .then(function (response) {
                })
                .catch(function (error) {
                });
        })
    </script>
@endsection

