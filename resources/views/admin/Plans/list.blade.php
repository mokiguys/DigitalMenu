@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.PlanTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>@lang('text.planType')</th>
                        <th>@lang('text.expire')</th>
                        @can('edit-plan')
                            <th>@lang('text.edit')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['plan'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            @switch($item->plan)
                                @case(1)
                                <td>Free</td>
                                @break
                                @case(2)
                                <td>Standard</td>
                                @break
                                @case(3)
                                <td>Premium</td>
                                @break
                            @endswitch
                            <td class="py-1">{{__('text.dayExpire',['day'=>$item->expireTime])}}</td>
                            @can('edit-plan')
                                <td>
                                    <a class="btn-primary btn" href="{{route('plan.edit',['plan'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['plan'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">
                        @switch($item->plan)
                            @case(1)
                            <td>Free</td>
                            @break
                            @case(2)
                            <td>Standard</td>
                            @break
                            @case(3)
                            <td>Premium</td>
                            @break
                        @endswitch
                    </div>
                    <ul style="display: none">
                        <li>
                            <span>@lang('text.expire')</span>
                            <span>{{__('text.dayExpire',['day'=>$item->expireTime])}}</span>
                        </li>
                        @can('edit-plan')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn" href="{{route('plan.edit',['plan'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
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
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
