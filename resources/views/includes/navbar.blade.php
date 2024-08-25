<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="material-icons">menu</i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="material-icons md-dark">account_circle</i>
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <i class="material-icons md-dark">account_circle</i>
                    <p>
                        {{ auth()->user()->name }} - {{ auth()->user()->roles()->first()->name }}
                        <small class="hide"></small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    {{-- <a href="{{ route('change-password') }}" class="btn btn-default btn-flat">Change Password</a> --}}
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-center w-100">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;" action={{ route('logout') }}>
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
