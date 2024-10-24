@extends('admin.core.admin')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
            
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-5 col-xl-3">
            <div class="card borda-cx ratio ratio-4x3">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="">
                        <div class="row">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="avatar-xl bg-hoom rounded-circle">
                                    <i class="mdi mdi-chart-areaspline avatar-title font-22 text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 col-12 text-center">
                            <h5 class="text-uppercase">Usuário</h5>
                        </div>
                    </a>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div><a href="" target="_blank" style="color:#94a0ad;"><script>document.write(new Date().getFullYear())</script> © WHI - Web de Alta Inspiração</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
@endsection