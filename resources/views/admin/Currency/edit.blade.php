@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.currencyTitle')</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.currencyAutoTitle')</h4>
                        <div class="d-flex justify-content-between">
                            <span>{{ __('text.updateLastTimeCurrency',['time'=>$data['currency']->updated_at])}}</span>
                            <a href="{{route('autoUpdateCurrency')}}" class="btn btn-warning text-light">@lang('text.currencyAutoTitle')</a>
                        </div>
                        <hr>
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.currencyHandTitle')</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('currency.update',['currency' => $data['currency']->id])}}"
                              enctype="multipart/form-data">
                            @method('put')
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
                                <label for="usd" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.usdPrice')</label>
                                <input type="number" min="1" name="usd" class="form-control {{$data['currency']->lang == 'en' ? "ltr-style" : ""}}" id="usd" value="{{$data['currency']->usd}}">
                            </div>
                            <div class="form-group">
                                <label for="try" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.tryPrice')</label>
                                <input type="number" min="1" name="try" class="form-control {{$data['currency']->lang == 'en' ? "ltr-style" : ""}}" id="try" value="{{$data['currency']->try}}">
                            </div>
                            <div class="form-group">
                                <label for="florance" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.florance')</label>
                                <input type="number" min="1" name="percentage" class="form-control {{$data['currency']->lang == 'en' ? "ltr-style" : ""}}" id="florance" value="{{$data['currency']->percentage}}">
                            </div>
                            <div class="form-group">
                                <label for="key" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.key')</label>
                                <input type="text" name="key" class="form-control ltr-style" id="usd" value="{{$data['currency']->key}}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
