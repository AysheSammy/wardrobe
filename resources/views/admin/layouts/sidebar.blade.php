<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky py-2 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active text-dark" aria-current="page">
                    <i class="bi-house-door me-3 text-warning"></i>
                    @lang('app.dashboard')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link text-dark">
                    <i class="bi-basket me-3 text-warning"></i>
                    @lang('app.orders')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.customers.index') }}" class="nav-link text-dark">
                    <i class="bi-person-check me-3 text-warning"></i>
                    @lang('app.customers')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.verifications.index') }}" class="nav-link text-dark">
                    <i class="bi-bell me-3 text-warning"></i>
                    @lang('app.verifications')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link text-dark">
                    <i class="bi-box me-3 text-warning"></i>
                    @lang('app.products')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link text-dark">
                    <i class="bi-collection me-3 text-warning"></i>
                    @lang('app.categories')
                </a>
            </li> <li class="nav-item">
                <a href="{{ route('admin.brands.index') }}" class="nav-link text-dark">
                    <i class="bi-ticket me-3 text-warning"></i>
                    @lang('app.brands')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.attributes.index') }}" class="nav-link text-dark">
                    <i class="bi-bar-chart-steps me-3 text-warning"></i>
                    @lang('app.attributes')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.locations.index') }}" class="nav-link text-dark">
                    <i class="bi-geo-alt me-3 text-warning"></i>
                    @lang('app.locations')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link text-dark">
                    <i class="bi-people me-3 text-warning"></i>
                    @lang('app.users')
                </a>
            </li>

        </ul>
    </div>
</nav>