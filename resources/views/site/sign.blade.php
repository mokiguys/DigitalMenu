@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Sign | Minemenu</title>
@endsection
@section('main')
        <!-- start login background -->
        <div class="login-page">
            <div class="background-page">
                <div class="card login-panel-form">
                    <div class="page-login-social-login">
                        <div class="social-login">
                            <span>@lang('text.login_with_google')</span>
                            <div class="social-network">
                                <a href="{{route('auth.google')}}">
                                    <div class="page-login-icons login-icon-google">
                                        <span><i class="fab fa-google"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header heading-title"  role="tablist">

                        <div class="login-heading-title" >
                            <a href="#login" class="tabs_users active" data-name="login" id="login-tab" data-toggle="tab" role="tab" aria-controls="login" aria-selected="true">
                                @lang('text.login')
                            </a>
                        </div>
                        <div class="register-heading-title">
                            <a href="#register" class="tabs_users" data-name="register" id="register-tab" data-toggle="tab" role="tab" aria-controls="register" aria-selected="false">
                                @lang('text.register')
                            </a>
                        </div>
                    </div>


                    <div class=" card-body">
                        <!-- form login -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form action="{{route('user.login')}}" method="POST" class="login">
                                    @csrf
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" name="email" type="email" required
                                            placeholder="{{__('text.email')}}">
                                    </div>
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" name="password" type="password" required
                                            placeholder="{{__('text.password')}}">
                                    </div>
                                    <a href="#" class="lost-pass">@lang('text.forget_password')</a>
                                    <div class="clearfix"></div>
                                    <div class="form-feild mb-0">
                                        <input type="submit" class="btn btn-primary text-light mt-3" name="submit" value="{{__('text.login')}}">
                                    </div>
                                </form>
                            </div>
                            <!-- form register -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="{{app()->getLocale() == "fa" ? "padding-right:10px;text-align:right" : ""}}">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('user.register')}}" method="POST" class="login register">
                                    @csrf
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" value="{{old('name')}}" name="name" type="text" required
                                            placeholder="{{__('text.fullName')}}">
                                    </div>
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" value="{{old('email')}}" name="email" type="email" required
                                            placeholder="{{__('text.email')}}">
                                    </div>
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" name="password" type="password" required
                                            placeholder="{{__('text.password')}}">
                                    </div>
                                    <div class="form-feild">
                                        <input class="form-control input-group-lg" name="password_confirmation" type="password" required
                                            placeholder="{{__('text.confirm_password')}}">
                                    </div>
                                    <div class="form-feild">
                                        <select name="type_register" class="form-control input-group-lg pt-1" id="">
                                            <option value="0" selected disabled>@lang('text.membership_type')</option>
                                            <option value="1">@lang("text.business_owner")</option>
                                            <option value="2">@lang('text.marketer')</option>
                                        </select>
                                    </div>
                                    <div class="form-feild">
                                        <select name="type_introduced" class="form-control input-group-lg pt-1" id="">
                                            <option value="0" selected disabled>@lang("text.method_of_introduction")</option>
                                            <option value="1" >@lang('text.site')</option>
                                            <option value="2" >@lang('text.marketer')</option>
                                        </select>
                                    </div>
                                    <div class="form-feild name-introduced" style="display: none">
                                        <input class="form-control input-group-lg" name="Introduced" type="text"
                                               placeholder="{{__('text.marketer_code')}}">
                                    </div>
                                    <div class="form-feild mb-0">
                                        <input type="submit" class="btn btn-primary text-light" value="{{__('text.register')}}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
