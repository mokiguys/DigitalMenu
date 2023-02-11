@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>{{$article['title']}} | Minemenu</title>
@endsection
@section('main')
    <!-- start detail-blog page header -->
    <div class="blog-content">
        <div class="blog-detail-header-image text-center p-0"
             style=" background-image: url({{asset('site/uploader/article/'.$article->image)}});">
            <div class="container">
                <div class="row title-blog-header">
                    <div class="col-12 text-center">
                        <h1 class="text-white">{{$article->title}}</h1>
                        <div class="pt-5 text-center">
                            <span class="calendar-header text-white">
                                @if(app()->getLocale() == "fa")
                                    {{jdate($article->created_at)->format('%d %B %Y')}}
                                @else
                                    {{$article->created_at}}
                                @endif
                            </span>
                        </div>
                        <div class="entertaiment-category text-center mt-4">
                            <a class="entertaiment">
                                {{$article->category[0][app()->getLocale()]}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog page header -->

    <!-- start section blog page content -->
    <section>
        <div class="detial-blog-section text-center">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 p-0 position-relative">
                        <div class="position-relative">
                            <div class="social-share bg-white">
                                <div class="social-share-label">
                                    <span class="text-white font-weight-bolder">اشتراک گذاری</span>
                                </div>
                                <div class="social-share-option">
                                    <ul class="pr-0">
                                        <li>
                                            <a href="#">
                                                    <span class="icon-facebook">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </span>
                                                <div class="icon-name text-dark">فیسبوک</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                    <span class="icon-twitter">
                                                        <i class="fab fa-twitter"></i>
                                                    </span>
                                                <div class="icon-name text-dark">توییتر</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                    <span class="icon-tripadvisor">
                                                        <i class="fab fa-tripadvisor"></i>
                                                    </span>
                                                <div class="icon-name text-dark">تریپدوایزر</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                    <span class="icon-telegram">
                                                        <i class="fab fa-telegram-plane"></i>
                                                    </span>
                                                <div class="icon-name text-dark">تلگرام</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-shadow"></div>
                            <article>
                                <div class="article-content text-right">
                                    {!! $article->text !!}
                                </div>
                            </article>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- start tags -->
        <div class="container-fluid">
            <div class="row justify-content-center text-right">
                <div class="col-12 col-sm-8">
                    <div class="blog-page-tags">
                        @foreach($article->Tag as $item)
                        <a>
                            <i class="fal fa-tags"></i>
                            {{$item[app()->getLocale()]}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
