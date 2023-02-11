@extends('admin.layouts.master')
@section('title')
    <title>جزییات تیکت</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">


            @foreach($data['main_ticket'] as $item)
                @if($item->user_agent != 'Admin')
                    <div class="col-12 mb-3">
                        <div class="chat_left">
                            <div class="header_chat">
                                <span>{{$item->Users['name']}}</span>
                                <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                            </div>
                            <hr>
                            <p>{{$item->message}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @else
                    <div class="col-12 mb-3">
                        <div class="chat_right">
                            <div class="header_chat">
                                <span>ادمین</span>
                                <span>{{jdate($item->created_at)->format('%d %B %y')}}</span>
                            </div>
                            <hr>
                            <p>{{$item->message}}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            @endforeach
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <p class="text-right mb-0">پاسخ به تیکت</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('ticket.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="parent" value="{{Request::segment(3)}}">
                                <input type="hidden" name="subject" value="{{$data['subject']}}">
                                <textarea name="message" required id="message" placeholder="متن پاسخ خود را بنویسید" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="ارسال پاسخ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

