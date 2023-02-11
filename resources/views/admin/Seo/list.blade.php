@extends('admin.layouts.master')
@section('title')
    <title>{{$data['title']}}</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">اضافه کردن کد سئو</h4>
                        <form class="forms-sample" method="post" action="{{route('seo.store')}}"
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
                                <label for="name" class="float-right">عنوان صفحه</label>
                                <input type="text" name="namePage" class="form-control" id="name"
                                       value="{{old('namePage')}}">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" style="text-align: left;direction: ltr" class="form-control" id="url"
                                       value="{{old('url')}}">
                            </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" style="height: 150px">{{old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">keywords</label>
                                    <input type="text" name="keywords" class="form-control" placeholder="کلمات کلیدی را با , جدا کنید" id="keywords"
                                           value="{{old('keywords')}}">
                                </div>
                                <div class="alert alert-warning">
                                    <ul class="mb-0 text-right" style="direction: rtl">
                                        <li>بین دو خاصیت از * استفاده کنید</li>
                                        <li>برای جدا سازی کلید و مقدار از ;;; استفاده کنید</li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="metaProperties">MetaProperties</label>
                                    <textarea name="metaProperties" id="metaProperties" class="form-control" style="text-align: left;direction: ltr;height: 150px">{{old('metaProperties')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="OgType">OpenGraph Type</label>
                                    <input type="text" name="OgType" style="text-align: left;direction: ltr;" class="form-control" id="OgType"
                                           value="{{old('OgType')}}">
                                </div>
                                <div class="alert alert-warning">
                                    <ul class="mb-0 text-right" style="direction: rtl">
                                        <li>بین دو خاصیت از * استفاده کنید</li>
                                        <li>برای جدا سازی کلید و مقدار از ;;; استفاده کنید</li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="OgProperties">OpenGraph Properties</label>
                                    <textarea name="OgProperties" id="OgProperties" class="form-control" style="text-align: left;direction: ltr;height: 150px">{{old('OgProperties')}}</textarea>
                                </div>

                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th> ردیف</th>
                        <th> نام صفحه</th>
                        <th> لینک صفحه</th>
                        <th> ویرایش</th>
                        <th> حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['seo'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            <td><input type="text" value="{{$item->url}}" class="form-control text-center"></td>
                            <td>
                                <a class="btn-primary btn" href="{{route('seo.edit',['seo' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{route('seo.destroy',['seo' => $item->id])}}" method="POST">
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
        @foreach($data['seo'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name}}</div>
                    <ul style="display: none">
                        <li>
                            <span>ویرایش</span>
                            <span><a class="btn-primary btn" href="{{route('seo.edit',['seo' => $item->id])}}"><i
                                        class="fad fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>حذف</span>
                            <span>
                                <form action="{{route('seo.destroy',['seo' => $item->id])}}" method="POST">
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
        $(".sort").change(function () {
            $sort = $(this).val();
            $id = $(this).attr('data-id');
            $csrf = "{{@csrf_token()}}";
            $method = "put";
            $.ajax({
                url: 'UpdateSortPartner',
                type: 'post',
                data: {_token: $csrf, _method: $method, id: $id, sort: $sort},
                success: function (response) {

                }
            });
        });
        $(function () {
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        })
    </script>
@endsection

