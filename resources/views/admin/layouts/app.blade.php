<!DOCTYPE html>
<html>
@include('admin.layouts.partials.head')

<body class="skin-blue sidebar-mini"> text-center
<div class="wrapper">

    <!-- Main Header -->
    @include('admin.layouts.partials.navbar')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @include('admin.layouts.partials.messages')
                    </div>
                </div>
            </div>
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('admin.layouts.partials.footer')
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

    @include('admin.layouts.partials.scripts')
</body>
</html>
