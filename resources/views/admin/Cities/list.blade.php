@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.CityTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            @can('add-city')
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CityTitleAdd')</h4>
                            <form class="forms-sample" method="post" action="{{route('cities.store')}}"
                                  enctype="multipart/form-data">
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
                                    <label for="fa"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_fa')</label>
                                    <input type="text" name="fa" class="form-control pt-1" id="fa"
                                           value="{{old('fa')}}">
                                </div>
                                <div class="form-group">
                                    <label for="en"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_en')</label>
                                    <input type="text" name="en" class="form-control pt-1" id="en"
                                           value="{{old('en')}}">
                                </div>
                                <div class="form-group">
                                    <label for="tr"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title_tr')</label>
                                    <input type="text" name="tr" class="form-control pt-1" id="tr"
                                           value="{{old('tr')}}">
                                </div>
                                <div class="form-group">
                                    <label for="location"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.location')</label>
                                    <input type="text" placeholder="@lang('text.exm_loc')" name="location"
                                           class="form-control pt-1" id="location"
                                           value="{{old('location')}}">
                                </div>
                                <div class="form-group">
                                    <label for="image"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.image')</label>
                                    <input type="file" name="image" class="form-control pt-1" id="image"
                                           value="{{old('image')}}">
                                </div>
                                <div class="form-group">
                                    <label for="country"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.country_single')</label>
                                    <select name="country" id="country" class="form-control pt-1">
                                        <option value="0" selected disabled>@lang('text.select_default')</option>
                                        @foreach($data['country'] as $value)
                                            <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="province"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.province_single')</label>
                                    <select name="province" id="province" class="form-control pt-1">

                                    </select>
                                </div>
                                <button type="submit"
                                        class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-12">
                <div class="alert alert-warning">
                    <p class="mb-0 text-right">توجه : از هر کشور بیشتر از 4 شهر نمیتوان جهت نمایش در صفحه اصلی انتخاب کرد</p>
                </div>
            </div>
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        @switch(app()->getLocale())
                            @case('fa')
                            <th>@lang('text.title_fa')</th>
                            @break
                            @case('en')
                            <th>@lang('text.title_en')</th>
                            @break
                            @case('tr')
                            <th>@lang('text.title_tr')</th>
                            @break
                        @endswitch
                        <th>@lang('text.country_single')</th>
                        <th>@lang('text.province_single')</th>
                        <th>@lang('text.image')</th>
                        <th>نمایش در صفحه اصلی</th>
                        @can('edit-city')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('delete-city')
                            <th>@lang('text.delete')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['cities'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            @switch(app()->getLocale())
                                @case('fa')
                                <td>{{$item->fa}}</td>
                                @break
                                @case('en')
                                <td>{{$item->en}}</td>
                                @break
                                @case('tr')
                                <td>{{$item->tr}}</td>
                                @break
                            @endswitch
                            <td>{{$item->country_name}}</td>
                            <td>{{$item->province_name}}</td>
                            <td>
                                <img src="{{'../site/uploader/cities/' . $item->image}}" alt="" width="60" height="60">
                            </td>
                            <td><input type="checkbox" {{$item->show_one == 1 ? "checked" : ""}} class="show_one"
                                       data-id="{{$item->id}}"
                                       value="{{$item->show_one}}"></td>
                            @can('edit-city')
                                <td>
                                    <a class="btn-primary btn" href="{{route('cities.edit',['city'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('delete-city')
                                <td>
                                    <form action="{{route('cities.destroy',['city'=>$item->id])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                        </button>
                                        <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['cities']->render()}}
        </div>
        @foreach($data['cities'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item[app()->getLocale()]}}</div>
                    <ul style="display: none">
                        <li>
                            <span>@lang('text.image')</span>
                            <span><img src="{{'../site/uploader/cities/' . $item->image}}" alt="" width="60"
                                       height="60"></span>
                        </li>
                        @can('edit-city')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn" href="{{route('cities.edit',['city'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
                            </li>
                        @endcan
                        @can('delete-city')
                            <li>
                                <span>@lang('text.delete')</span>
                                <span>
                                        <form action="{{route('cities.destroy',['city'=>$item->id])}}"
                                              method="POST">
                                        @csrf
                                            @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                        </button>
                                        <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                        </form>
                                </span>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>
        @endforeach
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("body").on('click', '.delete', function () {
                swal("@lang('text.delete_message')", {
                    buttons: {
                        cancel: "@lang('text.close')",
                        catch: {
                            text: "@lang('text.delete')",
                            value: "catch",
                        },
                    },
                }).then((value) => {
                    switch (value) {
                        case "catch":
                            $(this).parent().find(".delete-submit").click();
                            break;
                    }
                });
            });
            $("#country").change(function () {
                $country = $(this).val();
                $csrf = "{{@csrf_token()}}";
                $method = "post";
                $.ajax({
                    url: "{{route('cities.GetProvince')}}",
                    type: 'post',
                    data: {_token: $csrf, _method: $method, country: $country},
                    success: function (response) {
                        $data = JSON.parse(response);
                        $html = ' <option value="0" selected disabled>@lang("text.select_default")</option>';
                        for ($i = 0; $i < $data.length; $i++) {
                            $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                        }
                        $("#province").html($html)
                    }
                });
            })
            $("body").on('click','.show_one',function () {
                $id = $(this).attr('data-id');

                axios.post("{{route('cities.ShowOne')}}", {
                    id: $id,
                    _token : "{{@csrf_token()}}",
                })
                    .then(function (response) {
                        if(response.data == "error"){
                            swal({
                                'icon' : "error",
                                "text" : "نمیتوان بیشتر از 4 شهر برای کشور مورد نظر انتخاب کنید"
                            })
                        }
                    })
                    .catch(function (error) {
                    });
            })
        });
        $(function () {
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
