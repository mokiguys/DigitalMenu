<nav class="sidebar sidebar-offcanvas pt-4" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">@lang('text.menu_items')</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('Admin.home')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">@lang('text.dashboard')</span>
            </a>
        </li>
        @can('edit-currency')
            <li class="nav-item">
                <a class="nav-link" href="{{route('currency.edit',['currency'=>1])}}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">@lang('text.currency')</span>
                </a>
            </li>
        @endcan
        @can('edit-setting')
            <li class="nav-item">
                <a class="nav-link" href="{{route('setting.index')}}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">تنظیمات</span>
                </a>
            </li>
        @endcan
        @if(Auth::user()->can('add-roles') || Auth::user()->can('all-roles') || Auth::user()->can('add-permissions') || Auth::user()->can('all-permissions'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#permission" aria-expanded="false"
                   aria-controls="permission">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">اجازه دسترسی</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="permission">
                    <ul class="nav flex-column sub-menu">
                        @can('all-permissions')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('permission.index')}}">دسترسی ها</a>
                            </li>
                        @endcan
                        @can('add-permissions')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('permission.create')}}">اضافه کردن دسترسی</a>
                            </li>
                        @endcan
                        @can('all-roles')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('roles.index')}}">مقام ها</a>
                            </li>
                        @endcan
                        @can('add-roles')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('roles.create')}}">اضافه کردن مقام</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(Auth::user()->can('add-manager') || Auth::user()->can('all-manager'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#manager" aria-expanded="false"
                   aria-controls="manager">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">مدیریت</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="manager">
                    <ul class="nav flex-column sub-menu">
                        @can('all-manager')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('manager.index')}}">لیست مدیران</a>
                            </li>
                        @endcan
                        @can('add-manager')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('manager.create')}}">اضافه کردن مدیر</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link menu-close" data-toggle="collapse" data-target="#lang" aria-expanded="false"
               aria-controls="lang">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">@lang('text.lang')</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="lang">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Language',['lang' => 'fa'])}}">@lang('text.persian')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Language',['lang' => 'en'])}}">@lang('text.english')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Language',['lang' => 'tr'])}}">@lang('text.turkish')</a>
                    </li>
                </ul>
            </div>
        </li>
        @if(Auth::user()->can('all-plan') || Auth::user()->can('all-ingredient')|| Auth::user()->can('all-food')|| Auth::user()->can('all-categoryFood')|| Auth::user()->can('all-categoryStore')|| Auth::user()->can('all-city')|| Auth::user()->can('all-province')|| Auth::user()->can('all-countries'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#categories" aria-expanded="false"
                   aria-controls="categories">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">@lang('text.categories')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="categories">
                    <ul class="nav flex-column sub-menu">
                        @can('all-countries')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('country.index')}}">@lang('text.country')</a>
                            </li>
                        @endcan
                        @can('all-province')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('province.index')}}">@lang('text.province')</a>
                            </li>
                        @endcan
                        @can('all-city')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('cities.index')}}">@lang('text.cities')</a>
                            </li>
                        @endcan
                        @can('all-amenities')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('amenities.index')}}">@lang('text.amenities')</a>
                            </li>
                        @endcan
                        @can('all-categoryStore')
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('categoryStore.index')}}">@lang('text.shopCategory')</a>
                            </li>
                        @endcan
                        @can('all-categoryFood')
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('categoryFood.index')}}">@lang('text.MenuCategory')</a>
                            </li>
                        @endcan
                        @can('all-food')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('food.index')}}">@lang('text.foods')</a>
                            </li>
                        @endcan
                        @can('all-ingredient')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ingredient.index')}}">@lang('text.ingredients')</a>
                            </li>
                        @endcan
                        @can('all-plan')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('plan.index')}}">@lang('text.plan')</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('propertes.index')}}">امکانات سایت</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link menu-close" data-toggle="collapse" data-target="#article" aria-expanded="false"
               aria-controls="article">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">مقالات</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="article">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('CategoryArticle.index')}}">دسته بندی ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tags.index')}}">تگ ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('article.index')}}">مقالات</a>
                    </li>
                </ul>
            </div>
        </li>
        @if(Auth::user()->can('add-shop') || Auth::user()->can('all-shop'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#shops" aria-expanded="false"
                   aria-controls="shops">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">@lang('text.shops')</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="shops">
                    <ul class="nav flex-column sub-menu">
                        @can('add-shop')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('shop.create')}}">@lang('text.shopAdd')</a>
                            </li>
                        @endcan
                        @can('all-shop')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('shop.index')}}">@lang('text.shopList')</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(Auth::user()->can('all-user-business') || Auth::user()->can('all-marketer'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#users" aria-expanded="false"
                   aria-controls="users">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">کاربران</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="users">
                    <ul class="nav flex-column sub-menu">
                        @can('all-user-business')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user_business.index')}}">صاحبین کسب و کار</a>
                            </li>
                        @endcan
                        @can('all-marketer')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('marketer.index')}}">بازاریابان</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @if(Auth::user()->can('all-ticket') || Auth::user()->can('all-subject-ticket'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#ticket" aria-expanded="false"
                   aria-controls="ticket">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">تیکت</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ticket">
                    <ul class="nav flex-column sub-menu">
                        @can('all-subject-ticket')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ticket.subject.index')}}">موضوعات</a>
                            </li>
                        @endcan
                        @can('all-ticket')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ticket.index',['type'=>'User'])}}">کاربران</a>
                            </li>
                        @endcan
                        @can('all-ticket')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('ticket.index',['type'=>'Marketer'])}}">بازاریاب</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif
        @can('edit-banner')
            <li class="nav-item">
                <a class="nav-link" href="{{route('Banner.edit',['banner'=>1])}}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">@lang('text.banner')</span>
                </a>
            </li>
        @endcan
        @if(Auth::user()->can('edit-about'))
            <li class="nav-item">
                <a class="nav-link menu-close" data-toggle="collapse" data-target="#data" aria-expanded="false"
                   aria-controls="data">
                    <i class="menu-icon typcn typcn-document-add"></i>
                    <span class="menu-title">اطلاعات سایت</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="data">
                    <ul class="nav flex-column sub-menu">
                        @can('edit-about')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about.edit')}}">درباره ما</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endif

        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('service.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">خدمات</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('certificate.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">گواهینامه ها</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link menu-close" data-toggle="collapse" data-target="#project" aria-expanded="false"--}}
        {{--               aria-controls="project">--}}
        {{--                <i class="menu-icon typcn typcn-document-add"></i>--}}
        {{--                <span class="menu-title">پروژه ها</span>--}}
        {{--                <i class="menu-arrow"></i>--}}
        {{--            </a>--}}
        {{--            <div class="collapse" id="project">--}}
        {{--                <ul class="nav flex-column sub-menu">--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{route('project.create')}}">اضافه کردن پروژه</a>--}}
        {{--                    </li>--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{route('project.index')}}">لیست پروژه ها</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link menu-close" data-toggle="collapse" data-target="#uploader" aria-expanded="false"--}}
        {{--               aria-controls="uploader">--}}
        {{--                <i class="menu-icon typcn typcn-document-add"></i>--}}
        {{--                <span class="menu-title">آپلودر</span>--}}
        {{--                <i class="menu-arrow"></i>--}}
        {{--            </a>--}}
        {{--            <div class="collapse" id="uploader">--}}
        {{--                <ul class="nav flex-column sub-menu">--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{route('uploader.index')}}">آپلودر فایل</a>--}}
        {{--                    </li>--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" href="{{route('employe.edit',1)}}">فرم استخدام</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link menu-close" data-toggle="collapse" data-target="#forms" aria-expanded="false"--}}
        {{--               aria-controls="forms">--}}
        {{--                <i class="menu-icon typcn typcn-document-add"></i>--}}
        {{--                <span class="menu-title">فرم ها</span>--}}
        {{--                <i class="menu-arrow"></i>--}}
        {{--            </a>--}}
        {{--            <div class="collapse" id="forms">--}}
        {{--                <ul class="nav flex-column sub-menu">--}}
        {{--                    <li class="nav-item">--}}
        {{--                        <a class="nav-link" ش>تماس با ما</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('about.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">درباره ما</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('personal.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">پرسنل</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{url('Panel_admin/info/1/edit')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">اطلاعات سایت</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('page.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-shopping-bag"></i>--}}
        {{--                <span class="menu-title">اطلاعات ثابت سایت</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{route('seo.index')}}">--}}
        {{--                <i class="menu-icon typcn typcn-document-text"></i>--}}
        {{--                <span class="menu-title">سئو</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
        <li class="nav-item">
            <form method="post" action="{{route('logout')}}" class="nav-link">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span type="submit" class="menu-title exit-class">@lang('text.exit')</span>
                <button type="submit" hidden id="exit">exit</button>
                @csrf
            </form>
        </li>
    </ul>
</nav>
