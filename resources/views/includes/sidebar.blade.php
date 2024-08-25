<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ Auth::check() ? url('/home') : url('/') }}" class="brand-link navbar-white">
        <img
            src="{{ asset('assets/img/logo/weblogo.png')  }}"
            alt="{{ config('app.name') }} Logo"
            class="brand-image">
        <span
            class="brand-text font-weight-bold">
            {{ \Illuminate\Support\Str::replaceFirst('O', '', config('app.name')) }}
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('vendor.home') }}"
                       class="nav-link {{ request()->is('vendor/home*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">home</i>
                        <p>{{__('Dashboard')}}</p>
                    </a>
                </li>

                <li class="nav-header">Modules</li>
                <li class="nav-item">
                    <a href="{{ route('vendor.drivers.index') }}"
                       class="nav-link {{ request()->is('vendor/drivers*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">sports_motorsports</i>
                        <p>{{__('Drivers')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.vehicles.index') }}"
                       class="nav-link {{ request()->is('vendor/vehicles*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">commute</i>
                        <p>{{__('Vehicles')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vendor.payments.index') }}"
                       class="nav-link {{ request()->is('vendor/payments*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">payments</i>
                        <p>{{__('Payments')}}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('vendor/bookings*') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link  {{ request()->is('vendor/bookings*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">book_online</i>
                        <p>
                            {{__('Bookings')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('vendor/bookings/index', ['Requests']) }}"
                               class="nav-link {{ request()->is('vendor/bookings/index/Requests') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Requests')  }}</p>
                            </a>
                        </li>
                        @foreach(config('custom.booking.status') as $name)
                            @if(in_array($name, config('custom.booking.status_for_vendor')))
                                <li class="nav-item">
                                    <a href="{{ url('vendor/bookings/index', [$name]) }}"
                                       class="nav-link {{ request()->is('vendor/bookings/index/'.$name) ? 'active' : ''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __($name)  }}</p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="nav-header">Management</li>
                <li class="nav-item">
                    <a href="{{route('vendor.profile')}}"
                       class="nav-link {{ request()->is('vendor/profile*') ? 'active' : ''}}">
                        <i class="nav-icon material-icons">corporate_fare</i>
                        <p>{{__('Profile')}}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
