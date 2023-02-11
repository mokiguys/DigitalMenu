<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('seo')
    <link rel="stylesheet" href="{{asset('site/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/node_modules/bootstrap/dist/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/mab-jquery-taginput.css')}}">
    <meta name="lang" content="{{app()->getLocale()}}" >
    @yield('cssFiles')
    @if(app()->getLocale() == "fa")
        <link rel="stylesheet" href="{{asset('site/css/main.min.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('site/css/main.min.ltr.css')}}">
    @endif
</head>

<body style="overflow: hidden;">
<span hidden class="lang_site">{{app()->getLocale()}}</span>
<div class="loading">
    <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
    </div>
</div>
<div id="app">
    <!-- app header -->
    @if($transparent)
        <header class="is_transparent">
            @else
                <header class="not_transparent" style="background: rgb(45, 50, 55);">
                    @endif
                    <nav class="menu">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="menu-items">
                                        <li class="menu-options-item">
                                            <i class="fad fa-globe-americas"></i>
                                            <span>@lang('text.lang')</span>
                                            <ul class="dropdown">
                                                @if(app()->getLocale() == "fa")
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'ar'])}}">@lang('text.arabic')</a>
                                                    </li>
                                                @elseif(app()->getLocale() == "en")
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'ar'])}}">@lang('text.arabic')</a>
                                                    </li>
                                                @elseif(app()->getLocale() == "tr")
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'ar'])}}">@lang('text.arabic')</a>
                                                    </li>
                                                @else
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                                                    </li>
                                                    <li class="menu-item"><a
                                                            href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="menu-options-item">
                                            @if(auth()->check() && auth()->user()->user_type != "Admin")
                                                <a href="{{auth()->user()->user_type == "User" ? route('userPanel'): route('marketerPanel')}}"
                                                   class="menu-link">
                                                    <span class="hovring-box"></span>
                                                    <span>@lang('text.user_panel')</span>
                                                </a>
                                            @else
                                                <a href="{{route('sign')}}" class="menu-link">
                                                    <span class="hovring-box"></span>
                                                    <i class="fad fa-user"></i>
                                                    @if(auth()->check() && auth()->user()->user_type != "Admin")
                                                        <span>@lang('text.user_panel')</span>
                                                    @else
                                                        <span>@lang('text.login')</span>
                                                    @endif
                                                </a>
                                            @endif
                                        </li>
                                        <li class="menu-options-item">
                                            <a href="{{route('plans')}}" class="menu-link">
                                                <span class="hovring-box"></span>
                                                <i class="fad fa-file-alt"></i>
                                                <span>@lang('text.plan')</span>
                                            </a>
                                        </li>
                                        @if(!auth()->check() && Cookie::get('cart'))
                                            <li class="menu-options-item">
                                                <a href="{{route('cart.index')}}" class="menu-link">
                                                    <span class="hovring-box"></span>
                                                    <i class="fad fa-shopping-cart"></i>
                                                    <span>@lang('text.cart')</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(auth()->check() && auth()->user()->user_type == "User")
                                            <li class="menu-options-item">
                                                <i class="fad fa-shopping-cart"></i>
                                                <span>@lang('text.order')</span>
                                                <ul class="dropdown" style="width: 15vw">
                                                    @foreach($data['shopNames'] as $item)
                                                        <li class="menu-item"><a
                                                                href="{{route('order.list',$item->id)}}">{{$item[app()->getLocale()]}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="logo-section">
                        <a href="{{route('home')}}">
                            <img src="{{asset('site/images/logo.svg')}}" alt="logo">
                        </a>
                    </div>
                </header>
                <section class="header-mobile">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                <span class="menu-mobile-buttons"><i class="fad fa-bars"></i></span>
                            </div>
                            <div class="col-4 text-center">
                                <a href="{{route('home')}}">
                                    <img src="{{asset('site/images/logo.svg')}}" alt="logo">
                                </a>
                            </div>
                            <div class="col-4 action-link-menu-mobile">
                                @if(!auth()->check() && Cookie::get('cart'))
                                    <a href="{{route('cart.index')}}"><i class="fad fa-shopping-cart"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
                <section class="menu-moble-sidebar">
                    <div class="sidebar_menu">
                        <div class="header-sidebar-menu">
                    <span class="login-with-menu-sidebar">
                        <a href="{{route('sign')}}">
                            <i class="fad fa-user"></i>
                            @if(auth()->check() && auth()->user()->user_type != "Admin")
                                <span>@lang('text.user_panel')</span>
                            @else
                                <span>@lang('text.login')</span>
                            @endif
                        </a>
                    </span>
                            <span class="close_menu"><i class="fad fa-times"></i></span>
                        </div>
                        <div class="main-sidebar-menu">
                            <div class="items">
                                <a href="#">
                                    <i class="fad fa-file-alt"></i>
                                    <span>@lang('text.plan')</span>
                                </a>
                            </div>
                            <div class="items">
                                <a href="#">
                                    <i class="fad fa-globe-americas"></i>
                                    <span>@lang('text.lang')</span>
                                    <i class="fad fa-caret-down arrow_down"></i>
                                </a>
                                <div class="dropdown-menu-sidebar">
                                    @if(app()->getLocale() == "fa")
                                        <a href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                                        <a href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                                    @elseif(app()->getLocale() == "en")
                                        <a href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                                        <a href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                                    @else
                                        <a href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                                        <a href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                                    @endif
                                </div>
                            </div>
                            @if(auth()->check() && auth()->user()->user_type == "User")
                                <div class="items">
                                    <a>
                                        <i class="fad fa-shopping-cart"></i>
                                        <span>@lang('text.order')</span>
                                        <i class="fad fa-caret-down arrow_down"></i>
                                    </a>
                                    <div class="dropdown-menu-sidebar">
                                        @foreach($data['shopNames'] as $item)
                                            <a href="#">{{$item[app()->getLocale()]}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="closing_box_sidebaeMenu"></div>
                </section>

            @yield('main')


            <!-- app footer -->
                <footer class="footer">
                    <div class="footer_inner">
                        <div class="container-wrapper">
                            <aside class="footer-widgets container">
                                <div class="row">
                                    <div class="footer_column col-12 col-md-6 col-lg-4">
                                        <div class="widget">
                                            <div class="textwidget">
                                                <div class="widget-title">@lang("text.menu")</div>
                                                <div class="widget_item">
                                                    <a href="{{route('contact')}}">
                                                        @lang('text.contact_us')
                                                    </a>
                                                </div>
                                                <div class="widget_item">
                                                    <a href="{{route('about')}}">
                                                        @lang('text.about-us')
                                                    </a>
                                                </div>
                                                <div class="widget_item">
                                                    <a href="{{route('plans')}}">
                                                        @lang('text.plan')
                                                    </a>
                                                </div>
                                                <div class="widget_item">
                                                    <a href="{{route('sign')}}">
                                                        @lang('text.register')
                                                    </a>
                                                </div>
                                                <div class="widget_item">
                                                    <a href="{{route('blog.view')}}">
                                                        @lang('text.article')
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer_column col-12 col-md-6 col-lg-4">
                                        <div class="widget">
                                            <div class="textwidget">
                                                <div class="widget-title">گشت و گذار</div>
                                                @foreach(\App\CategoryStore::all() as $item)
                                                    <div class="widget_item">
                                                        <a href="{{route('categories',['category' => $item->slug])}}">
                                                            {{$item[app()->getLocale()]}}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer_column col-12 col-md-6 col-lg-4">
                                        <div class="widget">
                                            <div class="textwidget">
                                                <p>
                                                    <img class="image_logo_footer"
                                                         src="{{asset('site/images/logo.svg')}}" alt="">
                                                </p>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از
                                                    طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                    سطرآنچنان که
                                                    لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با
                                                    هدف بهبود
                                                    ابزارهای کاربردی می باشد
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="footer-credits">
                            <div class="footer-menu-wrapper">
                                <nav class="main-navbar_footer">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="footer-navigation-wrapper">
                                                    <div class="menu-footer-social-networks-container">
                                                        <ul class="footer-menu_list_social">
                                                            <li class="menu-social-item">
                                                                <a href="#">@lang('text.facebook')</a>
                                                            </li>
                                                            <li class="menu-social-item">
                                                                <a href="#">@lang('text.twitter')</a>
                                                            </li>
                                                            <li class="menu-social-item">
                                                                <a href="#">@lang('text.instagram')</a>
                                                            </li>
                                                            <li class="menu-social-item">
                                                                <a href="#">@lang('text.pinterest')</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="container-wrapper">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                 <a href="https://mokiguys.com" rel="nofollow">Moki guys</a>
                                            </div>
                                            <div class="text-center">
                                                @lang('text.copyright') &copy; {{now()->year}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('site/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('site/node_modules/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{asset('site/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/select2.min.js')}}"></script>
<script src="{{asset('site/js/all.min.js')}}"></script>
<script src="{{asset('site/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('site/js/slick.min.js')}}"></script>
<script src="{{asset('site/js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('site/js/mab-jquery-taginput.js')}}"></script>
{{--<script src="{{asset('site/js/bootstrap-tagsinput.min.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>--}}
{{--<script src="{{asset('site/js/bootstrap-tagsinput-angular.min.js')}}"></script>--}}

@include('sweet::alert')
<script src="{{asset('site/js/script.js')}}"></script>

@yield('script')
</body>
</html>
