<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a class="logo-dark" href="index.html">
            <img alt="logo sm" class="logo-sm" src="{{asset('assets/images/logo-sm.png')}}"/>
            <img alt="logo dark" class="logo-lg" src="{{asset('assets/images/logo-dark.png')}}"/>
        </a>
        <a class="logo-light" href="index.html">
            <img alt="logo sm" class="logo-sm" src="{{asset('assets/images/logo-sm.png')}}"/>
            <img alt="logo light" class="logo-lg" src="{{asset('assets/images/logo-light.png')}}"/>
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
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarDashboards">
                    <span class="nav-icon"><i class="ri-dashboard-2-line"></i></span>
                    <span class="nav-text">داشبوردها</span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="dashboard-agent.html">نمایندگان</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Properties -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarProperty">
                    <span class="nav-icon"><i class="ri-community-line"></i></span>
                    <span class="nav-text">املاک</span>
                </a>
                <div class="collapse" id="sidebarProperty">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('properties.grid')}}">گرید املاک</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('properties.list')}}">لیست املاک</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('properties.details')}}">جزئیات املاک</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('properties.add')}}">اضافه کردن املاک</a></li>
                    </ul>
                </div>
            </li>

            <!-- Agents -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarAgents">
                    <span class="nav-icon"><i class="ri-group-line"></i></span>
                    <span class="nav-text">نمایندگان</span>
                </a>
                <div class="collapse" id="sidebarAgents">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="agents-list.html">لیست ویو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="agents-grid.html">گرید ویو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="agents-details.html">جزئیات نمایندگان</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="agents-add.html">اضافه کردن</a></li>
                    </ul>
                </div>
            </li>

            <!-- Customers -->
            <li class="nav-item">
                <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#sidebarCustomers">
                    <span class="nav-icon"><i class="ri-contacts-book-3-line"></i></span>
                    <span class="nav-text">مشتریان</span>
                </a>
                <div class="collapse" id="sidebarCustomers">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('customers.list')}}">لیست ویو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('customers.grid')}}">گرید ویو</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('customers.details')}}">جزئیات مشتری</a></li>
                        <li class="sub-nav-item"><a class="sub-nav-link" href="{{route('customers.add')}}">اضافه کردن مشتری</a></li>
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

        </ul>
    </div>
</div>
