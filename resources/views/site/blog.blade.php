@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Blogs | Minemenu</title>
@endsection
@section('main')
    <!-- app main -->
    <section class="blog blog-page">

        <div class="container-fluid">

            <!-- start blog item -->
            <div class="row blog-items justify-content-center ">
                @foreach($blog as $item)
                    <div class="col-12 col-md-6 col-lg-4 px-3 blog-item">
                        <article class="blog-item-content">
                            <a class="blog-link" href="#"></a>
                            <div class="card-blog">
                                <div class="card-blog-image">
                                    <div class="card-blog-title">
                                        <h5>
                                            {{$item->title}}
                                        </h5>
                                    </div>
                                    <img src="#" alt="" style="background-image: url({{asset('site/uploader/article/'.$item->image)}});">
                                </div>
                                <div class="card-blog-content-date text-center position-relative">
                                    <div class="blog-content-date">
                                        <span class="pr-5">
                                            <i class="fad fa-calendar-alt"></i>
                                            <span>
                                               @if(app()->getLocale() == "fa")
                                                    {{jdate($item->created_at)->format('%d %B %Y')}}
                                                @else
                                                    {{$item->created_at}}
                                                @endif
                                            </span>
                                        </span>
                                        <span class="pl-5">

                                            <i class="fad fa-comment"></i>
                                            <span>
                                                7 نظر
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="blog-card-body p-5">
                                    <div class="blog-card-body-content text-center">
                                        <p class="text-center">
                                           {{$item->short_text}}
                                        </p>
                                        <a href="{{route('blog.detail',$item->slug)}}" class="shop_read_more position-relative" title="{{__('text.read_more')}}">
                                            @lang('text.read_more')
                                        </a>
                                    </div>
                                    <div class="blog-category-name position-relative text-center pt-2">
                                        <a  class="position-relative text-dark">
                                            {{$item->category[0][app()->getLocale()]}}
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <!-- end blog item -->
        </div>
    </section>
@endsection
