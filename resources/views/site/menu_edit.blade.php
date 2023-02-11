@extends('site.layout.app',['transparent'=>false])
@section('seo')
    <title>Menus Edit | Minemenu</title>
@endsection
@section('main')
    <div class="my_account">
        <div class="header_background">
            <div class="cover"></div>
            <div class="account_title">
                <h1>
                    @lang("text.edit_menu")
                </h1>
            </div>
        </div>
        <!-- start menu_edit section -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('user_menu.update',['user_menu'=>$data['menu'][0]->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="menu_edit_section">
                            <div class="menu_edit">
                                <div class="title mb-1 font-weight-bold">
                                    @lang("text.food_name")
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="food_title_persian">@lang("text.title_fa")</label>
                                        <input type="text" list="food_persian" name="name_fa"
                                               id="food_title_persian" autocomplete="off" value="{{$data['menu'][0]->fa}}" class="text-right">
                                        <datalist id="food_persian">
                                            @foreach($data['food'] as $item)
                                                <option value="{{$item["fa"]}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="food_title_english">@lang("text.title_en")</label>
                                        <input type="text" list="food_english" value="{{$data['menu'][0]->en}}" name="name_en"
                                               id="food_title_english" autocomplete="off" class="text-left">
                                        <datalist id="food_english">
                                            @foreach($data['food'] as $item)
                                                <option value="{{$item["en"]}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="food_title_turkish">@lang("text.title_tr")</label>
                                        <input type="text" list="food_turkish" value="{{$data['menu'][0]->tr}}" name="name_tr"
                                               id="food_title_turkish" autocomplete="off" class="text-left">
                                        <datalist id="food_turkish">
                                            @foreach($data['food'] as $item)
                                                <option value="{{$item["tr"]}}">
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="menu_edit">
                                <div class="title mb-1 font-weight-bold">
                                    @lang("text.food_description")
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="food_description_persian">@lang("text.description_fa")</label>
                                        <textarea name="description_fa" id="food_description_persian"
                                                  class="text-right"
                                                  cols="30" rows="5">{{$data['menu'][0]->description_fa}}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="food_description_english">@lang("text.description_en")</label>
                                        <textarea name="description_en" id="food_description_english"
                                                  class="text-left" cols="30" rows="5">{{$data['menu'][0]->description_en}}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="food_description_turkish">@lang("text.description_tr")</label>
                                        <textarea name="description_tr" id="food_description_turkish"
                                                  class="text-left" cols="30" rows="5">{{$data['menu'][0]->description_tr}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="menu_edit">
                                <label for="input_image">@lang("text.food_image")</label>
                                <img src="{{asset('site/uploader/menu/'.$data['menu'][0]->image)}}" width="60" height="60" class="mb-2">
                                <input type="file" name="image" id="input_image">
                            </div>
                            <div class="custom_edit mb-3">
                                <label for="input_tags_persian">@lang("text.food_integration")</label>
                                <div class="alert alert-warning">
                                    <p class="mb-0">@lang("text.food_integration_description")</p>
                                </div>

                                <input type="text" name="tags" class="tag-input form-control" id="input_tags_persian" value="{{$data['Ingredients']}}">
                            </div>
                            <div class="row">
                                <div class=" col-6">
                                    <div class="title mb-1 font-weight-bold">
                                        @lang("text.food_exist")
                                    </div>
                                    <div class="menu_edit_available">
                                        <div class="menu_edit_item">
                                            <label for="food_available_1">@lang("text.available")</label>
                                            <input type="radio" name="exist" id="food_available_1"
                                                   class="input_radio" {{$data['menu'][0]->exist == 1 ? "checked" : ""}} value="1">
                                        </div>
                                        <div class="menu_edit_item">
                                            <label for="food_available_2">@lang("text.n_available")</label>
                                            <input type="radio" name="exist" id="food_available_2"
                                                   class="input_radio" {{$data['menu'][0]->exist == 0 ? "checked" : ""}} value="0">
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
                                                   {{$data['menu'][0]->currency == 1 ? "checked" : ""}} value="1">
                                        </div>
                                        <div class="menu_edit_item">
                                            <label for="currency_2">@lang("text.lira")</label>
                                            <input type="radio" name="currency" {{$data['menu'][0]->currency == 2 ? "checked" : ""}} id="currency_2" class="input_radio"
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
                                        <input type="number" name="price" value="{{$data['menu'][0]->price}}" id="price" min="0">
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <div class="menu_edit_sale">
                                        <label for="discount">@lang("text.discount")</label>
                                        <div class="alert alert-warning">
                                            <p class="mb-0">@lang("text.description_discount")</p>
                                        </div>
                                        <input type="number" name="discount" value="{{$data['menu'][0]->discount}}" id="discount" min="0">
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
                                                    <option value="{{$item->id}}" {{$data['menu'][0]->category_id == $item->id ? "selected" : ""}}>{{$item[app()->getLocale()]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input_submit">
                                <input type="submit" class="btn" value="@lang("text.submit")">
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $("#category").select2({
            dir: 'rtl'
        });
        var tags = new Bloodhound({
            datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.tag); },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: [
                    @foreach($data['Ingredient'] as $item)
                { tag: "{{$item[app()->getLocale()]}}" },
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
                display: function(d) { return d.tag; },
                source: tags.ttAdapter()
            },
            onTagDataChanged: function(added, removed) {
                // Added/removed tags are passed in as callback parameters
                // console.log('Tag Data: ' + (this.val() || null) + ', Added: ' + added + ', Removed: ' + removed + '\n');
                if(removed == null) {
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
    </script>
@endsection
