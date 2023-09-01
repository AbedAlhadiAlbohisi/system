<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{App::isLocale('en') ? 'en' : 'ar' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{(__('cms.app_name'))}} | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('cms/plugins/toastr/toastr.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('cms/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('cms/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('cms/plugins/summernote/summernote-bs4.min.css')}}">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                {{-- </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('cities.index')}}" class="nav-link">{{(__('cms.indexcity'))}}</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('users.index')}}" class="nav-link">{{(__('cms.indexuser'))}}</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admins.index')}}" class="nav-link">{{(__('cms.adminindex'))}}</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('cms/dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('cms/dist/img/user8-128x128.jpg')}}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{asset('cms/dist/img/user3-128x128.jpg')}}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li> --}}

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">{{auth()->user()->unreadNotifications()->count()}}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">Total users = {{auth()->user()->notifications()->count()}}</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>New user {{auth()->user()->unreadNotifications()->count()}}
                            <span class="float-right text-muted text-sm">New user={{auth()->user()->unreadNotifications()->count()}}
                            </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> {{$notification->data['title']}}
                            <span class="float-right text-muted text-sm"> {{
                                $notification->created_at->diffForHumans()}}.</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach


                        <div class="dropdown-divider"></div>
                        <a href="{{route('user.notification')}}" class="dropdown-item dropdown-footer">See All
                            Notifications</a>
                    </div>
                </li>





                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"></span>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                         <a  class="dropdown-item"  rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach

                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
           <a href="{{route('cms.dashpard')}}" class="brand-link">
            <img src="{{asset('cms/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">{{__('cms.dashbord')}}</span>
        </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img  src="{{Storage::url(auth()->user()->image)}}" class="img-circle elevation-2"
                              alt="{{storage::url(auth()->user()->image)}}">
                    </div>
                    <div class="info">
                        <a class="d-block">{{auth()->user()->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @canany(['Read-Roles', 'Create-Role', 'Read-Permissions','Create-Permission'])
                        <li class="nav-header">{{__('cms.roleandpermissions')}}</li>

                        @canany(['Read-Roles', 'Create-Role'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{__('cms.roles')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">

                                @can('Read-Roles')
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.indexroles'))}}</p>
                                    </a>
                                </li>
                                @endcan

                                @can('Create-Role')
                                <li class="nav-item">
                                    <a href="{{route('roles.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.createroles'))}}</p>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                        @endcanany
                        @canany([ 'Read-Permissions','Create-Permission'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.permissions'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Permissions')
                                <li class="nav-item">
                                    <a href="{{route('permissions.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.indexpermiss'))}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-Permission')
                                <li class="nav-item">
                                    <a href="{{route('permissions.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.CeratePermis'))}}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                        @endcanany




                        @canany(['Read-Users', 'Create-User', 'Read-admins','Create-admin'])
                        <li class="nav-header">{{(__('cms.user egistration'))}}</li>
                        @canany(['Read-Users', 'Create-User'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.users'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">

                                @can('Read-Users')
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.indexuserss'))}}</p>
                                    </a>
                                </li>
                                @endcan


                                @can('Create-User')
                                <li class="nav-item">
                                    <a href="{{route('users.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.creatuser'))}}</p>
                                    </a>
                                </li>
                                @endcan



                            </ul>
                        </li>
                        @endcanany
                        @endcan




                        @canany(['Read-admins', 'Create-admin'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <p>
                                        {{(__('cms.admin'))}}
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">

                                    @can('Read-admins')
                                    <li class="nav-item">
                                        <a href="{{route('admins.index')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('cms.indecadmin')}}</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('Create-admin')
                                    <li class="nav-item">
                                        <a href="{{route('admins.create')}}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{__('cms.createadmin')}}</p>
                                        </a>
                                    </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanany

                        @canany(['Read-cities', 'Create-city','Read-Notes', 'Create-Note','Read-categories', 'Create-category
                        ','Read-subcategories', 'Create-subcategory'])
                        <li class="nav-header">{{(__('cms.content_mangement'))}}</li>
                        @canany(['Read-cities', 'Create-city'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.case registration'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-cities')
                                <li class="nav-item">
                                    <a href="{{route('cities.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.indexcity'))}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-city')
                                <li class="nav-item">
                                    <a href="{{route('cities.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.create'))}}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan


                        @canany(['Read-Sikes', 'Create-Sike'])
                        <li class="nav-header">{{(__('cms.Case_Registration'))}}</li>
                        @canany(['Read-Sikes', 'Create-Sike'])
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.sick'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">

                                @can('Read-Sikes')
                                <li class="nav-item">
                                    <a href="{{route('sick.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('cms.indexsick')}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-Sike')
                                <li class="nav-item">
                                    <a href="{{route('sick.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{__('cms.createsick')}}</p>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </li>
                        @endcanany
                        @endcan







                        @canany(['Read-categories', 'Create-category'])
                        <li class="nav-item">`
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.category'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-categories')
                                <li class="nav-item">
                                    <a href="{{route('category.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.categoryd'))}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-category')
                                <li class="nav-item">
                                    <a href="{{route('category.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.categorys'))}}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                       @endcanany


                        @canany(['Read-subcategories', 'Create-subcategory'])
                        <li class="nav-item">`
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.subcategory'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-subcategories')
                                <li class="nav-item">
                                    <a href="{{route('sub-categories.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.subcategoryd'))}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-subcategory')
                                <li class="nav-item">
                                    <a href="{{route('sub-categories.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.subcategorys'))}}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        @canany(['Read-Notes', 'Create-Note'])
                        <li class="nav-item">`
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    {{(__('cms.not'))}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                @can('Read-Notes')
                                <li class="nav-item">
                                    <a href="{{route('notes.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.noti'))}}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Create-Note')
                                <li class="nav-item">
                                    <a href="{{route('notes.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{(__('cms.notc'))}}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>

                        @endcanany
                        @endcanany


                        <li class="nav-header">{{(__('cms.seting'))}}</li>
                        <li class="nav-item">
                            <a href="{{route('edit-password')}}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">{{__('cms.edit-password')}}</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">{{__('cms.logout')}}</p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page_name')</h1>
                        </div><!-- col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- <li class="breadcrumb-item"><a href="{{route('cities.create')}}">@yield('main_name')</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('users.create')}}">@yield('small_page_name')</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('admins.create')}}">@yield('small_page_admin')</a></li> --}}
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @yield('main-content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>{{(__('cms.seting'))}}</h5>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">{{__('cms.logout')}}</p>
                    </a>
                </li>


            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline"><a
                href="{{route('cms.dashpard')}}"> {{__('cms.test')}}</a>
                          </div>
            <!-- Default to the left -->
            <strong>HOSPIAL &copy; 2022-2023 <a
                    href="https://www.google.com/search?tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=APq-WBvwajCBvwkig_kiIhLHNUUi4M7hfQ:1646854121267&q=%D9%85%D8%B3%D8%AA%D8%B4%D9%81%D9%8A%D8%A7%D8%AA+%D9%82%D8%B7%D8%A7%D8%B9+%D8%BA%D8%B2%D8%A9&rflfq=1&num=10&sa=X&ved=2ahUKEwjX8pPX4bn2AhWEiP0HHTunAfQQjGp6BAgEEAE&biw=1242&bih=577&dpr=1.1#rlfi=hd:;si:;mv:[[32.47694525700123,36.75431002822163],[28.4731477431933,27.723673702743074],null,[30.495639250493028,32.238991865482355],7]://adminlte.io">Gaza
                    Strip Hospitals</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('cms/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('cms/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
    <script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->

    @yield('script')
</body>

</html>
