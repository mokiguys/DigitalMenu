@extends('admin.layouts.master')

@section('title')
    <title>تیکت ها</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>موضوع</th>
                        <th>تاریخ</th>
                        <th>وضعیت تیکت</th>
                        @can('chat-ticket')
                        <th>پاسخ</th>
                        @endcan
                        @can('close-ticket')
                            <th>بستن</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['ticket_list'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            @foreach($data['ticketSubject'] as $su)
                                @if($item->subject == $su->id)
                                    <td>{{$su[app()->getLocale()]}}</td>
                                @endif
                            @endforeach
                            <td class="py-1">{{jdate($item->created_at)->format('%d %B %y')}}</td>
                            @if($item->user_agent != "Admin" && $item->close == 0)
                                <td class="py-1 font-weight-bold text-success">پاسخ داده شده</td>
                            @elseif($item->user_agent != "Admin" && $item->close == 1)
                                <td class="py-1 font-weight-bold text-dark">بسته شده</td>
                            @elseif($item->user_agent == "Admin" && $item->close == 0)
                                <td class="py-1 font-weight-bold text-warning">پاسخ داده نشده</td>
                            @elseif($item->user_agent == "Admin" && $item->close == 1)
                                <td class="py-1 font-weight-bold text-dark">بسته شده</td>
                            @endif
                            @can('chat-ticket')
                            <td>
                                @if($item->close == 0)
                                    <a class="btn-primary btn"
                                       href="{{route('ticket.show',['ticket'=>$item->parent_id])}}"><i
                                            class="fa fa-comment"></i></a>
                                @else
                                    -
                                @endif
                            </td>
                            @endcan
                            @can('close-ticket')
                                <td>
                                    @if($item->close == 0)
                                        <a class="btn-danger text-light close_ticket btn" data-id="{{$item->id}}"><i
                                                class="fa fa-ban"></i></a>
                                    @else
                                        -
                                    @endif
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['ticket_list'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">
                        @foreach($data['ticketSubject'] as $su)
                            @if($item->subject == $su->id)
                                <td>{{$su[app()->getLocale()]}}</td>
                            @endif
                        @endforeach
                    </div>
                    <ul style="display: none">
                        <li>
                            <span>تاریخ</span>
                            <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                        </li>
                        <li>
                            <span>وضعیت تیکت</span>
                            @if($item->user_agent != "Admin" && $item->close == 0)
                                <span class="py-1 font-weight-bold text-success">پاسخ داده شده</span>
                            @elseif($item->user_agent != "Admin" && $item->close == 1)
                                <span class="py-1 font-weight-bold text-secondary">بسته شده</span>
                            @elseif($item->user_agent == "Admin" && $item->close == 0)
                                <span class="py-1 font-weight-bold text-warning">پاسخ داده نشده</span>
                            @elseif($item->user_agent == "Admin" && $item->close == 1)
                                <span class="py-1 font-weight-bold text-dark">بسته شده</span>
                            @endif
                        </li>
                        @can('chat-ticket')
                        <li>
                            <span>پاسخ</span>
                            <span>
                                @if($item->close == 0)
                                    <a class="btn-primary btn"
                                       href="{{route('ticket.show',['ticket'=>$item->parent_id])}}"><i
                                            class="fa fa-comment"></i></a>
                                @else
                                    -
                                @endif
                            </span>
                        </li>
                        @endcan
                        @can('close-ticket')
                        <li>
                            <span>بستن</span>
                            <span>
                                @if($item->close == 0)
                                    <a class="btn-danger text-light close_ticket btn" data-id="{{$item->id}}"><i
                                            class="fa fa-ban"></i></a>
                                @else
                                    -
                                @endif
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
            $("body").on('click', '.close_ticket', function () {
                swal("آیا از بستن تیکت اطمینان دارید ؟ بعد از بستن قابلیت پاسخ ندارد", {
                    buttons: {
                        cancel: "@lang('text.close')",
                        catch: {
                            text: "بستن",
                            value: "catch",
                        },
                    },
                }).then((value) => {
                    $id = $(this).attr('data-id');
                    $csrf = "{{@csrf_token()}}";
                    $method = "put";
                    $.ajax({
                        url: 'CloseTicket',
                        type: 'post',
                        data: {_token: $csrf, _method: $method, id: $id},
                        success: function (response) {
                            if (response === "done") {
                                swal('با موفقیت بسته شد', {
                                    icon: 'success'
                                })
                            }
                        }
                    });
                });
            });
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
