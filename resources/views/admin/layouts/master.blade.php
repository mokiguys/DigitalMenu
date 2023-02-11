<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@yield('title')
<!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    @if(app()->getLocale() == "fa")
        <link rel="stylesheet" href="{{ asset('admin/css/shared/style.css')}}">
        <link rel="stylesheet" href="{{ asset('admin/css/demo_1/style.css')}}">
    @else
        <link rel="stylesheet" href="{{ asset('admin/css/shared/style-ltr.css')}}">
        <link rel="stylesheet" href="{{ asset('admin/css/demo_1/style-ltr.css')}}">
@endif
<!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('Site/img/favicon.png')}}">
</head>
<body onload="startTime()">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('admin.layouts.navigation')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    @include('admin.layouts.sidebar')
    <!-- partial -->
        <div class="main-panel">
        @yield('main')
        <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix text-center">
                    <span
                        class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © @php echo Date('Y') @endphp <a
                            href="https://berkeh.tech" rel="nofollow" target="_blank">Berkeh.tech</a>. All rights reserved</span>
                    </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- layouts-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

<script src="{{ asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<link rel="stylesheet" href="{{ asset('admin/js/all.min.js')}}">
<script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('admin/js/shared/off-canvas.js')}}"></script>
<script src="{{ asset('admin/js/shared/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('admin/js/demo_1/dashboard.js')}}"></script>

<script src="{{ asset('admin/vendors/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js')}}"></script>
<script>
    CKEDITOR.replaceClass('ckeditor', {
        filebrowserBrowseUrl: '/admin/vendors/ckfinder/ckfinder.html',
        filebrowserUploadUrl: '/admin/vendors/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>
<script>
    $('.select').select2({
        placeholder: $(this).attr("data-placeholder"),
        dir: "rtl",
        language: "fa",
    });
</script>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }
</script>
<script>
    $(function () {
        $(".exit-class").click(function () {
            swal("آیا شما مایل به خروج از پنل مدیریت هستید ؟", {
                buttons: {
                    cancel: "انصراف",
                    catch: {
                        text: "خروج",
                        value: "catch",
                    },
                },
            }).then((value) => {
                switch (value) {
                    case "catch":
                        $("#exit").click();
                        break;
                }
            });
        });
        $(".info-icon").click(function () {
            $help = $(this).attr('data-help');
            swal($help, {
                buttons: {
                    cancel: "متوجه شدم",
                },
            });
        });
    })
</script>
@include('sweet::alert')
<script src="{{ asset('admin/js/main.js')}}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
@yield('script')

<!-- End custom js for this page-->
</body>
</html>
