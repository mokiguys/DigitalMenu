@extends('admin.layouts.master')
@section('title')
    <title>{{$data['title']}}</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 d-none d-lg-block">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('setting.update',['setting'=>$data['setting'][0]->id])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="value_add_tax"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">درصد ارزش افزوده</label>
                                <input type="number" min="0" name="value_add_tax" class="form-control pt-1" id="value_add_tax"
                                       value="{{$data['setting'][0]->value_add_tax}}">
                            </div>
                            <div class="form-group">
                                <label for="percentage_all"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">درصد معرفی</label>
                                <input type="number" min="0" name="percentage_all" class="form-control pt-1" id="percentage_all"
                                       value="{{$data['setting'][0]->percentage_all}}">
                            </div>
                            <div class="form-group">
                                <label for="charge"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">درصد شارژ</label>
                                <input type="number" min="0" name="charge" class="form-control pt-1" id="charge"
                                       value="{{$data['setting'][0]->charge}}">
                            </div>
                            <div class="form-group">
                                <label for="min_price"
                                       class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">حداقل مبلغ تصویه حساب کیف پول</label>
                                <input type="number" min="0" name="min_price" class="form-control pt-1" id="min_price"
                                       value="{{$data['setting'][0]->min_price}}">
                            </div>
                            <div class="form-group {{app()->getLocale() != "fa" ? "" : "float-right"}}">
                                <input type="submit" class="btn btn-success" value="ثبت">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

