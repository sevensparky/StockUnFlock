<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>داشبورد</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        سطح مشترک
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>اجزا</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">اجزای شخصی سازی شده:</h6>
                <a class="collapse-item" href="{{ route('categories.index') }}">دسته بندی ها</a>
                <a class="collapse-item" href="{{ route('subcategories.index') }}">زیر دسته ها</a>
                <a class="collapse-item" href="{{ route('tags.index') }}">برچسب ها</a>
                <a class="collapse-item" href="{{ route('faq.index') }}">سوالات متداول</a>
                <a class="collapse-item" href="{{ route('contact.index') }}">بخش تماس با ما</a>
                <a class="collapse-item" href="{{ route('social.index') }}">شبکه های اجتماعی</a>
                <a class="collapse-item" href="cards.html">کارت</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>ابزارها</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">ابزار های شخصی سازی شده:</h6>
                <a class="collapse-item" href="utilities-color.html">رنگ ها</a>
                <a class="collapse-item" href="utilities-border.html">خطوط</a>
                <a class="collapse-item" href="utilities-animation.html">انیمیشن ها</a>
                <a class="collapse-item" href="utilities-other.html">دیگر ابزار ها</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        افزونه ها
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>صفحات</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">صفحات ورود:</h6>
                <a class="collapse-item" href="login.html">ورود</a>
                <a class="collapse-item" href="register.html">ثبت نام</a>
                <a class="collapse-item" href="forgot-password.html">فراموشی رمز عبور</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">دیگر صفحات:</h6>
                <a class="collapse-item" href="404.html">صفحه ۴۰۴</a>
                <a class="collapse-item" href="blank.html">صفحه خالی</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>نمودارها</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>جداول</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
