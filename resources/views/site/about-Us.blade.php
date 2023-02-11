@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>About us | Minemenu</title>
    @endsection
@section('main')
    <!-- app main -->
    <section class="main_detail_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_about">
                        <div class="text_about">
                            <p>
                                {{$data['about'][0][app()->getLocale()]}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
