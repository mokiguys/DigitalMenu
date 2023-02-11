@extends('admin.layouts.master')


@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-right">ویرایش کردن موضوع تیکت</h4>
                        <form class="forms-sample" method="post" action="{{route('ticket.subject.update',['ticket_subject' => $data['ticket_subject'][0]->id])}}"
                              enctype="multipart/form-data">
                            @method('put')
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul>
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
                                       value="{{$data['ticket_subject'][0]->fa}}">
                            </div>
                            <div class="form-group">
                                <label for="en"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                <input type="text" name="en" class="form-control pt-1" id="en"
                                       value="{{$data['ticket_subject'][0]->en}}">
                            </div>
                            <div class="form-group">
                                <label for="tr"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                <input type="text" name="tr" class="form-control pt-1" id="tr"
                                       value="{{$data['ticket_subject'][0]->tr}}">
                            </div>
                            <div class="form-group">
                                <label for="type"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">نوع کاربری</label>
                                <select name="type" id="type" class="form-control pt-1">
                                    <option value="0" selected disabled>@lang('text.select_default')</option>
                                    <option value="User" {{$data['ticket_subject'][0]->agent_type == "User" ? "selected" : ""}}>صاحب کسب و کار</option>
                                    <option value="Marketer" {{$data['ticket_subject'][0]->agent_type == "Marketer" ? "selected" : ""}}>بازاریاب</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
