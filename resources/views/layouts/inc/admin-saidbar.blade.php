<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('user-chart') ? 'active' : '' }}" href="{{ url('user-chart') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                    Charts
                </a>

                <div class="sb-sidenav-menu-heading">Manage For Smart Barter </div>

                <!-- قسم الفئات -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-category') }}">Add Category</a>
                        <a class="nav-link" href="{{ url('admin/category') }}">View Category</a>
                    </nav>
                </div>

                <!-- قسم المنتجات (Products) -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProducts" aria-labelledby="headingProducts"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-product') }}">Add Product</a>
                        <a class="nav-link" href="{{ url('admin/products') }}">View Products</a>
                    </nav>
                </div>

                {{-- لما بدي اخلي بالموقع طلبات  --}}
                <!-- قسم الطلبات (Orders) -->
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOrders"
                    aria-expanded="false" aria-controls="collapseOrders">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Orders
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> --}}
                <div class="collapse" id="collapseOrders" aria-labelledby="headingOrders"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/orders/create') }}">Add Order</a>
                        <a class="nav-link" href="{{ url('admin/orders') }}">View Orders</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseSubscriptions" aria-expanded="false" aria-controls="collapseSubscriptions">
                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                    Subscriptions
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSubscriptions" aria-labelledby="headingSubscriptions"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('subscriptions.create') }}">Add Subscription</a>
                        <a class="nav-link" href="{{ route('subscriptions.index') }}">View Subscriptions</a>
                    </nav>
                </div>




                <!-- قسم المستخدمين -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers"
                    aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingUsers"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/add-user') }}">Add User</a>
                        <a class="nav-link" href="{{ url('admin/users') }}">View Users</a>
                    </nav>




                </div>
            </div>
        </div>
    </nav>
</div>
