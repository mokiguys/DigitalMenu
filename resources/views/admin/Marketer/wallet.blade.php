@extends('admin.layouts.master')

@section('title')
    <title>{{$data['title']}}</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p class="mb-0 text-right">کیف پول</p>
                        <p>{{$data['user'][0]->wallet}} ریال</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('wallet.update',['wallet'=>$data['user'][0]->id])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="wallet" class="float-right">مبلغ</label>
                                        <input class="form-control" type="number" value="0" min="0" name="wallet" id="wallet">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="percentage" class="float-right">درصد پرداختی از ثبت نام ها</label>
                                        <input class="form-control" type="number" value="{{$data['user'][0]->percentage}}" min="0" name="percentage" id="percentage">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="transaction" class="float-right">نوع تراکنش جدید</label>
                                        <select class="form-control pt-1" name="transaction" id="transaction">
                                            <option value="0">عدم نمایش برای بازاریاب</option>
                                            <option value="1">افزایشی</option>
                                            <option value="2">کاهشی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="about" class="float-right">دلیل تراکنش</label>
                                        <select class="form-control pt-1" name="about" id="about">
                                            <option value="1">معرفی بازاریاب</option>
                                            <option value="2">فعالیت زیاد</option>
                                            <option value="3">شارژ فروشگاه</option>
                                            <option value="4">ثبت نام فروشگاه</option>
                                            <option value="4">متفرقه</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group text-right">
                                        <input type="submit" class="btn btn-success" value="ثبت تراکنش">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block mt-3">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0 text-right">بازاریاب های معرفی شده</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>@lang('text.row')</th>
                                <th>نام</th>
                                <th>تایید ادمین</th>
                                <th>کیف پول</th>
                                <th>تاریخ عضویت</th>
                                <th>تاریخ دقیق</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['introduced'] as $key => $item)
                                <tr class="text-center">
                                    <td class="py-1">{{$key+1}}</td>
                                    <td>{{$item->name }}</td>
                                    <td>{{$item->confirm_admin == 1 ? "تایید شده" : "تایید نشده"}}</td>
                                    <td>{{$item->wallet}} R</td>
                                    <td>{{$item->created_at->diffInDays(\Carbon\Carbon::now())}} روز گذشته</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block mt-3">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0 text-right">فروشگاه های ثبت نام شده</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>@lang('text.row')</th>
                                <th>نام فروشگاه</th>
                                <th>تایید ادمین</th>
                                <th>نوع پلن</th>
                                <th>تاریخ ثبت نام</th>
                                <th>مبلغ</th>
                                <th>وضعیت پرداخت</th>
                                <th>تاریخ پرداخت</th>
                                <th>تاریخ دقیق پرداخت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['shop'] as $key => $item)
                                @if($item->typePayment == 1)
                                    <tr class="text-center">
                                        <td class="py-1">{{$key+1}}</td>
                                        <td>{{$item[app()->getLocale()] }}</td>
                                        <td>{{$item->confirm_admin == 1 ? "تایید شده" : "تایید نشده"}}</td>
                                        <td>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->price}} {{$item->currency == 1 ? "ریال" : "لیر"}}</td>
                                        <td>{{$item->status_order == 1 ? "موفق" : "ناموفق"}}</td>
                                        <td>{{$item->created_payment->diffInDays(\Carbon\Carbon::now())}} روز گذشته</td>
                                        <td>{{$item->created_payment}}</td>
                                        </td>
                                    </tr>
                                    @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block mt-3">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0 text-right">فروشگاه های شارژ شده</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>@lang('text.row')</th>
                                <th>نام فروشگاه</th>
                                <th>نوع پلن</th>
                                <th>مبلغ</th>
                                <th>وضعیت پرداخت</th>
                                <th>تاریخ پرداخت</th>
                                <th>تاریخ دقیق پرداخت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['charge'] as $key => $item)
                                    <tr class="text-center">
                                        <td class="py-1">{{$key+1}}</td>
                                        <td>{{$item->store_name }}</td>
                                        <td>{{$item->plan == 1 ? "Free" : ($item->plan == 2 ? "Standard" : "Premium")}}</td>
                                        <td>{{$item->price}} {{$item->currency == 1 ? "ریال" : "لیر"}}</td>
                                        <td>{{$item->status_order == 1 ? "موفق" : "ناموفق"}}</td>
                                        <td>{{$item->created_at->diffInDays(\Carbon\Carbon::now())}} روز گذشته</td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block mt-3">
                <div class="card">
                    <div class="card-header">
                        <p class="mb-0 text-right">تراکنش های انجام شده</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>@lang('text.row')</th>
                                <th>نوع تراکنش</th>
                                <th>موضوع</th>
                                <th>مبلغ</th>
                                <th>درصد پرداختی</th>
                                <th>تاریخ</th>
                                <th>تاریخ دقیق</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['transaction'] as $key => $item)
                                <tr class="text-center">
                                    <td class="py-1">{{$key+1}}</td>
                                    <td>{{$item->transaction == 1 ? "افزایشی" : ($item->transaction == 2 ? "کاهشی" : "عدم نمایش")}}</td>
                                    <td>
                                        @switch($item->about)
                                            @case(1)
                                            معرفی بازاریاب
                                            @break
                                            @case(2)
                                            فعالیت زیاد
                                            @break
                                            @case(3)
                                            شارژ فروشگاه
                                            @break
                                            @case(4)
                                            ثبت نام فروشگاه
                                            @break
                                            @case(5)
                                            متفرقه
                                            @break
                                            @endswitch
                                    </td>
                                    <td>{{$item->money}}</td>
                                    <td>{{$item->percentage}}%</td>
                                    <td>{{$item->created_at->diffInDays(\Carbon\Carbon::now())}} روز گذشته</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach($data['introduced'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->name}}</div>
                    <ul style="display: none">
                        <li>
                            <span>تایید ادمین</span>
                            <span>{{$item->confirm_admin == 1 ? "تایید شده" : "تایید نشده"}}</span>
                        </li>
                        <li>
                            <span>کیف پول</span>
                            <span>{{$item->wallet}}</span>
                        </li>
                        <li>
                            <span>تاریخ عضویت</span>
                            <span>{{$item->created_at}}</span>
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
