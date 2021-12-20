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
      <title>Login | Bravo's</title>
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
      <!-- Favicon -->	
      <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
   </head>
   <body>
      <!--================================-->
      <!-- Page Content Start -->
      <!--================================-->
      <div class="ht-100v text-center">
         <div class="row pd-0 mg-0">
            <div class="col-lg-6 bg-gradient hidden-sm">
               <div class="ht-100v d-flex">
                  <div class="align-self-center">
                     <img src="{{asset('assets/images/logo-sm.png')}}" class="img-fluid" alt="">
                     <h3 class="tx-20 tx-semibold tx-gray-100 pd-t-50">TAXIS BRAVO'S</h3>
                     <p class="pd-y-15 pd-x-10 pd-md-x-100 tx-gray-200">Plataforma de administración del sistema.</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 bg-light">
               <div class="ht-100v d-flex align-items-center justify-content-center">
                  <div class="">
                     <h3 class="tx-dark mg-b-5 tx-center">Iniciar sesión</h3>
                     @if(\Session::has('error'))
                     <div class="alert alert-warning" role="alert">
                        {!! Session::get('error') !!}
                     </div>
                     @elseif(\Session::has('status'))
                     <div class="alert alert-primary" role="alert">
                        {!! Session::get('status') !!}
                     </div>
                     @else 
                     <p class="tx-gray-500 tx-15 mg-b-40">¡Bienvenido! Ingrese sus accesos.</p>
                     @endif 
                     <form method="POST"  action="{{route('loguear')}}">
                        @csrf
                        <div class="form-group tx-left">
                           <label class="tx-gray-500 mg-b-5">Usuario</label>
                           <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                           <div class="d-flex justify-content-between mg-b-5">
                              <label class="tx-gray-500 mg-b-0">Contraseña</label>
                           </div>
                           <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="remember" name="remember" value="true">
                              <label class="form-check-label" for="invalidCheck">
                              Mantener sesión activa
                              </label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-brand btn-block">Ingresar</button>  
                     </form>                  
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Page Content End -->
      <!-- jQuery  -->
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/plugins/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset('assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
      <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>	  
      <!-- App JS -->
      <script src="{{asset('assets/js/app.js')}}"></script>
   </body>
</html>