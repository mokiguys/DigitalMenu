@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Menus List | Minemenu</title>
@endsection
@section('main')
    <!-- background-header -->
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                    @lang("text.title_list_menu_user")
                </h1>
            </div>
        </div>
        <!-- start menu_edit section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('user_menu.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="menu_edit_section">
                            <div class="menu_edit">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="food_title_persian">@lang("text.food_name")</label>
                                        <input type="text" list="food_persian" name="name"
                                               id="food_title_persian" autocomplete="off" required class="text-right">
                                        <datalist id="food_persian">
                                            @foreach($data['food'] as $item)
                                                <option value="{{$item[app()->getLocale()]}}">
                                            @endforeach
                                        </datalist>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="shop_id" value="{{$_GET['shop']}}">
                            <div class="menu_edit">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="food_description_persian">@lang("text.food_description")</label>
                                        <textarea name="description"
                                                  id="food_description_persian"
                                                  class="text-right"
                                                  cols="30" rows="5"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="menu_edit">
                                <label for="input_image">@lang("text.food_image")</label>
                                <input type="file" name="image" id="input_image">
                            </div>
                            <div class="custom_edit mb-3">
                                <label for="tags">@lang("text.food_integration")</label>
                                <div class="alert alert-warning">
                                    <p class="mb-0">@lang("text.food_integration_description")</p>
                                </div>
                                <input type="text" name="tags" class="tag-input form-control" id="tags"
                                       list="food_persian">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="title mb-1 font-weight-bold">
                                        @lang("text.food_exist")
                                    </div>
                                    <div class="menu_edit_available">
                                        <div class="menu_edit_item">
                                            <label for="food_available_1">@lang("text.available")</label>
                                            <input type="radio" name="exist" id="food_available_1"
                                                   class="input_radio" checked value="1">
                                        </div>
                                        <div class="menu_edit_item">
                                            <label for="food_available_2">@lang("text.n_available")</label>
                                            <input type="radio" name="exist" id="food_available_2"
                                                   class="input_radio" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="title mb-1 font-weight-bold">
                                        @lang("text.priceTypeCurrency")
                                    </div>
                                    <div class="menu_edit_currency">
                                        <div class="menu_edit_item">
                                            <label for="currency_1">@lang("text.rial")</label>
                                            <input type="radio" name="currency" id="currency_1" class="input_radio"
                                                   {{app()->getLocale() == "fa" ? 'checked' : ""}} value="1">
                                        </div>
                                        <div class="menu_edit_item">
                                            <label for="currency_2">@lang("text.lira")</label>
                                            <input type="radio" name="currency" id="currency_2"
                                                   {{app()->getLocale() != "fa" ? 'checked' : ""}} class="input_radio"
                                                   value="2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row custom_margin">
                                <div class=" col-6">
                                    <div class="menu_edit_sale menu_edit_price">
                                        <label for="price">@lang("text.priceFood")</label>
                                        <div class="alert alert-warning">
                                            <p class="mb-0">@lang("text.description_price_food")</p>
                                        </div>
                                        <input type="number" required name="price" id="price" value="" min="0">
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <div class="menu_edit_sale">
                                        <label for="sale">@lang("text.discount")</label>
                                        <div class="alert alert-warning">
                                            <p class="mb-0">@lang("text.description_discount")</p>
                                        </div>
                                        <input type="number" name="discount" id="sale" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row custom_margin">
                                <div class="col-12">
                                    <div class="menu_edit_category">
                                        <label for="category">
                                            @lang("text.MenuCategory")
                                        </label>
                                        <div class="custom_category menu_edit">
                                            <select name="category" id="category" class="category">
                                                <option value="0" selected disabled>@lang("text.description_category_menu")</option>
                                                @foreach($data['CategoryFood'] as $item)
                                                    <option value="{{$item->id}}">{{$item[app()->getLocale()]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-warning">
                                <p class="mb-0">@lang("text.description_menu_list")</p>
                            </div>
                            <div class="input_submit">
                                <input type="submit" class="btn" value="@lang("text.submit")">
                            </div>
                            <hr>
                        </div>
                    </form>
                    <div class="row mb-5">
                        <div class="col-12 menu_edit_list item_dashboard shops_list">
                            <p class="text-right">@lang("text.title_list_menu_user")</p>
                            <div class="menu_edit_your_listing your_listing d-none d-lg-block">
                                <!-- desktop -->
                                <ul class="ul_your_listing">
                                    <li>
                                        <div class="li_title_your_listing">
                                           @lang("text.food_name")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.priceFood")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.discount")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.food_exist")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.category")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.edit")
                                        </div>
                                        <div class="li_title_your_listing">
                                            @lang("text.delete")
                                        </div>
                                    </li>
                                    @foreach($data['menu'] as $item)
                                        <li>
                                            <div class="li_your_listing">
                                                @switch(app()->getLocale())
                                                    @case('fa')
                                                    <td>{{$item->fa != null ? $item->fa : __("text.not_complate")}}</td>
                                                    @break
                                                    @case('en')
                                                    <td>{{$item->en != null ? $item->en : __("text.not_complate")}}</td>
                                                    @break
                                                    @case('tr')
                                                    <td>{{$item->tr != null ? $item->tr : __("text.not_complate")}}</td>
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->price}} {{$item->currency == 1 ? __("text.rial") : __("text.lira")}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->discount}}%
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->exist == 1 ? __("text.available") : __("text.n_available")}}
                                            </div>
                                            <div class="li_your_listing">
                                                {{$item->CategoryFood[app()->getLocale()]}}
                                            </div>
                                            <div class="li_your_listing">
                                                <a href="{{route('user_menu.edit',['user_menu'=>$item->id])}}"
                                                   class="btn btn-success text-light">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="li_your_listing">
                                                <form action="{{route('user_menu.destroy',['user_menu'=>$item->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-danger btn delete-submit" hidden><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                    <span class="btn-danger btn delete"><i
                                                            class="fa fa-trash"></i></span>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list_shop_mobile d-lg-none">
                                <!-- mobile -->
                                <ul>
                                    @foreach($data['menu'] as $item)
                                        <li>
                                            <div class="title">
                                                @switch(app()->getLocale())
                                                    @case('fa')
                                                    <td>{{$item->fa != null ? $item->fa : __("text.not_complate")}}</td>
                                                    @break
                                                    @case('en')
                                                    <td>{{$item->en != null ? $item->en : __("text.not_complate")}}</td>
                                                    @break
                                                    @case('tr')
                                                    <td>{{$item->tr != null ? $item->tr : __("text.not_complate")}}</td>
                                                    @break
                                                @endswitch
                                            </div>
                                            <div class="list_item_shop" style="display: none;">
                                                <div class="items">
                                                    <span> @lang("text.priceFood")</span>
                                                    <span>{{$item->price}} {{$item->currency == 1 ? __("text.rial") : __("text.lira")}}</span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.discount")</span>
                                                    <span>{{$item->discount}}%</span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.food_exist")</span>
                                                    <span>{{$item->exist == 1 ? __("text.available") : __("text.n_available")}}</span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.category")</span>
                                                    <span>{{$item->CategoryFood[app()->getLocale()]}}</span>
                                                </div>
                                                <div class="items mb-2">
                                                    <span>@lang("text.edit")</span>
                                                    <span>
                                                        <a href="{{route('user_menu.edit',['user_menu'=>$item->id])}}"
                                                           class="btn btn-success">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="items">
                                                    <span>@lang("text.delete")</span>
                                                    <span>
                                                        <form action="{{route('user_menu.destroy',['user_menu'=>$item->id])}}" method="post">
                                                @csrf
                                                            @method('delete')
                                                <button class="btn-danger btn delete-submit" hidden><i
                                                        class="fa fa-trash"></i>
                                                </button>
                                                <span class="btn-danger btn delete"><i class="fa fa-trash"></i></span>
                                            </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
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
        $("#category").select2({
            dir: 'rtl'
        });
        var tags = new Bloodhound({
            datumTokenizer: function (d) {
                return Bloodhound.tokenizers.whitespace(d.tag);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: [
                    @foreach($data['Ingredient'] as $item)
                {
                    tag: "{{$item[app()->getLocale()]}}"
                },
                @endforeach
            ]
        });

        tags.initialize();

        // Create typeahead-enabled tag inputs
        $('.tag-input').tagInput({
            allowDuplicates: false,
            typeahead: true,
            typeaheadOptions: {
                highlight: true
            },
            typeaheadDatasetOptions: {
                // Display function determines which data is displayed as the tag text
                display: function (d) {
                    return d.tag;
                },
                source: tags.ttAdapter()
            },
            onTagDataChanged: function (added, removed) {
                // Added/removed tags are passed in as callback parameters
                // console.log('Tag Data: ' + (this.val() || null) + ', Added: ' + added + ', Removed: ' + removed + '\n');
                if (removed == null) {
                    $csrf = "{{@csrf_token()}}";
                    $method = "post";
                    $.ajax({
                        url: "{{route('menu_check')}}",
                        type: 'post',
                        data: {_token: $csrf, _method: $method, tag: added},
                        success: function (response) {
                            // $data = JSON.parse(response);
                        }
                    });
                }
            }
        });
        {{--$("#food_title_persian").change(function () {--}}
        {{--    $name = $(this).val();--}}
        {{--    $csrf = "{{@csrf_token()}}";--}}
        {{--    $method = "post";--}}

        {{--    $.ajax({--}}
        {{--        url: "{{route('menu_exist_food')}}",--}}
        {{--        type: 'post',--}}
        {{--        data: {_token: $csrf, _method: $method, name: $name},--}}
        {{--        success: function (response) {--}}
        {{--            $data = JSON.parse(response);--}}
        {{--            $html = "";--}}
        {{--            $tags = "";--}}
        {{--            for ($i = 0; $i < $data.length; $i++) {--}}
        {{--                $html += '<span class="bg-primary c-tag" data-tag="'+$data[$i]+'">';--}}
        {{--                $html += $data[$i];--}}
        {{--                $html += '<svg class="svg-inline--fa fa-trash fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg><!-- <span class="fas fa-trash"></span> -->';--}}
        {{--                $html += '</span>';--}}
        {{--                $tags += $data[$i].concat('|');--}}
        {{--            }--}}
        {{--            $html += '<input class="mab-jquery-taginput-data" type="hidden" name="tags" id="tags" value="'+$tags+'">';--}}
        {{--            $(".mab-jquery-taginput").html($html)--}}

        {{--        }--}}
        {{--    });--}}
        {{--})--}}
    </script>
@endsection
