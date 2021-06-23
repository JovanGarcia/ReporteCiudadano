<!doctype html>
<html lang="en">
<?php



?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Ciudadano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="../main.css" rel="stylesheet"></head>
<body>
<div id="app">
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header bg-light header-shadow header-text-dark">
            <div class="app-header__logo">
                <div style="margin: 25%;"><img src="../logovic.png"  width="90px"></div>                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    
                    <ul class="header-menu nav">
                        
                       <!-- <li class="btn-group nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"></i>
                                Realizar Reporte
                            </a>
                        </li>-->
                        
                    </ul>        </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="../assets/images/avatars/1.jpg" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <h6 tabindex="-1" class="dropdown-header">Cuenta</h6>
                                            
                                            <button type="button" tabindex="0" class="dropdown-item">Cerrar Sesion</button>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                    {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}  
                                        
                                    </div>
                                    <div class="widget-subheading">
                                        
                                    {{ Auth::user()->categoria }}
                                    </div>
                                    
                                </div>
                                <div class="col-md-2"><img src="../logotam.png" width="90px"></div>
                                
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>                
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">INCIO</li>
                                <li>
                                    
                                    <a href="{{ url('/dashboard')}}" class="">
                                    <i class="metismenu-icon pe-7s-graph2"></i>
                                        Dashboard
                                    </a>
                                   
                                    
                                </li>
                                <?php

                                    if(Auth::user()->categoria == "Administrador"){
                                        
                                    
                                ?>
                                <li class="app-sidebar__heading">Administrador</li>
                                <li>
                                    
                                    <a href="{{ url('/usuarios')}}" class="">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Ver lista de usuarios
                                    </a>
                                    <a href="{{ url('/usuarios/create')}}" class="">
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Crear usuarios
                                    </a>
                                    
                                </li>
                                <?php
                                    }
                                    
                                ?>
                                <?php

                                    if(Auth::user()->categoria == "Director" || Auth::user()->categoria == "Administrador"){
    

                                ?>
                                <li class="app-sidebar__heading">Directores</li>
                                <li>
                                    <a href="{{ url('/reportes')}}">
                                        <i class="metismenu-icon pe-7s-mail-open-file"></i>
                                        Reportes
                                    </a>           
                                </li>
                                <?php
                                    }
                                ?>
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        
                        @yield('contenido')
                                

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="loader-wrapper">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
<script src="{{ asset('/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="../assets/scripts/main.js"></script>

<script>
    $(window).on("load",function(){
        setTimeout(activar, 1000);
        //Activar función
        function activar() {
            $('[data-toggle="tooltip"]').tooltip();
            $(".loader-wrapper").fadeOut();
        }
    });
</script>

</body>
</html>
