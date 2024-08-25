<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@yield('heading')</h1>
            </div>
            <div class="col-sm-6 hide">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
            <div class="col-sm-6 text-right">
                @if(View::hasSection('backheading'))
                <a
                href="{{ url()->previous() }}"
                class="btn btn-default float-right">
                <i class="material-icons">reply_all</i>&nbsp;
                {{ __('Back') }}
                </a>
            @endif
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
