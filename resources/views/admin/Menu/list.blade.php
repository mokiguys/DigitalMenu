@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.shopTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
                        <div class="col-12 mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.AddFood')</h4>
                                    <form class="forms-sample" method="post" action="{{route('menu.store')}}"
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
                                        <div class="row">
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="title"
                                                           class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.title')</label>
                                                    <input type="text" name="fa" class="form-control pt-1" id="fa"
                                                           value="{{old('fa')}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="category" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.categoryFood')</label>
                                                    <select name="category" id="category" class="form-control pt-1">
                                                        <option value="0" selected disabled>یک مورد را انتخاب کنید</option>
                                                        @foreach( $data['categoryFood'] as $item)
                                                            <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="price" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.priceFood')</label>
                                                    <input type="number" name="price" class="form-control pt-1" id="price" value="{{old('price')}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="discount" class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.discountFood')</label>
                                                    <input type="number" name="discount" class="form-control pt-1" id="discount" value="{{old('discount')}}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.existFood')</label>
                                                    <div class="clearfix"></div>
                                                    <div class="text-{{app()->getLocale() != "fa" ? "left" : "right"}}">
                                                        <label for="exist">@lang('text.available')</label>
                                                        <input type="radio" name="exist" class="{{app()->getLocale() != "fa" ? "mr-3" : "ml-3"}}" id="exist" value="1">
                                                        <label for="n_exist">@lang('text.n_available')</label>
                                                        <input type="radio" name="exist" id="n_exist" value="2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label class="{{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.priceTypeCurrency')</label>
                                                    <div class="clearfix"></div>
                                                    <div class="text-{{app()->getLocale() != "fa" ? "left" : "right"}}">
                                                        <label for="currency_rial">@lang('text.rial')</label>
                                                        <input type="radio" name="currency" class="{{app()->getLocale() != "fa" ? "mr-3" : "ml-3"}}" id="currency_rial" value="1">
                                                        <label for="currency_lira">@lang('text.lira')</label>
                                                        <input type="radio" name="currency" id="currency_lira" value="2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit"
                                                class="btn btn-success mr-2 {{app()->getLocale() != "fa" ? "" : "float-right"}}">@lang('text.submit')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
            <div class="col-12 d-none d-lg-block">
                <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>@lang('text.row')</th>
                        <th>@lang('text.titleFood')</th>
                        <th>@lang('text.priceFood')</th>
                        <th>@lang('text.discountFood')</th>
                        <th>@lang('text.existFood')</th>
                        <th>@lang('text.categoryFood')</th>
                        <th>@lang('text.edit')</th>
                        <th>@lang('text.delete')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['menu'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            @switch(app()->getLocale())
                                @case('fa')
                                <td>{{$item->fa != null ? $item->fa : "تکمیل نشده"}}</td>
                                @break
                                @case('en')
                                <td>{{$item->en != null ? $item->en : "Not completed"}}</td>
                                @break
                                @case('tr')
                                <td>{{$item->tr != null ? $item->tr : "Tamamlanmamıs"}}</td>
                                @break
                            @endswitch
                            <td>{{$item->price}}</td>
                            <td>{{$item->discount}}</td>
                            <td>{{$item->exist == 1 ? '<i class="fad fa-check"></i>' : '<i class="fad fa-times"></i>'}}</td>
                            <td>{{$item->CategoryStore[app()->getLocale()]}}</td>
                            <td>
                                <a class="btn-primary btn" href="{{route('menu.edit',['menu'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{route('menu.destroy',['menu'=>$item->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                    </button>
                                    <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row paginate_style">
            {{$data['menu']->render()}}
        </div>
        @foreach($data['menu'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$key+1}}</div>
                    <ul style="display: none">
                        <li>
                            <span>@lang('text.edit')</span>
                            <span><a class="btn-primary btn" href="{{route('menu.edit',['menu'=>$item->id])}}"><i
                                        class="fa fa-pencil"></i></a></span>
                        </li>
                        <li>
                            <span>@lang('text.delete')</span>
                            <span>
                                        <form action="{{route('menu.destroy',['menu'=>$item->id])}}"
                                              method="POST">
                                        @csrf
                                            @method('delete')
                                        <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                        </button>
                                        <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                        </form>
                                </span>
                        </li>
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
