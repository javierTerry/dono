<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Laravel base -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <!-- Favicon -->
        <link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }} - Plataforma de envios</title>

        <!-- js -->
        <script src="{{ asset('js/chart.js-3.9.1/package/dist/chart.js') }}" ></script>


        <!-- Bootstrap css-->
        <link href="{{ url('spruha/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/ type="text/css">

        <!-- Icons css-->
        <link href="{{ url('spruha/plugins/web-fonts/icons.css') }}"  rel="stylesheet"/>
        <link href="{{ url('spruha/plugins/web-fonts/font-awesome/font-awesome.min.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/plugins/web-fonts/plugin.css') }}"  rel="stylesheet"/>

        <!-- Style css-->
        <link href="{{ url('spruha/css/style.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/css/skins.css') }}"  rel="stylesheet">
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ url('spruha/css/colors/color6.css') }}">
       
        <!-- Select2 css-->
        <link href="{{ url('spruha/plugins/select2/css/select2.min.css') }}"  rel="stylesheet">

        <!-- Mutipleselect css-->
        <link rel="stylesheet" href="{{ url('spruha/plugins/multipleselect/multiple-select.css') }}">

        <!-- Sidemenu css-->
        <link href="{{ url('spruha/css/sidemenu/sidemenu.css') }}"  rel="stylesheet">
        
        <!-- Internal DataTables css-->
        <link href="{{ url('spruha/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ url('spruha/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />
        <link href="{{ url('spruha/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet" />

        <link href="{{ url('spruha/plugins/sweet-alert/sweetalert.css') }}" rel="stylesheet" />

        @yield('css_rol_page')

    </head>


    <body class="main-body leftmenu main-sidebar-hide">
        <!-- Page -->
        <div class="page">
            <!-- Sidemenu -->
            <div class="main-sidebar main-sidebar-sticky side-menu">

                <div class="sidemenu-logo">
                    <a class="main-logo" href="{{ route('dashboard') }}">
                        <img src="{{ url('spruha/img/brand/xpertaLogoTrans-110x91-2.png') }}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{ url('spruha/img/brand/xperta-50x56-removebg-preview.png') }}" class="header-brand-img icon-logo" alt="logo">
                        <img src="{{ url('spruha/img/brand/ulalaBco.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                        <img src="{{ url('spruha/img/brand/ulalaBco.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
                    </a>
                </div>

                <div class="main-sidebar-body">
                    <ul class="nav">
                        <li class="nav-header"><span class="nav-label"><br></span></li>
                        <li class="nav-header"><span class="nav-label">MENU</span></li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('dashboard') }}"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">DASHBOARD</span></a>
                        </li>
                        @canany(['isSysAdmin'])  
                         {{--   @include('menu.configuracion') 
                            @include('menu.cliente')  --}}
                         {{--    @include('menu.envio')  --}}
                              
                            @include('menu.roles')  
                        @endcanany

                        @canany(['isSysAdmin','isAdmin'])
                            @include('menu.empresas')
                            @include('menu.direcciones')
                            @include('menu.ltd')
                        @endcanany

                        @canany(['isSysAdmin','isAdmin','isEjecutivo'])
                            
                           
                        @endcanany

                        @canany(['isSysAdmin','isAdmin','isEjecutivo','isCliente'])
                            @include('menu.usuario')
                            
                        @endcanany

                        @canany(['isSysAdmin','isAdmin','isEjecutivo','isCliente','isUsuario'])
                            @include('menu.guia')
                        @endcanany
                      
                        
                    </ul>
                </div>
            </div>
            <!-- End Sidemenu -->

            <!-- Main Header-->
            <div class="main-header side-header sticky">

                <div class="container-fluid">
                    <div class="main-header-left">
                        <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                    </div>
                    <div class="main-header-center">
                        test
                    </div>
                    <div class="main-header-right">
                        @include('perfil.index')
                        <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                        </button><!-- Navresponsive closed -->
                    </div>
                </div>
            </div>
            <!--End  Main Header-->

            <!-- Mobile-header -->
            <div class="mobile-main-header">
                <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        @include('perfil.index')
                        
                    </div>
                </div>
            </div>
            <!-- End Mobile-header -->

            <!-- Main Content-->
            <div class="main-content side-content pt-0">
                <div class="container-fluid">
                    @include('mensaje.error')
                    @include('mensaje.danger')
                    @include('mensaje.exitoso')
                    <div class="inner-body">
                        <!-- Page Content -->
                        @yield('content')
                        <!-- End Page Content -->     
                    </div>
                </div>
            </div>
            <!-- End Main Content-->

            <!-- Main Footer-->
            <div class="main-footer text-center" >
                <div class="container">
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <span>Copyright © 2022 <a href="https://www.xpertamexico.com/">XPERTAMEXICO</a>. Designed by <a href="#">TED</a> All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer-->
        </div>
        


        <!-- Jquery js-->
        <script src="{{ url('spruha/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ url('spruha/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Internal Chart.Bundle js-->
        <script src="{{ url('spruha/plugins/chart.js/Chart.bundle.min.js') }}"></script>

        <!-- Peity js-->
        <script src="{{ url('spruha/plugins/peity/jquery.peity.min.js') }}"></script>

        <!-- Perfect-scrollbar js -->
        <script src="{{ url('spruha/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

        <!-- Sidemenu js -->
        <script src="{{ url('spruha/plugins/sidemenu/sidemenu.js') }}"></script>

        <!-- Sidebar js -->
        <script src="{{ url('spruha/plugins/sidebar/sidebar.js') }}"></script>

        <!-- Internal HandleCounter js -->
        <script src="{{ url('spruha/js/handleCounter.js') }}"></script>

        <!-- Select2 js-->
        <script src="{{ url('spruha/plugins/select2/js/select2.min.js') }}"></script>

        <!-- Sticky js -->
        <script src="{{ url('spruha/js/sticky.js') }}"></script>

        <!-- Custom js -->
        <script src="{{ url('spruha/js/custom.js') }}"></script>

        <!-- Internal Parsley js-->
        <script src="{{ url('spruha/plugins/parsleyjs/parsley.min.js') }}"></script>
        
        <!-- Internal Data Table js -->
        <script src="{{ url('spruha/plugins/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/jszip.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
        <script src="{{ url('spruha/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
        <script src="{{ url('spruha/js/table-data.js') }}"></script>

        <script src="{{url('spruha/plugins/darggable/jquery-ui-darggable.min.js') }}"></script>
        <script src="{{url('spruha/plugins/darggable/darggable.js') }}"></script>
        <script src="{{url('spruha/plugins/sweet-alert/sweetalert.min.js') }}"></script>
        
        <!-- Personalizacion -->
        <script src="{{ asset('js/guardar.js') }}" ></script> 
        <script src="{{ asset('js/tipoEnvio.js') }}" ></script>
        <script src="{{ asset('js/submitModal.js') }}" ></script>
        <script src="{{ asset('js/guia.multipieza.js') }}" ></script>
        <script src="{{ asset('js/preSubmit.js') }}" ></script>
        <script src="{{ asset('js/cotizar.js') }}" ></script>
        <script src="{{ asset('js/empresa.js') }}" ></script>
        <!-- Personalizacion de validicon con parley -->
        <script src="{{ asset('js/form-validation.js') }}" ></script>


{{--INTEGRACION DE ROLES Y USUARIOS--}} 
@yield('js_user_page')
@yield('js_rol_page')

        
    </body>
</html>