<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" 
    data-layout-mode="{{ isset($settingTheme) ? $settingTheme->data_layout_mode : 'detached' }}" 
    data-topbar-color="{{ isset($settingTheme) ? $settingTheme->data_topbar_color : 'light' }}"
    data-bs-theme="{{ isset($settingTheme) ? $settingTheme->data_bs_theme : 'dark' }}" 
    data-two-column-color="{{ isset($settingTheme) ? $settingTheme->data_two_column_color : 'light' }}" 
    data-layout-width="{{ isset($settingTheme) ? $settingTheme->data_layout_width : 'default' }}" 
    data-menu-color="{{ isset($settingTheme) ? $settingTheme->data_menu_color : 'light' }}" 
    data-menu-icon="{{ isset($settingTheme) ? $settingTheme->data_menu_icon : 'default' }}" 
    data-sidenav-size="{{ isset($settingTheme) ? $settingTheme->data_sidenav_size : 'condensed' }}" 
    data-sidenav-user="true">
  
    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}} - Painel Gerenciador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="author" content="WHI - Web de Alta Inspiração">
        <meta name="description" content="Painel gerenciador de conteúdo {{env('APP_NAME')}}">
        <meta name="copyright" content="© 2024 WHI - Web de Alta Inspiração." />
        <meta name="robots" content="none">
        <meta name="googlebot" content="noarchive">
        
        <link href="{{ asset('build/admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.body.classList.add('loaded');
            });
        </script>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('build/admin/images/logo-hoom.png') }}">

        <!-- Load da pagina -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('build/admin/js/load.js') }}"></script>

        <!-- plugin css -->
        <link rel="stylesheet" href="{{ asset('build/admin/js/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

        <!-- Bootstrap css -->
        <link href="{{ asset('build/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- App css -->
        <link href="{{ asset('build/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('build/admin/js/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('build/admin/js/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons css -->
        <link href="{{ asset('build/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('build/admin/js/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config Js -->
        <script src="{{ asset('build/admin/js/head.js') }}"></script>

        <script>
            $url = "{{url('')}}";
        </script>
    </head>

    <body class="loading">

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- ========== Menu ========== -->
            <div class="app-menu">  

                <!-- Brand Logo -->
                <div class="logo-box">
                    <!-- Brand Logo Light -->
                    <a href="{{route('admin.dashboard')}}" class="logo-light">
                        <img src="{{asset('build/admin/images/logo-light.png')}}" alt="logo" class="logo-lg">
                        <img src="{{asset('build/admin/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                    </a>

                    <!-- Brand Logo Dark -->
                    <a href="{{route('admin.dashboard')}}" class="logo-dark">
                        <img src="{{asset('build/admin/images/logo-dark.png')}}" alt="dark logo" class="logo-lg">
                        <img src="{{asset('build/admin/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                    </a>
                </div>

                <!-- menu-left -->
                <div class="scrollbar">

                    <!--- Menu -->
                    <ul class="menu">

                        <li class="menu-title">Listagem</li>

                        <li class="menu-item">
                            <a href="apps-calendar.html" class="menu-link">
                                <span class="menu-icon"><i data-feather="calendar"></i></span>
                                <span class="menu-text"> Usuário </span>
                            </a>
                        </li>

                    </ul>
                    <!--- End Menu -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left menu End ========== -->

            

            

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- ========== Topbar Start ========== -->
                <div class="navbar-custom">
                    <div class="topbar">
                        <div class="topbar-menu d-flex align-items-center gap-1">

                            <!-- Topbar Brand Logo -->
                            <div class="logo-box">
                                <!-- Brand Logo Light -->
                                <a href="{{route('admin.dashboard')}}" class="logo-light">
                                    <img src="{{asset('build/admin/images/logo-light.png')}}" alt="logo" class="logo-lg">
                                    <img src="{{asset('build/admin/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                                </a>

                                <!-- Brand Logo Dark -->
                                <a href="{{route('admin.dashboard')}}" class="logo-dark">
                                    <img src="{{asset('build/admin/images/logo-dark.png')}}" alt="dark logo" class="logo-lg">
                                    <img src="{{asset('build/admin/images/logo-sm.png')}}" alt="small logo" class="logo-sm">
                                </a>
                            </div>

                            <!-- Sidebar Menu Toggle Button -->
                            <button class="button-toggle-menu">
                                <i class="mdi mdi-menu"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="dropdown d-none d-xl-block">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    Create New
                                    <i class="mdi mdi-chevron-down ms-1"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="fe-briefcase me-1"></i>
                                        <span>New Projects</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="fe-user me-1"></i>
                                        <span>Create Users</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="fe-bar-chart-line- me-1"></i>
                                        <span>Revenue Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>Settings</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="fe-headphones me-1"></i>
                                        <span>Help & Support</span>
                                    </a>

                                </div>
                            </div>

                            <!-- Mega Menu Dropdown -->
                            <div class="dropdown dropdown-mega d-none d-xl-block">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    Mega Menu
                                    <i class="mdi mdi-chevron-down  ms-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-megamenu">
                                    <div class="row">
                                        <div class="col-sm-8">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="text-dark mt-0">UI Components</h5>
                                                    <ul class="list-unstyled megamenu-list">
                                                        <li>
                                                            <a href="widgets.html">Widgets</a>
                                                        </li>
                                                        <li>
                                                            <a href="extended-nestable.html">Nestable List</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Range Sliders</a>
                                                        </li>
                                                        <li>
                                                            <a href="pages-gallery.html">Masonry Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="extended-sweet-alert.html">Sweet Alerts</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Treeview Page</a>
                                                        </li>
                                                        <li>
                                                            <a href="extended-tour.html">Tour Page</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5 class="text-dark mt-0">Applications</h5>
                                                    <ul class="list-unstyled megamenu-list">
                                                        <li>
                                                            <a href="ecommerce-products.html">eCommerce Pages</a>
                                                        </li>
                                                        <li>
                                                            <a href="crm-dashboard.html">CRM Pages</a>
                                                        </li>
                                                        <li>
                                                            <a href="email-inbox.html">Email</a>
                                                        </li>
                                                        <li>
                                                            <a href="apps-calendar.html">Calendar</a>
                                                        </li>
                                                        <li>
                                                            <a href="contacts-list.html">Team Contacts</a>
                                                        </li>
                                                        <li>
                                                            <a href="task-kanban-board.html">Task Board</a>
                                                        </li>
                                                        <li>
                                                            <a href="email-templates.html">Email Templates</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5 class="text-dark mt-0">Extra Pages</h5>
                                                    <ul class="list-unstyled megamenu-list">
                                                        <li>
                                                            <a href="javascript:void(0);">Left Sidebar with User</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Menu Collapsed</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Small Left Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">New Header Style</a>
                                                        </li>
                                                        <li>
                                                            <a href="pages-search-results.html">Search Result</a>
                                                        </li>
                                                        <li>
                                                            <a href="pages-gallery.html">Gallery Pages</a>
                                                        </li>
                                                        <li>
                                                            <a href="pages-coming-soon.html">Maintenance & Coming Soon</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h3 class="text-dark">Special Discount Sale!</h3>
                                                <h4>Save up to 70% off.</h4>
                                                <a href="https://1.envato.market/uboldadmin" target="_blank" class="btn btn-primary rounded-pill mt-3">Download Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="topbar-menu d-flex align-items-center">
                            <!-- Topbar Search Form -->
                            <li class="app-search dropdown me-3 d-none d-lg-block">
                                <form>
                                    <input type="search" class="form-control rounded-pill" placeholder="Search..." id="top-search">
                                    <span class="fe-search search-icon font-16"></span>
                                </form>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="{{asset('build/admin/images/users/user-2.jpg')}}" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="{{asset('build/admin/images/users/user-5.jpg')}}" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <!-- Fullscreen Button -->
                            <li class="d-none d-md-inline-block">
                                <a class="nav-link waves-effect waves-light" href="" data-toggle="fullscreen">
                                    <i class="fe-maximize font-22"></i>
                                </a>
                            </li>

                            <!-- Search Dropdown (for Mobile/Tablet) -->
                            <li class="dropdown d-lg-none">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="ri-search-line font-22"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>

                            <!-- App Dropdown -->
                            <li class="dropdown d-none d-md-inline-block">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-grid font-22"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                    <div class="p-2">
                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/slack.png')}}" alt="slack">
                                                    <span>Slack</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/github.png')}}" alt="Github">
                                                    <span>GitHub</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/dribbble.png')}}" alt="dribbble">
                                                    <span>Dribbble</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/bitbucket.png')}}" alt="bitbucket">
                                                    <span>Bitbucket</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/dropbox.png')}}" alt="dropbox">
                                                    <span>Dropbox</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="{{asset('build/admin/images/brands/g-suite.png')}}" alt="G Suite">
                                                    <span>G Suite</span>
                                                </a>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </li>

                            <!-- Language flag dropdown  -->
                            <li class="dropdown d-none d-md-inline-block">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('build/admin/images/flags/us.jpg')}}" alt="user-image" class="me-0 me-sm-1" height="18">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{asset('build/admin/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-midle">German</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{asset('build/admin/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-midle">Italian</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{asset('build/admin/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-midle">Spanish</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <img src="{{asset('build/admin/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-midle">Russian</span>
                                    </a>

                                </div>
                            </li>

                            <!-- Notofication dropdown -->
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fe-bell font-22"></i>
                                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{ isset($auditCount) ? $auditCount : "0" }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 font-16 fw-semibold"> Notificações</h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript: void(0);" class="text-dark text-decoration-underline" id="clear-all-notifications">
                                                    <small>Limpar todas</small>
                                                </a>
                                            </div>                                                                                       
                                        </div>
                                    </div>

                                    <div class="px-1" style="max-height: 300px;" data-simplebar>

                                        @if (empty($auditorias))
                                            <h5 class="text-muted font-13 fw-normal mt-2">Hoje</h5>
                                            <!-- item-->
                                            @foreach ($auditorias as $auditoria)
                                                <div id="notificacao-{{ $auditoria->id }}" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-1">
                                                    <div class="card-body">
                                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close" onclick="marcarComoLida({{ $auditoria->id }})"></i></span>
                                                        <a href="{{route('admin.dashboard.audit.index')}}">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <div class="notify-icon bg-primary">
                                                                        <i class="mdi mdi-comment-account-outline"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 text-truncate ms-2">
                                                                    <h5 class="noti-item-title fw-semibold font-14">{{ isset($auditoria->causer->name)?$auditoria->causer->name:'Não encontrado' }} <small class="fw-normal text-muted ms-1">{{$auditoria->created_at->format("F j, Y, H:i:s")}}</small></h5>
                                                                    <small class="noti-item-subtitle text-muted">
                                                                        {{ 'Modificações foram feitas em ' . ($modelName = \App\Models\AuditActivity::getModelName($auditoria->subject_type)) . ' pelo usuário ' . ($auditoria->causer->name ?? 'Não encontrado') }}
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                        <h5 class="text-muted font-13 fw-normal mt-0">Ontem</h5>

                                        <!-- item-->
                                        <a href="" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-1">
                                            <div class="card-body">
                                                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <div class="notify-icon">
                                                            <img src="{{asset('build/admin/images/users/avatar-2.jpg')}}" class="img-fluid rounded-circle" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                        <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                        <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next meeting</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="text-center">
                                            <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                        </div>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                        View All
                                    </a>

                                </div>
                            </li>

                            <!-- Light/Dark Mode Toggle Button -->
                            <li class="d-none d-sm-inline-block">
                                <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                                    <form action="{{ route('admin.dashboard.settingThemeUpdate') }}" method="POST">
                                        @csrf
                                        <i class="ri-moon-line font-22"></i>
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                        <input type="hidden" name="data-bs-theme" value="{{ isset($settingTheme) ? $settingTheme->data_bs_theme : 'light' }}">
                                        <input type="hidden" name="data-layout-width" value="{{ isset($settingTheme) ? $settingTheme->data_layout_width : 'default' }}">
                                        <input type="hidden" name="data-layout-mode" value="{{ isset($settingTheme) ? $settingTheme->data_layout_mode : 'detached' }}">
                                        <input type="hidden" name="data-topbar-color" value="{{ isset($settingTheme) ? $settingTheme->data_topbar_color : 'light' }}">
                                        <input type="hidden" name="data-menu-color" value="{{ isset($settingTheme) ? $settingTheme->data_menu_color : 'light' }}">
                                        <input type="hidden" name="data-two-column-color" value="{{ isset($settingTheme) ? $settingTheme->data_two_column_color : 'light' }}">
                                        <input type="hidden" name="data-menu-icon" value="{{ isset($settingTheme) ? $settingTheme->data_menu_icon : 'default' }}">
                                        <input type="hidden" name="data-sidenav-size" value="{{ isset($settingTheme) ? $settingTheme->data_sidenav_size : 'condensed' }}">
                                    </form>
                                </div>
                            </li>

                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    {{-- <img src="{{asset('build/admin/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle"> --}}
                                    @if (Auth::user()->path_image)
                                        <img src="{{asset('storage/'.Auth::user()->path_image)}}" alt="user-image" class="rounded-circle">
                                        @else
                                        <img src="{{asset('build/admin/images/users/user-3.jpg')}}" alt="user-image" class="rounded-circle">
                                    @endif
                                    <span class="ms-1 d-none d-md-inline-block">
                                        {{$names = collect(explode(' ', Auth::user()->name))->slice(0, 2)->implode(' ')}} <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bem vindo!</h6>
                                    </div>                            
                                    
                                    @if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['usuario.visualizar', 'usuario.editar']))
                                        <!-- item-->
                                        <a href="{{route('admin.dashboard.user.edit', ['user' => $user->id])}}" class="dropdown-item notify-item">
                                            <i class="fe-user"></i>
                                            <span>Minha conta</span>
                                        </a>                                    
                                    @endif

                                    <!-- item-->
                                    <a href="#theme-settings-offcanvas" class="dropdown-item notify-item"  data-bs-toggle="offcanvas" >
                                        <i class="fe-settings"></i>
                                        <span>Configuração</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="{{route('admin.dashboard.user.logout')}}" class="dropdown-item notify-item">
                                        <i class="fe-log-out"></i>
                                        <span>Sair</span>
                                    </a>

                                </div>
                            </li>

                            <!-- Right Bar offcanvas button (Theme Customization Panel) -->
                            <li>
                                <a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                                    <i class="fe-settings font-22"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ========== Topbar End ========== -->

                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        @yield('content')                        

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div><script>document.write(new Date().getFullYear())</script> © Ubold - <a href="https://coderthemes.com/" target="_blank">Coderthemes.com</a></div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end footer-links">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end right-bar" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center w-100 p-0 offcanvas-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified w-100" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settingTheme" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="offcanvas-body p-3 h-100" data-simplebar>
                <!-- Tab panes -->
                <div class="tab-content pt-0">
                    <div class="tab-pane active" id="settingTheme" role="tabpanel">
                        <form action="{{route('admin.dashboard.settingTheme')}}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                            <div class="mt-n3">
                                <h6 class="fw-medium py-2 px-3 font-13 text-uppercase bg-light mx-n3 mt-n3 mb-3">
                                    <span class="d-block py-1">configuração do Tema</span>
                                </h6>
                            </div>

                            <div class="alert alert-warning" role="alert">
                                <strong>Personalize </strong> o esquema geral de cores, o menu da barra lateral, etc.
                            </div>

                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Esquema de cores</h5>

                            <div class="colorscheme-cardradio">
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" 
                                            {{ isset($settingTheme) && $settingTheme->data_bs_theme == 'light' ? 'checked' : '' }}
                                            id="layout-color-light" value="light">
                                        <label class="form-check-label" for="layout-color-light">Claro</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" 
                                            {{ isset($settingTheme) && $settingTheme->data_bs_theme == 'dark' ? 'checked' : '' }}
                                            id="layout-color-dark" value="dark">
                                        <label class="form-check-label" for="layout-color-dark">Escuro</label>
                                    </div>
                                </div>
                            </div>

                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Largura do conteúdo</h5>
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="data-layout-width" {{isset($settingTheme) && $settingTheme->data_layout_width=='default'?'checked':''}} id="layout-width-default" value="default">
                                    <label class="form-check-label" for="layout-width-default">Fluido (Padrão)</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="data-layout-width" {{isset($settingTheme) && $settingTheme->data_layout_width=='boxed'?'checked':''}} id="layout-width-boxed" value="boxed">
                                    <label class="form-check-label" for="layout-width-boxed">Encaixotado</label>
                                </div>
                            </div>

                            <div id="layout-mode">
                                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Modo de layout</h5>

                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-layout-mode" {{isset($settingTheme) && $settingTheme->data_layout_mode=='default'?'checked':''}} id="layout-mode-default" value="default">
                                        <label class="form-check-label" for="layout-mode-default">Padrão</label>
                                    </div>


                                    <div id="layout-detached">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="radio" name="data-layout-mode" {{isset($settingTheme) && $settingTheme->data_layout_mode=='detached'?'checked':''}} id="layout-mode-detached" value="detached">
                                            <label class="form-check-label" for="layout-mode-detached">Desanexado</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Cor da barra superior</h5>

                            <div class="d-flex flex-column gap-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" {{isset($settingTheme) && $settingTheme->data_topbar_color=='light'?'checked':''}} id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">Claro</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" {{isset($settingTheme) && $settingTheme->data_topbar_color=='dark'?'checked':''}} id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">Escuro</label>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="radio" name="data-topbar-color" {{isset($settingTheme) && $settingTheme->data_topbar_color=='brand'?'checked':''}} id="topbar-color-brand" value="brand">
                                    <label class="form-check-label" for="topbar-color-brand">Brand</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Cor do Menu</h5>

                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-color" {{isset($settingTheme) && $settingTheme->data_menu_color=='light'?'checked':''}} id="leftbar-color-light" value="light">
                                        <label class="form-check-label" for="leftbar-color-light">Claro</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-color" {{isset($settingTheme) && $settingTheme->data_menu_color=='dark'?'checked':''}} id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label" for="leftbar-color-dark">Escuro</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-color" {{isset($settingTheme) && $settingTheme->data_menu_color=='brand'?'checked':''}} id="leftbar-color-brand" value="brand">
                                        <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-color" {{isset($settingTheme) && $settingTheme->data_menu_color=='gradient'?'checked':''}} id="leftbar-color-gradient" value="gradient">
                                        <label class="form-check-label" for="leftbar-color-gradient">Gradiente</label>
                                    </div>
                                </div>
                            </div>

                            <div id="menu-icon-color">
                                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Cor do ícone do menu</h5>

                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-two-column-color" {{isset($settingTheme) && $settingTheme->data_two_column_color=='light'?'checked':''}} id="twocolumn-menu-color-light" value="light">
                                        <label class="form-check-label" for="twocolumn-menu-color-light">Claro</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-two-column-color" {{isset($settingTheme) && $settingTheme->data_two_column_color=='dark'?'checked':''}} id="twocolumn-menu-color-dark" value="dark">
                                        <label class="form-check-label" for="twocolumn-menu-color-dark">Escuro</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-two-column-color" {{isset($settingTheme) && $settingTheme->data_two_column_color=='brand'?'checked':''}} id="twocolumn-menu-color-brand" value="brand">
                                        <label class="form-check-label" for="twocolumn-menu-color-brand">Brand</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-two-column-color" {{isset($settingTheme) && $settingTheme->data_two_column_color=='gradient'?'checked':''}} id="twocolumn-menu-color-gradient" value="gradient">
                                        <label class="form-check-label" for="twocolumn-menu-color-gradient">Gradiente</label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Tom do ícone do menu</h5>

                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-icon" {{isset($settingTheme) && $settingTheme->data_menu_icon=='default'?'checked':''}} id="menu-icon-default" value="default">
                                        <label class="form-check-label" for="menu-icon-default">Padrão</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-menu-icon" {{isset($settingTheme) && $settingTheme->data_menu_icon=='twotones'?'checked':''}} id="menu-icon-twotone" value="twotones">
                                        <label class="form-check-label" for="menu-icon-twotone">Dois tons</label>
                                    </div>
                                </div>
                            </div>

                            <div id="sidebar-size">
                                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Tamanho da barra lateral</h5>

                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" {{isset($settingTheme) && $settingTheme->data_sidenav_size=='default'?'checked':''}} id="leftbar-size-default" value="default">
                                        <label class="form-check-label" for="leftbar-size-default">Padrão</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" {{isset($settingTheme) && $settingTheme->data_sidenav_size=='compact'?'checked':''}} id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label" for="leftbar-size-compact">Compacto (largura média)</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" {{isset($settingTheme) && $settingTheme->data_sidenav_size=='condensed'?'checked':''}} id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label" for="leftbar-size-small">Condensado (Visualização de Ícone)</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" {{isset($settingTheme) && $settingTheme->data_sidenav_size=='full'?'checked':''}} id="leftbar-size-full" value="full">
                                        <label class="form-check-label" for="leftbar-size-full">Layout completo</label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="radio" name="data-sidenav-size" {{isset($settingTheme) && $settingTheme->data_sidenav_size=='fullscreen'?'checked':''}} id="leftbar-size-fullscreen" value="fullscreen">
                                        <label class="form-check-label" for="leftbar-size-fullscreen">Layout de tela cheia</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{ asset('build/admin/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('build/admin/js/app.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('build/admin/js/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/jquery.sortable.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/dropzone/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/libs/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ asset('build/admin/js/pages/form-fileuploads.init.js') }}"></script>
        <script src="{{ asset('build/admin/js/main.js') }}"></script>

        <!-- Dashboard 2 init -->
        <script src="{{ asset('build/admin/js/pages/dashboard-2.init.js') }}"></script>

        <div class="modal fade" id="lockScreenModal" tabindex="-1" aria-labelledby="lockScreenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lockScreenModalLabel">Tela Bloqueada</h5>
                    </div>
                    <div class="modal-body">
                        <p>Para desbloquear, insira sua senha:</p>
                        <input type="password" id="unlockPassword" class="form-control" placeholder="Senha">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="unlockButton" class="btn btn-primary">Desbloquear</button>
                    </div>
                </div>
            </div>
        </div>
        

        {{-- Modais alert --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let successMessage = '{{ session('success') }}';
                if (successMessage) {
                    setTimeout(function() {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                title: 'Sucesso',
                                text: successMessage,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                timer: 1800, // O alerta desaparecerá automaticamente após 1,5 segundos
                                showConfirmButton: false // Oculta o botão para fechar automaticamente
                            });
                        }
                    }, 1300); // Exibe o alert 1,3 segundos após a página carregar
                }
            });
        </script>
        

        @if(Session::has('error'))
            <div id="errorMessage" class="alert alert-warning notification-message" >
                <span class="mdi mdi-alert-circle"></span>
                {{ Session::get('error') }}
            </div>
        @endif

        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let errors = '';
                    @foreach ($errors->all() as $error)
                        errors += '{{ $error }}\n'; 
                    @endforeach
            
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Erros de Validação',
                            text: errors,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }, 1300);
                });
            </script>        
        @endif

        <script>
            var userThemeSettings = {
                data_bs_theme: "{{ isset($settingTheme)?$settingTheme->data_bs_theme: 'dark' }}",
                data_layout_width: "{{ isset($settingTheme)?$settingTheme->data_layout_width: 'default' }}",
                data_layout_mode: "{{ isset($settingTheme)?$settingTheme->data_layout_mode: 'detached' }}",
                data_topbar_color: "{{ isset($settingTheme)?$settingTheme->data_topbar_color: 'light' }}",
                data_menu_color: "{{ isset($settingTheme)?$settingTheme->data_menu_color: 'light' }}",
                data_two_column_color: "{{ isset($settingTheme)?$settingTheme->data_two_column_color: 'light' }}",
                data_menu_icon: "{{ isset($settingTheme)?$settingTheme->data_menu_icon: 'default' }}",
                data_sidenav_size: "{{ isset($settingTheme)?$settingTheme->data_sidenav_size: 'condensed' }}"
            };
        </script>

        <style>
            .locked-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.6);
                z-index: 1050; /* Acima da interface normal */
                display: none;
            }

        </style>
        <script>
            document.getElementById("lockScreenButton").addEventListener("click", function() {
                document.getElementById("lockScreenModal").style.display = 'block';
                document.querySelector(".locked-overlay").style.display = 'block';
            });

            document.getElementById("unlockButton").addEventListener("click", function() {
                const password = document.getElementById("unlockPassword").value;

                fetch('/verify-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ password: password })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("lockScreenModal").style.display = 'none';
                        document.querySelector(".locked-overlay").style.display = 'none';
                    } else {
                        alert("Senha incorreta!");
                    }
                });
            });

        </script>
    </body>
</html>