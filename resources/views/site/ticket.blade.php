@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Ticket Detail | Minemenu</title>
@endsection
@section('main')
    <!-- background-header -->
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                    @lang("text.ticket")
                </h1>
            </div>
        </div>
        <!-- start section -->
        <div class="container">
            <div class="ticket_page">
                @foreach($data['main_ticket'] as $item)
                    @if($item->user_agent != 'Admin')
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ticket_box">
                                    <div class="box_message  message_user">
                                        <div class="header_box">
                                    <span>
                                        <i class="fal fa-user"></i>
                                        @lang("text.user_single")
                                    </span>
                                            <span>
                                        <i class="fal fa-calendar-alt"></i>
                                                @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    {{jdate($item->created_at)->format('%d %B %y')}}
                                                @else
                                                    {{$item->created_at}}
                                                @endif
                                    </span>
                                        </div>
                                        <div class="section_box">
                                            <p>
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row" style="direction: ltr;">
                            <div class="col-12 col-md-6">
                                <div class="ticket_box">
                                    <div class="box_message  message_admin">
                                        <div class="header_box">
                                    <span>
                                        <i class="fal fa-user-tie"></i>
                                        @lang("text.admin")
                                    </span>
                                            <span>
                                        <i class="fal fa-calendar-alt"></i>
                                        @if(app()->getLocale() == "fa" || app()->getLocale() == "ar")
                                                    {{jdate($item->created_at)->format('%d %B %y')}}
                                                @else
                                                    {{$item->created_at}}
                                                @endif
                                    </span>
                                        </div>
                                        <div class="section_box">
                                            <p>
                                                {{$item->message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('ticketSite.answer')}}" method="POST">
                            @csrf
                            <div class="message_user">
                                <label for="msg_user">@lang("text.detail_message") :</label>
                                <textarea required name="message" id="msg_user" cols="30" rows="10"></textarea>
                                <input type="hidden" name="parent" value="{{Request::segment(2)}}">
                                <input type="hidden" name="subject" value="{{$data['subject']}}">
                            </div>
                            <div class="input_message">
                                <input type="submit" class="btn" value="@lang("text.send_message")">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
