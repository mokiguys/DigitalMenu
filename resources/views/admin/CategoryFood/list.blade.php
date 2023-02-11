@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.CategoryFoodTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            @can('add-categoryFood')
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CategoryFoodTitleAdd')</h4>
                            <form class="forms-sample" method="post" action="{{route('categoryFood.store')}}"
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
                                    <label for="category_id"
                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.shopCategory')</label>
                                    <select name="category_id" id="category_id" class="form-control pt-1">
                                        @foreach($data['categoryStore'] as $value)
                                            <option value="{{$value->id}}">{{$value[app()->getLocale()]}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                        <th>@lang('text.category')</th>
                        @can('edit-categoryFood')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('delete-categoryFood')
                            <th>@lang('text.delete')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['categoryFood'] as $key => $item)
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
                            <td class="py-1">{{$item->CategoryStore[app()->getLocale()]}}</td>
                            @can('edit-categoryFood')
                                <td>
                                    <a class="btn-primary btn"
                                       href="{{route('categoryFood.edit',['categoryFood'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('delete-categoryFood')
                                <td>
                                    <form action="{{route('categoryFood.destroy',['categoryFood'=>$item->id])}}"
                                          method="POST">
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
            {{$data['categoryFood']->render()}}
        </div>
        @foreach($data['categoryFood'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">@switch(app()->getLocale())
                            @case('fa')
                            {{$item->fa}}
                            @break
                            @case('en')
                            {{$item->en}}
                            @break
                            @case('tr')
                            {{$item->tr}}
                            @break
                        @endswitch</div>
                    <ul style="display: none">
                        <li>
                            <span>@lang('text.category')</span>
                            <span>{{$item->CategoryStore[app()->getLocale()]}}</span>
                        </li>
                        @can('edit-categoryFood')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn"
                                         href="{{route('categoryFood.edit',['categoryFood'=>$item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
                            </li>
                        @endcan
                        @can('delete-categoryFood')
                            <li>
                                <span>@lang('text.delete')</span>
                                <span>
                                        <form action="{{route('categoryFood.destroy',['categoryFood'=>$item->id])}}"
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
        });
    </script>
@endsection
