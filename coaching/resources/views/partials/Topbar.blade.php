<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a class="logo-dark" href="{{route('dashboard.index')}}">
        </a>
        <a class="logo-light" href="{{route('dashboard.index')}}">
        </a>
    </div>

    <button aria-label="Show Full Sidebar" class="button-sm-hover" style="transform: rotate(180deg);" type="button">
        <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
    </button>

    <div class="scrollbar" data-simplebar="">
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">منو</li>

            <!-- Dashboards -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="{{route('dashboard.index')}}">
                    <span class="nav-icon"><i class="ri-dashboard-2-line"></i></span>
                    <span class="nav-text">داشبوردها</span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{route('dashboard.index')}}">صفحه نخست</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Agents -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarAgents">
                    <span class="nav-icon"><i class="ri-group-line"></i></span>
                    <span class="nav-text">اطلاعات مربی</span>
                </a>
                <div class="collapse" id="sidebarAgents">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('Coach.add')}}">اضافه کردن مربی</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarAgents">
                    <span class="nav-icon"><i class="ri-group-line"></i></span>
                    <span class="nav-text"> عضلات</span>
                </a>
                <div class="collapse" id="sidebarAgents">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('Workouts.category')}}">اضافه کردن عضلات</a></li>
                    </ul>
                </div>
            </li>
 <!-- Properties -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarProperty">
                    <span class="nav-icon"><i class="ri-community-line"></i></span>
                    <span class="nav-text">برنامه ورزشی </span>
                </a>
                <div class="collapse" id="sidebarProperty">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('Workouts.edit')}}">ادیت برنامه</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('Workouts.show')}}">نمایش برنامه</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('plans.create')}}">اضافه کردن برنامه</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarProperty">
                    <span class="nav-icon"><i class="ri-community-line"></i></span>
                    <span class="nav-text"> منطق عمومی </span>
                </a>
                <div class="collapse" id="sidebarProperty">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('plans.library')}}">کتابخانه برنامه ها</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('plans.list')}}">لیست</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('plans.assign')}}">ارسال برای شاگرد</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarProperty">
                    <span class="nav-icon"><i class="ri-community-line"></i></span>
                    <span class="nav-text">برنامه تغذیه </span>
                </a>
                <div class="collapse" id="sidebarProperty">
                    <ul class="nav sub-navbar-nav">
{{--                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('Workouts.library')}}">کتابخانه برنامه ها</a></li>--}}
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('nutrition.show')}}">نمایش </a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('nutrition.edit')}}">تغییر برنامه غذایی</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('nutrition.create')}}">اضافه کردن برنامه</a></li>
                    </ul>
                </div>
            </li>
            <!-- Customers -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarCustomers">
                    <span class="nav-icon"><i class="ri-contacts-book-3-line"></i></span>
                    <span class="nav-text">اعضای باشگاه</span>
                </a>
                <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('members.list')}}">لیست عضو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('members.grid')}}">گرید عضو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('members.details')}}">جزئیات عضو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('members.add')}}">اضافه کردن عضو</a></li>
                    </ul>
                </div>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link" href="orders.html">
                    <span class="nav-icon"><i class="ri-home-office-line"></i></span>
                    <span class="nav-text">سفارشات</span>
                </a>
            </li>

            <!-- Transactions -->
            <li class="nav-item">
                <a class="nav-link" href="transactions.html">
                    <span class="nav-icon"><i class="ri-arrow-left-right-line"></i></span>
                    <span class="nav-text">تراکنش ها</span>
                </a>
            </li>

            <li class="menu-title">سفارشی</li>

            <!-- Pages -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarPages">
                    <span class="nav-icon"><i class="ri-pages-line"></i></span>
                    <span class="nav-text">صفحات</span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="pages-starter.html">خوش آمدید</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="pages-calendar.html">تقویم</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="pages-invoice.html">فاکتور</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="pages-faqs.html">سوالات متداول</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="pages-404.html">ارور ۴۰۴</a></li>
                    </ul>
                </div>
            </li>

            <!-- Authentication -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarAuthentication">
                    <span class="nav-icon"><i class="ri-lock-password-line"></i></span>
                    <span class="nav-text">احراز هویت</span>
                </a>
                <div class="collapse" id="sidebarAuthentication">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="auth-signin.html">ورود</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="auth-signup.html">ثبت نام</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="auth-password.html">تغییر رمزعبور</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarAuthentication">
                    <span class="nav-icon"><i class="ri-lock-password-line"></i></span>
                    <span class="nav-text">تنظیمات ورود</span>
                </a>
                <div class="collapse" id="sidebarAuthentication">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="auth-password.html"> تعریف رمز</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
