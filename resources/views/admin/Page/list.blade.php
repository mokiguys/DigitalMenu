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
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>ویرایش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['page'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                <a class="btn-primary btn" href="{{route('page.edit',['page' => $item->id])}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['page'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item->title}}</div>
                    <ul style="display: none">
                        <li>
                            <span>ویرایش</span>
                            <span><a class="btn-primary btn" href="{{route('page.edit',['page' => $item->id])}}"><i
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

