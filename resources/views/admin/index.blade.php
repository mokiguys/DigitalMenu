@extends('admin.layouts.master')
@section('title')
    <title>{{$data['title']}}</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="text-center alert alert-warning">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="number_alert">10</span>
                                        <p class="mb-0">تعداد تیکت های پاسخ داده نشده کاربران</p>
                                    </div>
                                    <a href="{{route('ticket.index',['type'=>'User'])}}" class="btn btn-block btn-primary mt-3">بررسی</a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="text-center alert alert-info">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="number_alert">5</span>
                                        <p class="mb-0">تعداد تیکت های پاسخ داده نشده بازاریابان</p>
                                    </div>
                                    <a href="{{route('ticket.index',['type'=>'Marketer'])}}" class="btn btn-block btn-primary mt-3">بررسی</a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="text-center alert alert-danger">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="number_alert">23</span>
                                        <p class="mb-0">تعداد کلمات ترجمه نشده</p>
                                    </div>
                                    <a href="{{route('ingredient.index')}}" class="btn btn-block btn-primary mt-3">بررسی</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
