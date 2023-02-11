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
                        <h4 class="card-title text-right">آپلودر فایل</h4>
                        <form class="forms-sample" method="post" action="{{route('uploader.store')}}"
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
                                <label for="title" class="float-right">عنوان فایل</label>
                                <input type="text" name="title" class="form-control pt-1" id="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="file" class="float-right">فایل</label>
                                <input type="file" name="file" class="form-control pt-1" id="file"
                                       value="{{old('file')}}">
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
                        <th>عنوان فایل</th>
                        <th>لینک فایل</th>
                        <th> حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['file'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>
                                {{$item->title}}
                            </td>
                            <td>
                                <input type="text" class="form-control text-center"
                                       value="{{asset('Site/uploader/file/'.$item->file)}}">
                            </td>
                            <td>
                                <form action="{{route('uploader.destroy',['uploader' => $item->id])}}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                    </button>
                                    <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['file']->render()}}
        </div>
        @foreach($data['file'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->title}}</div>
                    <ul style="display: none">
                        <li>
                            <span>لینک فایل</span>
                            <span><input type="text" class="form-control text-center"
                                         value="{{asset('Site/uploader/file/'.$item->file)}}"></span>
                        </li>
                        <li>
                            <span>حذف</span>
                            <span>
                                        <form action="{{route('uploader.destroy',['uploader' => $item->id])}}"
                                              method="POST">
                                        @csrf
                                            @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
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
        });
    </script>
@endsection
