<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Bravo's | @yield('title')</title>
      <!-- Datepicket CSS -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}"/>
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
      <!-- Favicon -->	
      <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
      <!-- simple-line-icons CSS -->
      <link type="text/css" rel="stylesheet" href="{{asset('assets/plugins/simple-line-icons/css/simple-line-icons.css')}}">
      <!-- sweetalert2 -->
      <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.css')}}">
      @stack('css')
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.html">		
               <img class="desktop-logo" src="{{asset('assets/images/logo.png')}}" alt="">
               <img class="small-logo" src="{{asset('assets/images/small-logo.png')}}" alt="">
               </a>			
               <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
            </div>
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
           @include('layouts.menu')
            <!--/ Sidebar Menu End -->
            <!--================================-->
            <!-- Sidebar Footer Start -->
            <!--================================-->
            <div class="sidebar-footer">									
               
               <a class="pull-left" href="{{ URL::to('logout') }}" data-toggle="tooltip" data-placement="top" data-original-title="Cerrar sesión">
               <i data-feather="log-out" class="wd-16"></i></a>
            </div>
            <!--/ Sidebar Footer End -->
         </div>
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">               
               <nav class="navbar navbar-default">
                  <!--================================-->
                  <!-- Brand and Logo Start -->
                  <!--================================-->
                  <div class="navbar-header">
                     <div class="navbar-brand">
                        <ul class="list-inline">
                           <!-- Mobile Toggle and Logo -->
                           <li class="list-inline-item"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                           <!-- PC Toggle and Logo -->
                           <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>                           
                        </ul>
                     </div>
                  </div>
                  <!--/ Brand and Logo End -->
                  <!--================================-->
                  <!-- Header Right Start -->
                  <!--================================-->
                  <div class="header-right pull-right">
                     <ul class="list-inline justify-content-end">     
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown">
                           <a  href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="{{asset('assets/images/users-face/1.png')}}" class="img-fluid wd-30 ht-30 rounded-circle" alt="">
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                              <div class="user-profile-area">
                                 <div class="user-profile-heading">
                                    <div class="profile-thumbnail">
                                       <img src="{{asset('assets/images/users-face/1.png')}}" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                    </div>
                                    <div class="profile-text">
                                       <h6>{{$user->name}}</h6>
                                       <span>email@example.com</span>
                                    </div>
                                 </div>
                                 <a href="" class="dropdown-item"><i data-feather="user" class="wd-16 mr-2"></i> My profile</a>
                                 <a href="" class="dropdown-item"><i data-feather="message-square" class="wd-16 mr-2"></i> Messages</a>
                                 <a href="" class="dropdown-item"><i data-feather="settings" class="wd-16 mr-2"></i> Settings</a>
                                 <a href="" class="dropdown-item"><i data-feather="activity" class="wd-16 mr-2"></i> My Activity</a>
                                 <a href="" class="dropdown-item"><i data-feather="download" class="wd-16 mr-2"></i> My Download</a>
                                 <a href="" class="dropdown-item"><i data-feather="life-buoy" class="wd-16 mr-2"></i> Support</a>
                                 <a href="{{ URL::to('logout') }}" class="dropdown-item"><i data-feather="power" class="wd-16 mr-2"></i> Cerrar sesión</a>
                              </div>
                           </div>
                        </li>
                        <!-- Profile Dropdown End -->
                     </ul>
                  </div>
                  <!--/ Header Right End -->
               </nav>
            </div>
            <!--/ Page Header End -->   
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
                <div class="wrapper">

                    <!--================================-->
                    <!-- Breadcrumb Start -->
                    <!--================================-->
                    <div class="pageheader pd-t-25 pd-b-35">
                    <div class="d-flex justify-content-between">
                        <div class="clearfix">
                            <div class="pd-t-5 pd-b-5">
                                <h1 class="pd-0 mg-0 tx-20 tx-dark">@yield('seccion')</h1>
                            </div>
                            <div class="breadcrumb pd-0 mg-0">
                                <a class="breadcrumb-item" href="{{route('home')}}"><i class="icon ion-ios-home-outline"></i>HOME</a>
                                <!-- <a class="breadcrumb-item" href="">Dashboard</a>
                                <span class="breadcrumb-item active">Project Management</span>-->
                                @section('bread')
                                
                                @show
                            </div>
                        </div>                 
                    </div>
                    </div>
                    <!--/ Breadcrumb End -->
                    @section('contenido')
    
    
                    @show
                    <!--/ Page Inner End -->

                </div>


            
            <!--================================-->
            <!-- Page Footer Start -->	
            <!--================================-->
            <footer class="page-footer">
               <div class="pd-t-4 pd-b-0 pd-x-20">
                  <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">
                     <p class="pd-y-10 mb-0">Bravo's Company Copyright&copy; {{date('Y')}}</p>
                  </div>
               </div>
            </footer>
            <!--/ Page Footer End -->		
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
      <!-- Template Customizer Start-->
      <!--================================-->		  
      <div class="avesta-settings">
         <a id="avestaSettingsShow" href="" class="avesta-settings-link"><i data-feather="settings" class="wd-20"></i></a>
         <div class="avesta-settings-body">
            <div class="pd-y-20">
               <img src="assets/images/logo-dark.png" class="d-block" alt="">
               <span class="tx-10 tx-uppercase tx-spacing-1">Template Customizer</span>
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Skin Mode</label>
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">			
                     <span class="avesta-demo-customizer-name tx-spacing-1">Default Skin</span>
                     <a href="" class="avesta-mode avesta-mode-default active" data-title="default-skin"></a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Light Skin</span>
                     <a href="" class="avesta-mode avesta-mode-light" data-title="light-skin">
                     <span class="demo-color-palet-1"></span>
                     <span class="demo-color-palet-2"></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name tx-spacing-1">Cool Skin</span>
                     <a href="" class="avesta-mode avesta-mode-cool" data-title="cool-skin">
                     <span class="bg-primary"></span>
                     <span class="bg-primary"></span>
                     </a>
                  </div>
                  <!-- row -->
               </div>
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Navigation Skin</label>
               <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Default</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-default active" data-title="default">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Light</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-light" data-title="light">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Blue Purple</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-bluepurple" data-title="bluepurple">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
                  <div class="col-12 d-flex justify-content-between">
                     <span class="avesta-demo-customizer-name">Gradient</span>
                     <a href="" class="avesta-demo-customizer avesta-demo-customizer-gradient" data-title="gradient">
                     <span></span>
                     <span></span>
                     </a>
                  </div>
               </div>
               <!-- row -->
            </div>
            <div class="pd-y-20 bd-t">
               <label class="tx-10 tx-uppercase tx-bold tx-spacing-1 mg-b-15">Font Family Mode</label>
               <div class="row font-customize">
                  <div class="col-12">
                     <a href="" id="setFontBase" class="active-font">IBM Plex Sans</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontRoboto">Roboto</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontPoppins">Poppins</a>
                  </div>
                  <!-- col -->
                  <div class="col-12">
                     <a href="" id="setFontOpenSans">Open Sans</a>
                  </div>
                  <!-- col -->
               </div>
               <!-- row -->
            </div>
         </div>
         <!-- avesta-settings-body -->
      </div>
      <!--/ Template Customizer End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.js')}}"></script>
      <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
      <script src="{{asset('assets/plugins/popper/popper.js')}}"></script>
      <script src="{{asset('assets/plugins/feather/feather.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/plugins/typeahead/typeahead.js')}}"></script>
      <script src="{{asset('assets/plugins/typeahead/typeahead-active.js')}}"></script>
      <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
      <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
      <script src="{{asset('assets/plugins/highlight/highlight.min.js')}}"></script>
      <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.js')}}"></script>
    
      <!-- Required Script -->
      <script src="{{asset('assets/js/app.js')}}"></script>
      <script src="{{asset('assets/js/avesta.js')}}"></script>
      <script src="{{asset('assets/js/avesta-customizer.js')}}"></script>
      <!-- Javascript -->
      @stack('js')
      <!-- / Javascript -->
   </body>
</html>