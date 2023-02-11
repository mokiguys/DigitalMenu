@extends('layouts.app')

@section('body')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100 rtl">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    @lang('text.language')
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a></li>
                                    <li><a class="dropdown-item" href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a></li>
                                    <li><a class="dropdown-item" href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a></li>
                                </ul>
                            </div>
                            <hr>
                            <p class="text-center" style="direction: rtl">@lang('text.titleLogin')</p>
                            <hr>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="label {{app()->getLocale() == "fa" ? "float-right" : ""}}">@lang('text.email')</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                               name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert" style="direction: rtl">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label {{app()->getLocale() == "fa" ? "float-right" : ""}}">@lang('text.password')</label>
                                    <div class="input-group">
                                        <input type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">@lang('text.login')</button>
                                </div>
                            </form>
                        </div>
                        <p class="footer-text mt-2 text-light text-center">copyright © 2020 Berkeh.tech. All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
