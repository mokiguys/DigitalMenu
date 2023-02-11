@extends('admin.layouts.master')

@section('title')
    <title>لیست صاحبین کسب و کار</title>
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
                        @can('confirm-user_business')
                            <th>تایید ادمین</th>
                        @endcan
                        <th>کیف پول</th>
                        <th>وضعیت بن</th>
                        @can('edit-currency-user')
                            <th>تراکنش</th>
                        @endcan
                        @can('edit-data-user')
                            <th>@lang('text.edit')</th>
                        @endcan
                        <th>بن</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['user'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->name }}</td>
                            @can('confirm-user_business')
                                <td><input type="checkbox"
                                           {{$item->confirm_admin == 1 ? "checked" : ""}} class="confirm"
                                           data-id="{{$item->id}}"
                                           value="{{$item->confirm_admin}}"></td>
                            @endcan
                            <td>{{$item->wallet}} R</td>
                            <td>{{$item->ban == 1 ? "بن میباشد" : "بن نمیباشد"}}</td>
                            @can('edit-currency-user')
                                <td>
                                    <a class="btn-warning btn"
                                       href="{{route('user_business.wallet.index',['user'=>$item->id])}}"><i
                                            class="fas fa-money-bill"></i></a>
                                </td>
                            @endcan
                            @can('edit-data-user')
                                <td>
                                    <a class="btn-primary btn" href="{{route('user_business.edit',$item->id)}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            <td>
                                <form action="{{route('user_business.ban',$item->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn-{{$item->ban == 1 ? "danger" : "success"}} btn" type="submit"><i
                                            class="fa fa-ban"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['user']->render()}}
        </div>
        @foreach($data['user'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name }}</div>
                    <ul style="display: none">
                        @can('confirm-user_business')
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
                                <span>وضعیت بن</span>
                                <span>{{$item->ban == 1 ? "بن میباشد" : "بن نمیباشد"}}</span>
                            </li>
                            @can('edit-currency-user')
                                <li>
                                    <span>تراکنش</span>
                                    <span>
                                    <a class="btn-warning btn"
                                       href="{{route('user_business.wallet.index',['user'=>$item->id])}}"><i
                                            class="fas fa-money-bill"></i></a>
                                </span>
                                </li>
                            @endcan
                        <li>
                            <span>@lang('text.edit')</span>
                            <span><a class="btn-primary btn" href="{{route('user_business.edit',$item->id)}}"><i
                                        class="fa fa-pencil"></i></a></span>
                        </li>
                            @can('edit-data-user')
                                <li>
                                <span>@lang('text.edit')</span>
                                    <span>
                                        <a class="btn-primary btn" href="{{route('user_business.edit',$item->id)}}"><i
                                                class="fa fa-pencil"></i></a>
                                    </span>
                                </li>
                            @endcan
                            <li>
                                <span>بن</span>
                                <span>
                                    <form action="{{route('user_business.ban',$item->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn-{{$item->ban == 1 ? "danger" : "success"}} btn" type="submit"><i
                                                class="fa fa-ban"></i>
                                        </button>
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
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            });

            $(".confirm").click(function () {
                $id = $(this).attr('data-id');
                $csrf = "{{@csrf_token()}}";
                $method = "put";
                $.ajax({
                    url: "{{route('user_business.confirm')}}",
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
