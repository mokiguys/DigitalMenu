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
                        <th>عنوان</th>
                        <th>عکس</th>
                        <th>@lang('text.edit')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['property'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td class="py-1">{{$item[app()->getLocale()]}}</td>
                            <td>
                                <img src="{{'../site/uploader/property/' . $item->image}}" alt="" width="60"
                                     height="60">
                            </td>
                            <td>
                                <a class="btn-primary btn" href="{{route('propertes.edit',['properte'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['property'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">
                        {{$item[app()->getLocale()]}}
                    </div>
                    <ul style="display: none">
                        <li>
                            <span>عکس</span>
                            <span><img src="{{'../site/uploader/property/' . $item->image}}" alt="" width="60"
                                       height="60"></span>
                        </li>
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn" href="{{route('propertes.edit',['properte'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
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
            })
        });
    </script>
@endsection
