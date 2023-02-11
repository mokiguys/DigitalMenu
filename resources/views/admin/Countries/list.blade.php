@extends('admin.layouts.master')

@section('title')
    <title>@lang('text.CountryTitle')</title>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            @can('add-country')
            <div class="col-12 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title {{app()->getLocale() != "fa" ? "" : "text-right"}}">@lang('text.CountryTitleAdd')</h4>
                        <form class="forms-sample" method="post" action="{{route('country.store')}}"
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
                        <th>@lang('text.title_fa')</th>
                        <th>@lang('text.title_en')</th>
                        <th>@lang('text.title_tr')</th>
                        @can('edit-country')
                            <th>@lang('text.edit')</th>
                        @endcan
                        @can('delete-country')
                            <th>@lang('text.delete')</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data['country'] as $key => $item)
                        <tr class="text-center">
                            <td class="py-1">{{$key+1}}</td>
                            <td>{{$item->fa}}</td>
                            <td>{{$item->en}}</td>
                            <td>{{$item->tr}}</td>
                            @can('edit-country')
                                <td>
                                    <a class="btn-primary btn"
                                       href="{{route('country.edit',['country' => $item->id])}}"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            @endcan
                            @can('delete-country')
                                <td>
                                    <form action="{{route('country.destroy',['country' => $item->id])}}" method="POST">
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
            {{$data['country']->render()}}
        </div>
        @foreach($data['country'] as $key => $item)
            <ul class="list-item-small d-block d-lg-none">
                <li class="item-list">
                    <div class="btn btn-info header-item w-100 pb-2 pt-2">{{$item[app()->getLocale()]}}</div>
                    <ul style="display: none">
                        @can('edit-country')
                            <li>
                                <span>@lang('text.edit')</span>
                                <span><a class="btn-primary btn"
                                         href="{{route('country.edit',['country' => $item->id])}}"><i
                                            class="fa fa-pencil"></i></a></span>
                            </li>
                        @endcan
                        @can('delete-country')
                            <li>
                                <span>@lang('text.delete')</span>
                                <span>
                                        <form action="{{route('country.destroy',['country' => $item->id])}}"
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
        });
        $(function () {
            $(".header-item").click(function () {
                $(this).parent().find("ul").slideToggle(500);
            })
        });
    </script>
@endsection
