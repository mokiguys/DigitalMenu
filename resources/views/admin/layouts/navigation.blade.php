<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('Admin.home')}}">
            <p class="font-weight-bold text-light">{{auth()->user()->name}}</p>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('Admin.home')}}">
            <p class="font-weight-bold text-light">{{auth()->user()->name}}</p> </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item dropdown">-->
            <!--    <span id="txt"></span>-->
            <!--</li>-->
            <li class="nav-item">
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <input type="button"  class="btn exit-class btn-danger" value="خروج از پنل مدیریت">
                    <input type="submit" class=" exit" hidden>
                </form>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
