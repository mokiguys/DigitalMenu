@extends('admin.layouts.master')

@section('title')
    <title>موضوع تیکت ها</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            @can('add-subject-ticket')
            <div class="col-12 mb-5">
                <form class="forms-sample" method="post" action="{{route('ticket.subject.store')}}">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-right">اضافه کردن موضوع</h4>
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="fa"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>
                                <input type="text" name="fa" class="form-control pt-1" id="fa"
                                       value="{{old('fa')}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{old('en')}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{old('tr')}}">
                            </div>
                            <div class="form-group">
                                <label for="type"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">نوع کاربری</label>
                                <select name="type" id="type" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    <option value="User">صاحب کسب و کار</option>
                                    <option value="Marketer">بازاریاب</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endcan
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>عنوان</th>
                        <th>نوع کاربر</th>
                        @can('edit-subject-ticket')
                            <th>ویرایش</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['subject'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td class="py-1">{{$item[app()->getLocale()]}}</td>
                            <td class="py-1">{{$item->agent_type == "User" ? "کسب و کار" : "بازاریاب"}}</td>
                            @can('edit-subject-ticket')
                            <td>
                                <a class="btn-primary btn"
                                   href="{{route('ticket.subject.edit',['ticket_subject'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                                @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($data['subject'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">
                        {{$item[app()->getLocale()]}}
                    </div>
                    <ul style="display: none">
                        <li>
                            <span>نوع کاربر</span>
                            <span>{{$item->agent_type == "User" ? "کسب و کار" : "بازاریاب"}}</span>
                        </li>
                        @can('edit-subject-ticket')
                        <li>
                            <span>ویرایش</span>
                            <span>
                                        <a class="btn-primary btn"
                                           href="{{route('ticket.subject.edit',['ticket_subject'=>$item->id])}}"><i
                                                class="fa fa-pencil"></i></a>
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
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
