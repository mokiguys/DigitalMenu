@extends('admin.layouts.master')


@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">اضافه کردن دسته بندی مقالات</h4>
                        <form class="forms-sample" method="post" action="{{route('CategoryArticle.store')}}">
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
                                <label for="fa" class="float-right">@lang('text.title_fa')</label>
                                <input type="text" name="fa" class="form-control" id="fa" value="{{old('fa')}}">
                            </div>
                            <div class="form-group">
                                <label for="en" class="float-right">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control" id="en" value="{{old('en')}}">
                            </div>
                            <div class="form-group">
                                <label for="tr" class="float-right">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control" id="tr" value="{{old('tr')}}">
                            </div>
                            <div class="form-group">
                                <label for="ar" class="float-right">@lang('text.title_ar')</label>
                                <input type="text" name="ar" class="form-control" id="ar" value="{{old('ar')}}">
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
                        <th> ردیف</th>
                        <th> عنوان</th>
                        <th>تعداد مقالات</th>
                        <th> ویرایش</th>
                        <th> حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['category'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item[app()->getLocale()]}}</td>
                            <td>{{count($item->Articles)}}</td>
                            <td><a class="btn-primary btn"
                                   href="{{route('CategoryArticle.edit',['CategoryArticle' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{route('CategoryArticle.destroy',['CategoryArticle' => $item->id])}}" method="POST">
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
            {{$data['category']->render()}}
        </div>
        @foreach($data['category'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->category}}</div>
                    <ul style="display: none">
                        <li>
                            <span>تعداد مقالات</span>
                            <span>{{count($item->Articles)}}</span>
                        </li>
                        <li>
                            <span>ویرایش</span>
                            <span><a class="btn-primary btn"
                                     href="{{route('CategoryArticle.edit',['CategoryArticle' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>حذف</span>
                            <span>
                                <form action="{{route('CategoryArticle.destroy',['CategoryArticle' => $item->id])}}" method="POST">
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

        $(function () {
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        })
    </script>
@endsection

