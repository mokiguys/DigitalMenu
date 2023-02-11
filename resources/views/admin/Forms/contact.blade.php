@extends('admin.layouts.master')
@section('title')
    <title>لیست درخواست های تماس با ما</title>
@endsection

@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    @foreach($contact as $key => $item)
                        <div class="card">
                            <div class="card-header" id="heading{{$key}}">
                                <h2 class="mb-0 d-flex justify-content-between">
                                    <p data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false"
                                       aria-controls="collapse{{$key}}"> {{$item->name}}
                                        (<span>{{jdate($item->created_at)->format('%A, %d %B %y')}}</span>)
                                        <span
                                            class="badge badge-{{$item->status == 0 ? 'danger' : 'secondary'}}">{{$item->status == 0 ? 'جدید' : 'قدیمی'}}</span>
                                    </p>
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{$key}}" aria-expanded="false"
                                            aria-controls="collapse{{$key}}">
                                        <i class="fad fa-plus"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label class="float-right">نام</label>
                                                <input class="form-control" disabled value="{{$item->name}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <label class="float-right">ایمیل</label>
                                                <input class="form-control" disabled value="{{$item->email}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="float-right">متن</label>
                                                <textarea class="form-control" style="height: 150px" disabled>{{$item->text}}</textarea>
                                            </div>
                                        </div>
                                        @if($item->status == 0)
                                            <div class="col-12 col-lg-2">
                                                <div class="form-group">
                                                    <button class="btn btn-primary float-right submit-form"
                                                            data-id="{{$item->id}}">تایید فرم
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12 col-lg-2">
                                            <div class="form-group float-right">
                                                <form action="/Panel_admin/Contact/{{$item->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn-danger btn delete-submit" hidden><i class="fa fa-trash"></i>
                                                    </button>
                                                    <span class="btn-danger btn delete">حذف</span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row paginate_style">
            {{$contact->render()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".submit-form").click(function () {
            $id = $(this).attr('data-id');
            $csrf = "{{@csrf_token()}}";
            $method = "put";
            $.ajax({
                url: 'UpdateSubmitContact',
                type: 'post',
                data: {_token: $csrf, _method: $method, id: $id},
                success: function (response) {
                    if (response == "success") {
                        swal('موفقیت آمیز بود');
                    }
                }
            });
        });
        $("body").on('click', '.delete', function () {
            swal("آیا شما از حذف این مورد اطمینان دارید ؟", {
                buttons: {
                    cancel: "بستن",
                    catch: {
                        text: "حذف",
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
    </script>
@endsection
