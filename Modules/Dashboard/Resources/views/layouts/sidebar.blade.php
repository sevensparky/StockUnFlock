<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>داشبورد</span></a>
    </li>

    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCalendar"
            aria-expanded="true" aria-controls="collapseCalendar">
            <i class="fas fa-fw fa-calendar"></i>
            <span>تقویم</span>
        </a>
        <div id="collapseCalendar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('calendar.index') }}">ساعت و تقویم روز</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>اجزا مشترک</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت اجزا مشترک:</h6>
                <a class="collapse-item" href="{{ route('categories.index') }}">مدیریت دسته بندی ها</a>
                <a class="collapse-item" href="{{ route('units.index') }}">مدیریت واحد های سنجش</a>
                <a class="collapse-item" href="{{ route('customers.index') }}">مدیریت مشتری ها</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers"
            aria-expanded="true" aria-controls="collapseSuppliers">
            <i class="fa fa-chalkboard-teacher"></i>
            <span>بخش فروشنده</span>
        </a>
        <div id="collapseSuppliers" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت همه فروشنده ها:</h6>
                <a class="collapse-item" href="{{ route('suppliers.index') }}">فروشنده ها</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWarehouse"
            aria-expanded="true" aria-controls="collapseWarehouse">
            <i class="fa fa-warehouse"></i>
            <span>بخش انبارها</span>
        </a>
        <div id="collapseWarehouse" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت همه انبار ها:</h6>
                <a class="collapse-item" href="{{ route('warehouses.index') }}">انبار ها</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
            aria-expanded="true" aria-controls="collapseProducts">
            <i class="fa fa-luggage-cart"></i>
            <span>بخش محصولات</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت همه محصولات:</h6>
                <a class="collapse-item" href="{{ route('products.index') }}">محصولات</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePurchases"
            aria-expanded="true" aria-controls="collapsePurchases">
            <i class="fa fa-money-bill-alt"></i>
            <span>بخش خرید و فروش</span>
        </a>
        <div id="collapsePurchases" class="collapse" aria-labelledby="headingPurchases"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت خرید و فروش:</h6>
                <a class="collapse-item" href="{{ route('purchases.index') }}">خرید ها</a>
                <a class="collapse-item" href="{{ route('sell.index') }}">فروش</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoices"
            aria-expanded="true" aria-controls="collapseInvoices">
            <i class="fa fa-clipboard-list"></i>
            <span>بخش صورتحساب ها</span>
        </a>
        <div id="collapseInvoices" class="collapse" aria-labelledby="headingInvoices"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت همه صورتحساب ها:</h6>
                <a class="collapse-item" href="{{ route('invoices.index') }}">فاکتور ها</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
            aria-expanded="true" aria-controls="collapseProfile">
            <i class="fa fa-user"></i>
            <span>حساب کاربری</span>
        </a>
        <div id="collapseProfile" class="collapse" aria-labelledby="headingInvoices"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت حساب کاربری:</h6>
                <a class="collapse-item" href="{{ route('profile.index') }}">حساب کاربری</a>
            </div>
        </div>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
