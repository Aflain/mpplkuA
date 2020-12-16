<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SIMARSIP ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/highdamin/light/assets/images/favicon.ico">
        <!-- App css -->
        @include('includes.admin-dark.dark-activation-css')

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">
			@include('layouts.components.adm-left-sidebar')
          

            <div class="content-page">
                 <!-- Topbar Start -->
                 <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                       <!-- Account dropdown -->
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                    {{Auth::guard('admin')->user()->nama}} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a href="{{route('admin-logout')}}" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Keluar</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- Breadcrumb left -->
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title-main">SIMARSIP</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">ADMIN</li>
                            </ol>
                        </li>
                    </ul>
                </div>
                    
                
                     <!-- Content Start Here -->
                		<div class="content">
                  			  	<div class="container-fluid">
                      				  @yield('content')
                   				</div>
              			  </div>

        <!-- JS -->
        @include('includes.admin-dark.dark-activation-js')
        
    </body>
</html>