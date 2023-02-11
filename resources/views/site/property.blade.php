@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Property | Minemenu</title>
@endsection
@section('main')
    <!-- app main -->
    <section class="main_detail_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_property">
                        <div class="row">
                            <div class="col-12">
                                <div class="image_property_holder">
                                    <img src="{{asset('site/uploader/property/' .  $data['property'][0]->image)}}" alt="{{$data['property'][0][app()->getLocale()]}}">
                                </div>
                                <hr>
                                <h1>{{$data['property'][0][app()->getLocale()]}}</h1>
                                <p class="text">{{$data['property'][0]["description_" . app()->getLocale()]}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
