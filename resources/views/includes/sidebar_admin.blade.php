<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="{{ Auth::check() ? url('/home') : url('/') }}" class="brand-link navbar-white">
        <img src="{{ asset('assets/bp_management.png') }}" alt="" class="brand-image">
        <span class="brand-text font-weight-bold">
            {{ \Illuminate\Support\Str::replaceFirst('O', '', config('app.name')) }}
        </span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="nav-link {{ request()->is('admin/home*') ? 'active' : '' }}">
                        <i class="nav-icon material-icons">home</i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>

                @hasanyrole('Super Admin|Admin')
                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">Users</p>
                    </div>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">admin_panel_settings</i>
                            <p>{{ __('Agents') }}</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('admin.customers.index') }}"
                            class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">account_circle</i>
                            <p>{{ __('Customers') }}</p>
                        </a>
                    </li>
                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">Ecommerce</p>
                    </div>
                    <li class="nav-item">
                        <a href="{{ route('admin.product.index') }}"
                            class="nav-link {{ request()->is('admin/product*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">shopping_cart</i>
                            <p>{{ __('Products') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.coupons.index') }}"
                            class="nav-link {{ request()->is('admin/coupons*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">pages</i>
                            <p>{{ __('Coupon') }}</p>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('admin/orders*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link  {{ request()->is('admin/orders*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">book_online</i>
                            <p>
                                {{ __('Orders') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/orders/index', ['All']) }}"
                                    class="nav-link {{ request()->is('admin/orders/index/All') ? 'active' : '' }}">
                                    <i
                                        class="{{ request()->is('admin/orders/index/All') ? 'fas' : 'far' }} fa-circle nav-icon"></i>
                                    <p>{{ __('All') }}</p>
                                </a>
                            </li>
                            @foreach (config('custom.order_status') as $name)
                                <li class="nav-item">
                                    <a href="{{ url('admin/orders/index', [$name]) }}"
                                        class="nav-link {{ request()->is('admin/orders/index/' . $name) ? 'active' : '' }}">
                                        <i
                                            class="{{ request()->is('admin/orders/index/' . $name) ? 'fas' : 'far' }} fa-circle nav-icon "></i>
                                        <p>{{ __($name) }}</p>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">Diet</p>
                    </div>


                    <li class="nav-item">
                        <a href="{{ url('admin/food') }}"
                            class="nav-link {{ request()->is('admin/food') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">restaurant</i>
                            <p>{{ __('Food') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/exercise') }}"
                            class="nav-link {{ request()->is('admin/exercise') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">fitness_center</i>
                            <p>{{ __('Exercise') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/medication') }}"
                            class="nav-link {{ request()->is('admin/medication') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">medication</i>
                            <p>{{ __('Medication') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}"
                            class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">monitor_weight</i>
                            <p>{{ __('Categories') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dietplans.index') }}"
                            class="nav-link {{ request()->is('admin/dietplans*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">monitor_weight</i>
                            <p>{{ __('Diet Plans') }}</p>
                        </a>
                    </li>


                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">FAQ & CMS</p>
                    </div>

                    {{-- <li class="nav-item">
                        <a href="{{ route('admin.content.index') }}"
                            class="nav-link {{ request()->is('admin/content*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">videocam</i>
                            <p>{{ __('Contents') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.insights.index') }}"
                            class="nav-link {{ request()->is('admin/insights*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">key_visualizer</i>
                            <p>{{ __('Insights') }}</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.cms.index') }}"
                            class="nav-link {{ request()->is('admin/cms*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">domain</i>
                            <p>{{ __('CMS') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.faq.index') }}"
                            class="nav-link {{ request()->is('admin/faq*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">domain</i>
                            <p>{{ __('FAQ') }}</p>
                        </a>
                    </li>

                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">Payments</p>
                    </div>
                    <li class="nav-item">
                        <a href="{{ route('admin.package.index') }}"
                            class="nav-link {{ request()->is('admin/package*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">payment</i>
                            <p>{{ __('Package') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.paymentGateway.index') }}"
                            class="nav-link {{ request()->is('admin/paymentGateway*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">domain</i>
                            <p>{{ __('Payment Gateway') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.packages.transactions') }}"
                            class="nav-link {{ request()->is('admin/transactions*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">receipt_long</i>
                            <p>{{ __('Transactions ') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.payout.index') }}"
                            class="nav-link {{ request()->is('admin/payout*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">receipt_long</i>
                            <p>{{ __('Payout Requests ') }}</p>
                        </a>
                    </li>
                    <div class="text-left">
                        <p class="text-bold m-0 p-0 ml-4">Others</p>
                    </div>
                    <li class="nav-item {{ request()->is('admin/reports*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link  {{ request()->is('admin/reports*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">book_online</i>
                            <p>
                                {{ __('Reports') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ url('admin/reports/products') }}"
                                    class="nav-link {{ request()->is('admin/reportss/products') ? 'active' : '' }}">
                                    <i
                                        class="{{ request()->is('admin/reports/products') ? 'fas' : 'far' }} fa-circle nav-icon "></i>
                                    <p>{{ __('Products  ') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/reports/orders') }}"
                                    class="nav-link {{ request()->is('admin/reports/orders') ? 'active' : '' }}">
                                    <i
                                        class="{{ request()->is('admin/reports/orders') ? 'fas' : 'far' }} fa-circle nav-icon "></i>
                                    <p>{{ __('Orders ') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('admin/reports/payouts') }}"
                                    class="nav-link {{ request()->is('admin/reports/payouts') ? 'active' : '' }}">
                                    <i
                                        class="{{ request()->is('admin/reports/payouts') ? 'fas' : 'far' }} fa-circle nav-icon "></i>
                                    <p>{{ __('Payouts ') }}</p>
                                </a>
                            </li>



                        </ul>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('admin.feedbacks.index') }}"
                            class="nav-link {{ request()->is('admin/feedbacks*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">receipt_long</i>
                            <p>{{ __('Feedbacks ') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.testimonial.index') }}"
                            class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">comment</i>
                            <p>{{ __('Testimonial ') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.helpsupport.index') }}"
                            class="nav-link {{ request()->is('admin/helpsupport*') ? 'active' : '' }}">
                            <i class="nav-icon material-icons">help</i>
                            <p>{{ __('Help And Support ') }}</p>
                        </a>
                    </li>



                        <li class="nav-item">
                            <a href="{{ route('admin.settings.index') }}"
                                class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                                <i class="nav-icon material-icons">settings</i>
                                <p>{{ __('Settings') }}</p>
                            </a>
                        </li>
                @endhasanyrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
