@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.shopTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            {{--            <div class="col-12 mb-5">--}}
            {{--                <div class="card">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.foodsTitleAdd')</h4>--}}
            {{--                        <form class="forms-sample" method="post" action="{{route('food.store')}}"--}}
            {{--                              enctype="multipart/form-data">--}}
            {{--                            @if($errors->any())--}}
            {{--                                <div class="alert alert-danger text-right">--}}
            {{--                                    <ul class="mb-0">--}}
            {{--                                        @foreach($errors->all() as $error)--}}
            {{--                                            <li>{{$error}}</li>--}}
            {{--                                        @endforeach--}}
            {{--                                    </ul>--}}
            {{--                                </div>--}}
            {{--                            @endif--}}
            {{--                            @csrf--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label for="fa"--}}
            {{--                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>--}}
            {{--                                <input type="text" name="fa" class="form-control pt-1" id="fa"--}}
            {{--                                       value="{{old('fa')}}">--}}
            {{--                            </div>--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label for="en"--}}
            {{--                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>--}}
            {{--                                <input type="text" name="en" class="form-control pt-1" id="en"--}}
            {{--                                       value="{{old('en')}}">--}}
            {{--                            </div>--}}
            {{--                            <div class="form-group">--}}
            {{--                                <label for="tr"--}}
            {{--                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>--}}
            {{--                                <input type="text" name="tr" class="form-control pt-1" id="tr"--}}
            {{--                                       value="{{old('tr')}}">--}}
            {{--                            </div>--}}

            {{--                            <button type="submit"--}}
            {{--                                    class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>@lang('text.title')</th>
                        @can('confirm-shop')
                            <th>@lang('text.confirmation_admin')</th>
                        @endcan
                        <th>@lang('text.category')</th>
                        <th>@lang('text.city')</th>
                        <th>@lang('text.plan')</th>
                        <th>وضعیت پرداخت</th>
                        <th>فعالیت</th>
                        <th>@lang('text.expire')</th>
                        <th>سازنده</th>
                        @can('edit-menu-shop')
                            <th>@lang('text.menu')</th>
                        @endcan
                        @can('edit-shop')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('delete-shop')
                            <th>@lang('text.delete')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['shop'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            @switch(app()->getLocale())
                                @case('fa')
                                <td>{{$item->fa != null ? $item->fa : "تکمیل نشده"}}</td>
                                @break
                                @case('en')
                                <td>{{$item->en != null ? $item->en : "Not completed"}}</td>
                                @break
                                @case('tr')
                                <td>{{$item->tr != null ? $item->tr : "Tamamlanmamıs"}}</td>
                                @break
                            @endswitch
                            @can('confirm-shop')
                                <td><input type="checkbox" {{$item->confirmAdmin == 1 ? "checked" : ""}} class="confirm"
                                           data-id="{{$item->id}}"
                                           value="{{$item->confirmAdmin}}"></td>
                            @endcan
                            <td>{{$item->CategoryStore[app()->getLocale()]}}</td>
                            <td>{{$item->Cities[app()->getLocale()]}}</td>
                            <td>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</td>
                            <td>{{$item->status_order == 1 ? "پرداخت شده" : "پرداخت نشده"}}</td>
                            @if($item->finish_time > 0 && $item->status_order == 1)
                                <td>{{__("text.active")}}</td>
                                <td>{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</td>
                            @else
                                <td>{{ __("text.deActive")}}</td>
                                <td>{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</td>
                            @endif
                            @if($item->user_id == $item->creator_id)
                                <td>صاحب کسب و کار</td>
                            @else
                                <td>{{$item->Users->name}}</td>
                            @endif
                            @can('delete-shop')
                                <td>
                                    <form action="{{route('shop.destroy',['shop'=>$item->id])}}" method="POST">
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
            {{$data['shop']->render()}}
        </div>
        @foreach($data['shop'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item[app()->getLocale()]}}</div>
                    <ul style="display: none">
                        @can('confirm-shop')
                            <li>
                                <span>@lang('text.confirmation_admin')</span>
                                <span><input type="checkbox"
                                             {{$item->confirmAdmin == 1 ? "checked" : ""}} class="confirm"
                                             data-id="{{$item->id}}"
                                             value="{{$item->confirmAdmin}}"></span>
                            </li>
                        @endcan
                        <li>
                            <span>@lang('text.category')</span>
                            <span>{{$item->CategoryStore[app()->getLocale()]}}</span>
                        </li>
                            <li>
                                <span>@lang('text.city')</span>
                                <span>{{$item->Cities[app()->getLocale()]}}</span>
                            </li>
                            <li>
                                <span>@lang('text.plan')</span>
                                <span>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</span>
                            </li>
                            <li>
                                <span>وضعیت پرداخت</span>
                                <span>{{$item->status_order == 1 ? "پرداخت شده" : "پرداخت نشده"}}</span>
                            </li>
                            <li>
                                <span>فعالیت</span>
                                @if($item->finish_time > 0 && $item->status_order == 1)
                                    <span>{{__("text.active")}}</span>
                                @else
                                    <span>{{ __("text.deActive")}}</span>
                                @endif
                            </li>
                            <li>
                                <span>@lang('text.expire')</span>
                                @if($item->finish_time > 0 && $item->status_order == 1)
                                    <span>{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</span>
                                @else
                                    <span>{{$item->finish_time <= 0 ?  __('text.dayBeen',['day'=>abs($item->finish_time)]) :  __('text.dayLeft',['day'=>abs($item->finish_time)]) }}</span>
                                @endif
                            </li>
                            <li>
                                <span>سازنده</span>
                                @if($item->user_id == $item->creator_id)
                                    <span>صاحب کسب و کار</span>
                                @else
                                    <span>{{$item->Users->name}}</span>
                                @endif
                            </li>
                        <li>
                            <span>@lang('text.edit')</span>
                            <span><a class="btn-primary btn" href="{{route('shop.edit',['shop'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>@lang('text.delete')</span>
                            <span>
                                        <form action="{{route('shop.destroy',['shop'=>$item->id])}}"
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
                    url: 'UpdateConfirmShop',
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
