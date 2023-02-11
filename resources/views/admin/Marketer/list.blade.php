@extends('admin.layouts.master')

@section('title')
    <title>{{$data['title']}}</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>نام</th>
                        @can('confirm-marketer')
                            <th>تایید ادمین</th>
                        @endcan
                        <th>کیف پول</th>
                        <th>معرف</th>
                        <th>تاریخ آخرین فعالیت</th>
                        <th>تاریخ دقیق آخرین فعالیت</th>
                        <th>وضعیت بن</th>
                        @can('edit-currency-marketer')
                            <th>تغییر نرخ</th>
                        @endcan
                        @can('edit-marketer')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('ban-marketer')
                            <th>بن</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['marketer'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->name }}</td>
                            @can('confirm-marketer')
                                <td><input type="checkbox"
                                           {{$item->confirm_admin == 1 ? "checked" : ""}} class="confirm"
                                           data-id="{{$item->id}}"
                                           value="{{$item->confirm_admin}}"></td>
                            @endcan
                            <td>{{$item->wallet}} R</td>
                            <td>{{$item->Introduced == "-" ? "سایت" : $item->Introduced}}</td>
                            <td>{{$item->last_activiti != "null" ? $item->last_activiti->diffInDays(\Carbon\Carbon::now())." روز پیش" : "بدون فعالیت"}}</td>
                            <td>{{$item->last_activiti != "null" ? $item->last_activiti : "بدون فعالیت"}}</td>
                            <td>{{$item->ban == 1 ? "بن میباشد" : "بن نمیباشد"}}</td>
                            @can('edit-currency-marketer')
                                <td>
                                    <a class="btn-warning btn" href="{{route('wallet.index',['user'=>$item->id])}}"><i
                                            class="fas fa-money-bill"></i></a>
                                </td>
                            @endcan
                            @can('edit-marketer')
                                <td>
                                    <a class="btn-primary btn" href="{{route('marketer.edit',$item->id)}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('ban-marketer')
                                <td>
                                    <form action="{{route('marketer.ban',$item->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn-{{$item->ban == 1 ? "danger" : "success"}} btn" type="submit"><i
                                                class="fa fa-ban"></i>
                                        </button>
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
            {{$data['marketer']->render()}}
        </div>
        @foreach($data['marketer'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name }}</div>
                    <ul style="display: none">
                        @can('confirm-marketer')
                            <li>
                                <span>تایید ادمین</span>
                                <span><input type="checkbox"
                                             {{$item->confirm_admin == 1 ? "checked" : ""}} class="confirm"
                                             data-id="{{$item->id}}"
                                             value="{{$item->confirm_admin}}"></span>
                            </li>
                        @endcan
                        <li>
                            <span>کیف پول</span>
                            <span>{{$item->wallet}} R</span>
                        </li>
                            <li>
                                <span>معرف</span>
                                <span>{{$item->Introduced == "-" ? "سایت" : $item->Introduced}}</span>
                            </li>
                            <li>
                                <span>تاریخ آخرین فعالیت</span>
                                <span>{{$item->last_activiti != "null" ? $item->last_activiti->diffInDays(\Carbon\Carbon::now())." روز پیش" : "بدون فعالیت"}}</span>
                            </li>
                            <li>
                                <span>تاریخ دقیق آخرین فعالیت</span>
                                <span>{{$item->last_activiti != "null" ? $item->last_activiti : "بدون فعالیت"}}</span>
                            </li>
                        <li>
                            <span>وضعیت بن</span>
                            <span>{{$item->ban == 1 ? "بن میباشد" : "بن نمیباشد"}}</span>
                        </li>
                        @can('edit-currency-marketer')
                            <li>
                                <span>تغییر نرخ</span>
                                <span>
                                    <a class="btn-warning btn" href="{{route('wallet.index',['user'=>$item->id])}}"><i
                                            class="fas fa-money-bill"></i></a>
                                </span>
                            </li>
                        @endcan
                            @can('edit-marketer')
                        <li>
                            <span>@lang('text.edit')</span>
                            <span><a class="btn-primary btn" href="{{route('marketer.edit',$item->id)}}"><i
                                        class="fa fa-pencil"></i></a></span>
                        </li>
                            @endcan
                        @can('edit-data-user')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span>
                                        <a class="btn-primary btn" href="{{route('user_business.edit',$item->id)}}"><i
                                                class="fa fa-pencil"></i></a>
                                    </span>
                            </li>
                        @endcan
                            @can('ban-marketer')
                                <li>
                                    <span>بن</span>
                                    <span>
                                    <form action="{{route('marketer.ban',$item->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn-{{$item->ban == 1 ? "danger" : "success"}} btn" type="submit"><i
                                                class="fa fa-ban"></i>
                                        </button>
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
            $("#ingredient").select2({
                dir: 'rtl'
            });
            $(".confirm").click(function () {
                $id = $(this).attr('data-id');
                $csrf = "{{@csrf_token()}}";
                $method = "put";
                $.ajax({
                    url: "{{route('marketer.confirm')}}",
                    type: 'post',
                    data: {_token: $csrf, _method: $method, id: $id},
                    success: function (response) {
                        if (response === "success") {

                        }
                    }
                });
            });
        });
    </script>
@endsection
