<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- FAVICON -->
    <link href="{{ asset('assets/images/favicon.png') }}" rel="shortcut icon" />
    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>


    {{-- <div id="toaster"></div> --}}


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">IQA</span>
                    </a>
                </div>
               
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">

                           

                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">IQA Dashboard</span>
                            </a>
                        </li>
                        @foreach ($addCources as $name => $cource)
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('notes', $name) }}">
                                    @if ($name == 'laravel')
                                        <i class="mdi mdi-laravel text-light"></i>
                                    @elseif($name == 'html')
                                        <i class="mdi mdi-language-html5 text-light"></i>
                                    @elseif($name == 'react Js')
                                        <i class="mdi mdi-react text-light"></i>
                                    @elseif($name == 'css')
                                        <i class="mdi mdi-language-css3 text-light"></i>
                                    @elseif($name == 'php')
                                        <i class="mdi mdi-language-php text-light"></i>
                                    @elseif($name == 'java')
                                        <i class="mdi mdi-language-java text-light"></i>
                                    @elseif($name == 'java Script')
                                        <i class="mdi mdi-language-javascript text-light"></i>
                                    @endif
                                    <span class="nav-text">{{ ucfirst($name) }} <span
                                            class="badge badge-primary badge-pill">{{ count($cource) }}</span></span>
                                    <b class="caret"></b>
                                </a>
                            </li>
                        @endforeach

                    </ul>

                </div>


            </div>
        </aside>



        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                   @php
                       $heading = request()->segment(2);
                   @endphp
                  <span class="page-title">{{$heading ?? 'Dashboard'}}</span>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('assets/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{ url('user/profile') }}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-link-item" href="sign-in.html"> <i
                                                    class="mdi mdi-logout"></i> <span class="mr-5">Log Out</span>
                                            </button>
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a
                            class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>

        </div>
    </div>

    <!-- Card Offcanvas -->
    <div class="card card-offcanvas" id="contact-off">
        <div class="card-header">
            <h2>Contacts</h2>
            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
        </div>
        <div class="card-body">

            <div class="mb-4">
                <input type="text" class="form-control form-control-lg form-control-light rounded-0"
                    placeholder="Search contacts...">
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-01.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span class="discribe">Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-02.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Walter Reuter</span>
                        <span>Developer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-03.jpg') }}" alt="User Image">
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Larissa Gebhardt</span>
                        <span>Cyber Punk</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-04.jpg') }}" alt="User Image">
                    </a>

                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Albrecht Straub</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-05.jpg') }}" alt="User Image">
                        <span class="active bg-danger"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Leopold Ebert</span>
                        <span>Fashion Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="{{ asset('assets/images/user/user-sm-06.jpg') }}" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

        </div>
    </div>




    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>



    <script src="{{ asset('assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>



    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>



    <script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



    <script src="{{ asset('assets/plugins/toaster/toastr.min.js') }}"></script>



    <script src="{{ asset('assets/js/mono.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/map.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>




    <!--  -->


</body>

</html>
