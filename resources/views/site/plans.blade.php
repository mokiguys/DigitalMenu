@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Plans | Minemenu</title>
@endsection
@section('main')

    <!-- app main -->
    <section class="main_detail_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="plansBox">
                        <h2 class="text-center">@lang("text.select_plan_des")</h2>
                        <div class="row mb-0">
                            <div class="col-12">
                                <div class="row mt-3 mb-5">
                                    <div class="col-12 col-md-6 col-lg-4 plan_item">
                                        <div class="plan_content plan_height">
                                            <div class="plan_title">
                                                <h4>@lang("text.free")</h4>
                                            </div>
                                            <div class="plan_image">
                                                <img src="{{asset('site/images/free_plan.png')}}" alt="free">
                                            </div>
                                            <div class="plan_content_inner text-center">
                                                <div class="plan_subtitle">
                                                    <p>@lang("text.beginners")</p>
                                                </div>
                                                <div class="price_circle">
                                                    <div class="price">
                                                        <span
                                                            class="price_currency">{{app()->getLocale() == 'fa' ? "R" : (app()->getLocale() == 'en' ? "$" :"TL") }}</span>
                                                        {{app()->getLocale() == 'fa' ? $data['plans_free'][0]->rial : (app()->getLocale() == 'en' ? $data['plans_free'][0]->dollar :$data['plans_free'][0]->lir) }}
                                                    </div>
                                                </div>
                                                <div class="plan_description">
                                                    @php
                                                        $rules = $data['plans_free'][0]["roles_".app()->getLocale()];
                                                        $rules_array = explode(",",$rules);
                                                    @endphp
                                                    @foreach($rules_array as $item)
                                                        <p>{{$item}}</p>
                                                    @endforeach
                                                    <div class="choose_plan">
                                                        @if(Auth::user() && Auth::user()->user_type !== 'Admin')
                                                            <a href="{{route('Business.create',['business'=>'Free'])}}">@lang("text.start")</a>
                                                        @else
                                                            <a href="{{route('sign')}}">@lang("text.start")</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 plan_item">
                                        <div class="plan_content">
                                            <div class="plan_title">
                                                <h4>@lang("text.standard")</h4>
                                            </div>
                                            <div class="plan_image">
                                                <img src="{{asset('site/images/standard_plan.png')}}" alt="standard">
                                            </div>
                                            <div class="plan_content_inner text-center active_plan">
                                                <div class="plan_subtitle">
                                                    <p>@lang("text.professionals")</p>
                                                </div>
                                                <div class="price_circle">
                                                    <div class="price">
                                                        @if($data['plans_standard'][0]->discount != 0)
                                                            <div class="older_price">
                                                                <span>
                                                                    {{app()->getLocale() == 'fa' ? $data['plans_standard'][0]->rial : (app()->getLocale() == 'en' ? $data['plans_standard'][0]->dollar :$data['plans_standard'][0]->lir) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="price_currency">{{app()->getLocale() == 'fa' ? "R" : (app()->getLocale() == 'en' ? "$" :"TL") }}</span>
                                                        @if($data['plans_standard'][0]->discount != 0)
                                                            {{app()->getLocale() == 'fa' ? $data['plans_standard'][0]->price_discounted_rial : (app()->getLocale() == 'en' ? $data['plans_standard'][0]->price_discounted_dollar :$data['plans_standard'][0]->price_discounted_lir) }}
                                                        @else
                                                            {{app()->getLocale() == 'fa' ? $data['plans_standard'][0]->rial : (app()->getLocale() == 'en' ? $data['plans_standard'][0]->dollar :$data['plans_standard'][0]->lir) }}
                                                        @endif
                                                    </div>
                                                    <div class="plan_lable">@lang("text.popular")</div>
                                                </div>
                                                <div class="plan_description">
                                                    @php
                                                        $rules = $data['plans_standard'][0]["roles_".app()->getLocale()];
                                                        $rules_array = explode(",",$rules);
                                                    @endphp
                                                    @foreach($rules_array as $item)
                                                        <p>{{$item}}</p>
                                                    @endforeach
                                                    <div class="choose_plan">
                                                        @if(Auth::user() && Auth::user()->user_type !== 'Admin')
                                                            <a href="{{route('Business.create',['business'=>'Standard'])}}">@lang("text.start")</a>
                                                        @else
                                                            <a href="{{route('sign')}}">@lang("text.start")</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 plan_item">
                                        <div class="plan_content plan_height">
                                            <div class="plan_title">
                                                <h4>@lang("text.premium")</h4>
                                            </div>
                                            <div class="plan_image">
                                                <img src="{{asset('site/images/premium_plan.png')}}" alt="premium">
                                            </div>
                                            <div class="plan_content_inner text-center">
                                                <div class="plan_subtitle">
                                                    <p>@lang("text.real_business")</p>
                                                </div>
                                                <div class="price_circle">
                                                    <div class="price">
                                                        @if($data['plans_premium'][0]->discount != 0)
                                                            <div class="older_price">
                                                                <span>
                                                                    {{app()->getLocale() == 'fa' ? $data['plans_premium'][0]->rial : (app()->getLocale() == 'en' ? $data['plans_premium'][0]->dollar :$data['plans_premium'][0]->lir) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <span
                                                            class="price_currency">{{app()->getLocale() == 'fa' ? "R" : (app()->getLocale() == 'en' ? "$" :"TL") }}</span>
                                                        @if($data['plans_premium'][0]->discount != 0)
                                                            {{app()->getLocale() == 'fa' ? $data['plans_premium'][0]->price_discounted_rial : (app()->getLocale() == 'en' ? $data['plans_premium'][0]->price_discounted_dollar :$data['plans_premium'][0]->price_discounted_lir) }}
                                                        @else
                                                            {{app()->getLocale() == 'fa' ? $data['plans_premium'][0]->rial : (app()->getLocale() == 'en' ? $data['plans_premium'][0]->dollar :$data['plans_premium'][0]->lir) }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="plan_description">
                                                    @php
                                                        $rules = $data['plans_premium'][0]["roles_".app()->getLocale()];
                                                        $rules_array = explode(",",$rules);
                                                    @endphp
                                                    @foreach($rules_array as $item)
                                                        <p>{{$item}}</p>
                                                    @endforeach
                                                    <div class="choose_plan">
                                                        @if(Auth::user() && Auth::user()->user_type !== 'Admin')
                                                            <a href="{{route('Business.create',['business'=>'Premium'])}}">@lang("text.start")</a>
                                                            @else
                                                            <a href="{{route('sign')}}">@lang("text.start")</a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
