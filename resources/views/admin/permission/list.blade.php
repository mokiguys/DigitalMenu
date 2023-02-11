@extends('admin.layouts.master')

@section('title')
    <title>دسترسی ها</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>نام دسترسی</th>
                        <th>توضیح دسترسی</th>
                        @can('edit-permissions')
                            <th>ویرایش</th>
                        @endcan
                        @can('delete-permissions')
                            <th>حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['permissions'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td class="py-1">{{$item->name}}</td>
                            <td class="py-1">{{$item->label}}</td>
                            @can('edit-permissions')
                                <td>
                                    <a class="btn-primary btn"
                                       href="{{route('permission.edit',['permission'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('delete-permissions')
                                <td>
                                    <form action="{{route('permission.destroy',['permission'=>$item->id])}}"
                                          method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                        </button>
                                        <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['permissions']->render()}}
        </div>
        @foreach($data['permissions'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name}}</div>
                    <ul style="display: none">
                        <li>
                            <span>توضیح دسترسی</span>
                            <span>{{$item->label}}</span>
                        </li>
                        @can('edit-permissions')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn"
                                         href="{{route('permission.edit',['permission'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
                            </li>
                        @endcan
                        @can('delete-permissions')
                            <li>
                                <span>@lang('text.delete')</span>
                                <span>
                                        <form action="{{route('permission.destroy',['permission'=>$item->id])}}"
                                              method="POST">
                                        @csrf
                                            @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                        </button>
                                        <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                        </form>
                                </span>
                            </li>
                        @endcan
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
                swal("@lang('text.delete_message')", {
                    buttons: {
                        cancel: "@lang('text.close')",
                        catch: {
                            text: "@lang('text.delete')",
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
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
