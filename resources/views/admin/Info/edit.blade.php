@extends('admin.layouts.master')
@section('title')
    <title>{{$data['title']}}</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-right">ویرایش کردن اطلاعات سایت</h4>
                        <hr>
                        <form class="forms-sample" method="post" action="/Panel_admin/info/{{$data['info']->id}}"
                              enctype="multipart/form-data">
                            @method('put')
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="twitter" class="float-right">Twitter</label>
                                <i class="fa fa-info-circle float-right mr-2 info-icon"
                                   data-help="@lang('help.contact-social')"></i>
                                <input type="text" name="twitter" style="direction: ltr" class="form-control text-left" id="twitter"
                                       value="{{$data['info']['twitter']}}">
                            </div>
                            <div class="form-group">
                                <label for="instagram" class="float-right">instagram</label>
                                <i class="fa fa-info-circle float-right mr-2 info-icon"
                                   data-help="@lang('help.contact-social')"></i>
                                <input type="text" name="instagram" style="direction: ltr" class="form-control text-left" id="instagram"
                                       value="{{$data['info']['instagram']}}">
                            </div>
                            <div class="form-group">
                                <label for="address" class="float-right">آدرس</label>
                                <input type="text" name="address" class="form-control" id="address"
                                       value="{{$data['info']['address']}}">
                            </div>
                            <div class="form-group">
                                <label for="address_en" class="float-right">آدرس (انگلیسی)</label>
                                <input type="text" style="direction: ltr" name="address_en" class="form-control text-left" id="address_en"
                                       value="{{$data['info']['address_en']}}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="float-right">ایمیل</label>
                                <input type="email" style="direction: ltr" name="email" class="form-control text-left" id="email"
                                       value="{{$data['info']['email']}}">
                            </div>
                            <div class="form-group">
                                <label for="tell" class="float-right">تلفن</label>
                                <input type="tell" style="direction: ltr" name="tell" class="form-control text-left" id="tell"
                                       value="{{$data['info']['tell']}}">
                            </div>
                            <button type="submit" class="btn btn-success mr-2 float-right">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
