@extends('admin.layouts.master')
@section('title')
    <title>لیست مدیران</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th> ردیف</th>
                        <th> نام</th>
                        @can('change-password-manager')
                        <th>رمز عبور</th>
                        @endcan
                        @can('ban-manager')
                            <th>بن</th>
                        @endcan
                        @can('access-manager')
                            <th>دسترسی ها</th>
                        @endcan
                        @can('edit-manager')
                            <th> ویرایش</th>
                        @endcan
                        @can('delete-manager')
                            <th> حذف</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['manager'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->name}}</td>
                            @can('change-password-manager')
                            <td>
                                <a class="btn-info btn" href="{{route('manager.editPassword',$item->id)}}"><i
                                        class="fad fa-lock-alt"></i></a>
                            </td>
                            @endcan
                            @can('ban-manager')
                                <td>
                                    @if(!$item->isSuperAdmin())
                                        <button class="ban btn btn-{{$item->ban == 0 ? "danger" : "success"}}"
                                                data-id="{{$item->id}}">{{$item->ban == 0 ? "غیر فعال" : "فعال"}}</button>
                                    @else
                                        <span>غیر مجاز</span>
                                    @endif
                                </td>
                            @endcan
                            @can('access-manager')
                                @if(!$item->isSuperAdmin())
                                    <td>
                                        <a class="btn-warning btn"
                                           href="{{route('manager.permission', $item->id)}}"><i
                                                class="fad fa-user-lock"></i></a>
                                    </td>
                                @else
                                    <td> دسترسی کامل</td>
                                @endif
                            @endcan
                            @can('edit-manager')
                                <td>
                                    <a class="btn-primary btn"
                                       href="{{route('manager.edit', $item->id)}}"><i
                                            class="fad fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('delete-manager')
                                <td>
                                    <form action="{{route('manager.destroy', $item->id)}}" method="POST">
                                        <button class="btn-danger btn delete-submit" hidden><i class="fad fa-trash"></i>
                                        </button>
                                        @if(!$item->isSuperAdmin())
                                            @method('delete')
                                            @csrf
                                            <span class="btn-danger btn delete"><i class="fad fa-trash"></i></span>
                                        @else
                                            <span>غیر مجاز</span>
                                        @endif
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['manager'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name}}</div>
                    <ul style="display: none">
                        {{--                        <li>--}}
                        {{--                            <span>رمز عبور</span>--}}
                        {{--                                <span><a class="btn-primary btn"--}}
                        {{--                                         href="{{route('user.editPassword',['user' => $item->id])}}"><i--}}
                        {{--                                            class="fad fa-lock"></i></a></span>--}}
                        {{--                        </li>--}}
                        @can('access-manager')
                            @if(!$item->isSuperAdmin())
                                <li>
                                    <span>دسترسی</span>
                                    <span><a class="btn-warning btn"
                                             href="{{route('manager.permission', $item->id)}}"><i
                                                class="fad fa-user-lock"></i></a></span>
                                </li>
                            @else
                                <li>
                                    <span>دسترسی</span>
                                    <span>دسترسی کامل</span>
                                </li>
                            @endif
                        @endcan
                        <li>
                            <span>ویرایش</span>
                            <span><a class="btn-primary btn" href="{{route('manager.edit', $item->id)}}"><i
                                        class="fad fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>حذف</span>
                            <span>
                                <form action="{{route('manager.destroy', $item->id)}}" method="POST">
                                <button class="btn-danger btn delete-submit" hidden><i class="fad fa-trash"></i>
                                </button>
                                    @if(!$item->isSuperAdmin())
                                        @method('delete')
                                        @csrf
                                        <span class="btn-danger btn delete"><i class="fad fa-trash"></i></span>
                                    @else
                                        <span>غیر مجاز</span>
                                    @endif
                                </form>
                        </span>
                        </li>
                    </ul>
                </li>
            </ul>
        @endforeach
        <div class="row paginate_style">
            {{$data['manager']->render()}}
        </div>
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
        $(".ban").click(function () {
            $id = $(this).attr('data-id');
            $csrf = "{{@csrf_token()}}";
            $method = "put";
            $.ajax({
                url: "{{route('manager.updateBan')}}",
                type: 'post',
                data: {_token: $csrf, _method: $method, id: $id},
                success: function (response) {
                    if (response === "success") {
                        location.reload();
                    }
                }
            });
        });
    </script>
@endsection

