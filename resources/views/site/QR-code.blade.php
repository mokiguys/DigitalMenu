@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Qr code | Minemenu</title>
@endsection
@section('main')
    <!-- background-header -->
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                    @lang("text.qr")
                </h1>
            </div>
        </div>
        <!-- start section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="qr_code">
                        <h4>
                            @lang("text.general_code")
                        </h4>
                        <div class="qr_section">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="img_qr">
                                        <img src="{{asset('site/uploader/Qrcode/'.$data['shop']->id.'/public.png')}}" width="250" height="250">
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="tip_qr">
                                        <p class="font-weight-bold">
                                            @lang("text.tip") :
                                        </p>
                                        <small>
                                            @lang("text.suitable_printing_size",["size" => "400*400"])
                                        </small>
                                        <br>
                                        <small>
                                            @lang("text.print_with_glasse")
                                        </small>
                                        <div class="print_input">
                                            <a class="btn btn-primary" href="{{asset('site/uploader/Qrcode/'.$data['shop']->id.'/public.png')}}" download="">@lang("text.download")</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom_qr">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom_qr_code">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="pb-4">
                                                        <span class="font-weight-bold">
                                                            @lang("text.description")
                                                        </span>
                                                    <br>
                                                    <span>
                                                            @lang("text.description_qr_code")
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row qr_generator">
                                            <div class="col-6">
                                                <label for="qr_number">@lang("text.count_table")</label>
                                                <input type="number" data-shop="{{$data['shop']->id}}" name="qr_number" id="qr_number" value="0"
                                                       min="0">
                                            </div>
                                            <div class="col-6">
                                                <div class="request_qr">
                                                    <a class="btn btn-primary text-light request_many_qr">@lang("text.request_qr")</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row result_qr" style="display: none">
                                            <div class="col-9">
                                                <div class="alert alert-primary custom_alert">

                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="recevied_qr" style="display: none">
                                                    <a class="btn btn-success">@lang("text.download_file")</a>
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
@endsection
@section('script')
    <script>
        $("body").on('click','.request_many_qr',function () {
            $shop = $("#qr_number").attr('data-shop');
            $table = $("#qr_number").val();

            axios.post("{{route('Business.qrCode')}}", {
                shop: $shop,
                table: $table,
                _token : "{{@csrf_token()}}",
            })
                .then(function (response) {
                    $(".qr_generator").fadeOut(300)
                    $(".result_qr").fadeIn(300)
                    $(".result_qr .custom_alert").text("{{__("text.timer_text_qr")}}")
                    setTimeout(()=>{
                        $(".recevied_qr").fadeIn(300);
                        $(".recevied_qr a").attr('href',"{{asset('site/uploader/Qrcode/' . $data['shop']->id . '/' . $data['shop']->id . '.zip')}}")
                    },10000)
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
    </script>
    @endsection
