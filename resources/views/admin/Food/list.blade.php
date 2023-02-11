@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.foodsTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            @can('add-food')
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.foodsTitleAdd')</h4>
                            <form class="forms-sample" method="post" action="{{route('food.store')}}"
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
                                    <label for="ingredient"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.ingredients')</label>
                                    <select name="ingredient[]" multiple id="ingredient" class="form-control pt-1">
                                        @foreach($data['ingredient'] as $value)
                                            <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoryShop_id"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                    <select name="categoryShop_id" id="categoryShop_id" class="form-control pt-1">
                                        <option value="0" selected disabled>@lang('text.select_default')</option>
                                        @foreach($data['categoryStore'] as $value)
                                            <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoryFood_id"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.MenuCategory')</label>
                                    <select name="categoryFood_id" id="categoryFood_id" class="form-control pt-1">

                                    </select>
                                </div>
                                <button type="submit"
                                        class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>@lang('text.title')</th>
                        <th>@lang('text.shopCategory')</th>
                        <th>@lang('text.MenuCategory')</th>
                        @can('edit-food')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('delete-food')
                            <th>@lang('text.delete')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['food'] as $key => $item)
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
                            <td>{{$item->CategoryStore[app()->getLocale()]}}</td>
                            <td>{{$item->CategoryFood[app()->getLocale()]}}</td>
                            <td>
                                <a class="btn-primary btn" href="{{route('food.edit',['food'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                            @can('delete-food')
                            <td>
                                <form action="{{route('food.destroy',['food'=>$item->id])}}" method="POST">
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
            {{$data['food']->render()}}
        </div>
        @foreach($data['food'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item[app()->getLocale()]}}</div>
                    <ul style="display: none">
                        <li>
                            <span>@lang('text.shopCategory')</span>
                            <span>{{$item->CategoryStore[app()->getLocale()]}}</span>
                        </li>
                        <li>
                            <span>@lang('text.MenuCategory')</span>
                            <span>{{$item->CategoryFood[app()->getLocale()]}}</span>
                        </li>
                        @can('edit-food')
                        <li>
                            <span>@lang('text.edit')</span>
                            <span><a class="btn-primary btn" href="{{route('food.edit',['food'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a></span>
                        </li>
                        @endcan
                        @can('delete-food')
                        <li>
                            <span>@lang('text.delete')</span>
                            <span>
                                        <form action="{{route('food.destroy',['food'=>$item->id])}}"
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
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
            $("#ingredient").select2({
                dir: 'rtl'
            });
            $("#categoryShop_id").change(function () {
                $shop = $(this).val();
                $csrf = "{{@csrf_token()}}";
                $method = "post";
                $.ajax({
                    url: "{{route('categoryFood.shop')}}",
                    type: 'post',
                    data: {_token: $csrf, _method: $method, shop: $shop},
                    success: function (response) {
                        $data = JSON.parse(response);
                        $html = ' <option value="0" selected disabled>@lang("text.select_default")</option>';
                        for ($i = 0; $i < $data.length; $i++) {
                            $html += '<option value="' + $data[$i]['id'] + '">' + $data[$i]["{{ app()->getLocale() }}"] + '</option>';
                        }
                        $("#categoryFood_id").html($html)
                    }
                });
            })
        });
    </script>
@endsection
