@extends('admin.layouts.master')
@section('title')
    <title>@lang('text.PlanTitleEdit')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.PlanTitleEdit') @switch($data['plan']->plan)
                                @case(1)
                                <td>Free</td>
                                @break
                                @case(2)
                                <td>Standard</td>
                                @break
                                @case(3)
                                <td>Premium</td>
                                @break
                            @endswitch</h4>
                        <form class="forms-sample" method="post"
                              action="{{route('plan.update',['plan'=>$data['plan']->id])}}"
                              enctype="multipart/form-data">
                            @if($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ol class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            @endif
                            @csrf
                            @method('put')
                                <div class="form-group">
                                    <label for="expireTime"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.expire')</label>
                                    <input type="number" name="expireTime" class="form-control pt-1" id="expireTime"
                                           value="{{$data['plan']->expireTime}}">
                                </div>
                                <div class="form-group">
                                    <label for="priceInRial"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.priceInRial')</label>
                                    <input type="number" name="rial" class="form-control pt-1" id="priceInRial"
                                           value="{{$data['plan']->rial}}">
                                </div>
                                <div class="form-group">
                                    <label for="priceInDollars"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.priceInDollars')</label>
                                    <input type="number" name="dollar" class="form-control pt-1" id="priceInDollars"
                                           value="{{$data['plan']->dollar}}">
                                </div>
                                <div class="form-group">
                                    <label for="priceInLira"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.priceInLira')</label>
                                    <input type="number" name="lira" class="form-control pt-1" id="priceInLira"
                                           value="{{$data['plan']->lir}}">
                                </div>
                                <div class="form-group">
                                    <label for="discount"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.discount')</label>
                                    <input type="number" name="discount" class="form-control pt-1" id="discount"
                                           value="{{$data['plan']->discount}}">
                                </div>
                                <div class="form-group">
                                    <label for="roles_fa"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.roles_fa')</label>
                                    <textarea type="text" name="roles_fa" class="form-control pt-1" style="height: 200px" placeholder="@lang('text.roles_Separate')" id="roles_fa">{{$data['plan']->roles_fa}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="roles_en"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.roles_en')</label>
                                    <textarea type="text" name="roles_en" class="form-control pt-1" placeholder="@lang('text.roles_Separate')" style="text-align: left;direction: ltr;height: 200px" id="roles_en">{{$data['plan']->roles_en}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="roles_tr"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.roles_tr')</label>
                                    <textarea type="text" name="roles_tr" class="form-control pt-1" placeholder="@lang('text.roles_Separate')" style="text-align: left;direction: ltr;height: 200px" id="roles_tr">{{$data['plan']->roles_tr}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

