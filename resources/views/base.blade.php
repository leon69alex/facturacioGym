<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="\css\mdb.min.css">
    <link rel="stylesheet" href="\css\app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    @yield('css')
    
    <title>Gimnas Palace</title>
</head>
<body>

    


    <?php function activeMenu($url){
      return request()->is($url) ? 'active' : '';
      } 
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{route('home')}}">Gimnàs Palace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href=" {{route('home')}} ">Inici <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/instalacions">Instal·lacions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=" {{route('cuotes.index')}} ">Cuotes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{route('cuotes.index')}} ">Remeses</a>
            </li>
            @if(auth()->check() && auth()->user()->hasRoles(['admin', 'mod']))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Facturacio
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href=" {{route('clients.index')}} ">Clients</a>
                  <a class="dropdown-item" href=" {{route('cuotes.index')}} ">Cuotes</a>
                  <a class="dropdown-item" href="/remeses">Remeses</a>
                </div>
              </li>
            @endif
          </ul>
          @if(!auth()->check())
          <span class="navbar-text" style="padding-right:3%">
            <button class="btn btn-success login">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">Accedir</a>
            </button>
            
          </span>

          @else
          <ul class="navbar-nav ml-auto mr-5" style="padding-right:3%">

                @if(empty(auth()->user()->password))
                  <img src="{{auth()->user()->avatar}}" class="avatar" width="30" height="30" alt="">
                @else
                  <img src="/storage/{{auth()->user()->avatar}}" class="avatar" width="30" height="30" alt="">
                @endif
                <li class="nav-item dropdown ">
                
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href=" /users/profile/{{ auth()->id() }}">Perfil</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">
                          <button type="submit" class="btn btn-danger logout">
                              <i class="fas fa-sign-out-alt"></i>
                              Sortir
                          </button>
                        </a>
                      </div>              
                </li>
          </ul>
          @endif

          <!--MODAL LOGIN-->
          <form method="POST" action="login">
              {!! csrf_field() !!}
              <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                  <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Iniciar sessió</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                          <i class="fas fa-envelope prefix grey-text"></i>
                          <input name="email" type="email" id="Email" class="form-control validate" style="color:black;margin-left:9%">
                          <label for="email" style="font-weight: bold">Correu Electrònic</label>
                        </div>      
                        <div class="md-form mb-4">
                          <i class="fas fa-lock prefix grey-text"></i>
                          <input name="password" type="password" id="password" class="form-control validate" style="color:black;margin-left:9%">
                          <label for="password" style="font-weight: bold">Contrasenya</label>
                        </div>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success" id="login">Accedir</button>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <a href="#" href="#" data-toggle="modal" data-target="#modalRegisterForm">
                            <button type="button" class="btn btn-success" id="register">Registra't</button>
                        </a> 
                      </div>
                      <div class="modal-footer d-flex justify-content-around">
                        <a href="login/google">
                          <button type="button" class="google-button">
                            <span class="google-button__icon">
                              <svg viewBox="0 0 366 372" xmlns="http://www.w3.org/2000/svg"><path d="M125.9 10.2c40.2-13.9 85.3-13.6 125.3 1.1 22.2 8.2 42.5 21 59.9 37.1-5.8 6.3-12.1 12.2-18.1 18.3l-34.2 34.2c-11.3-10.8-25.1-19-40.1-23.6-17.6-5.3-36.6-6.1-54.6-2.2-21 4.5-40.5 15.5-55.6 30.9-12.2 12.3-21.4 27.5-27 43.9-20.3-15.8-40.6-31.5-61-47.3 21.5-43 60.1-76.9 105.4-92.4z" id="Shape" fill="#EA4335"/><path d="M20.6 102.4c20.3 15.8 40.6 31.5 61 47.3-8 23.3-8 49.2 0 72.4-20.3 15.8-40.6 31.6-60.9 47.3C1.9 232.7-3.8 189.6 4.4 149.2c3.3-16.2 8.7-32 16.2-46.8z" id="Shape" fill="#FBBC05"/><path d="M361.7 151.1c5.8 32.7 4.5 66.8-4.7 98.8-8.5 29.3-24.6 56.5-47.1 77.2l-59.1-45.9c19.5-13.1 33.3-34.3 37.2-57.5H186.6c.1-24.2.1-48.4.1-72.6h175z" id="Shape" fill="#4285F4"/><path d="M81.4 222.2c7.8 22.9 22.8 43.2 42.6 57.1 12.4 8.7 26.6 14.9 41.4 17.9 14.6 3 29.7 2.6 44.4.1 14.6-2.6 28.7-7.9 41-16.2l59.1 45.9c-21.3 19.7-48 33.1-76.2 39.6-31.2 7.1-64.2 7.3-95.2-1-24.6-6.5-47.7-18.2-67.6-34.1-20.9-16.6-38.3-38-50.4-62 20.3-15.7 40.6-31.5 60.9-47.3z" fill="#34A853"/></svg>
                            </span>
                            <span class="google-button__text">Entra amb Google</span>
                        </button>
                      </a>
                      <a href="login/github" class="sb sb-github">Entra amb Github</a>
                      </div>
                    </div>
                  </div>
                </div>
          </form>
          <!--END MODAL LOGIN FORM-->

          <!--MODAL REGISTER FORM-->
          <form method="POST" action="register">
            {!! csrf_field() !!}
            <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog" role="document" >
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Registre d'usuari</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-male prefix grey-text"></i>
                            <input name="name" type="text" id="name" class="form-control validate" style="color:black;margin-left:9%">
                            <label for="email" style="font-weight: bold">Nom</label>
                          </div>
                      <div class="md-form mb-5">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <input name="email" type="email" id="Email" class="form-control validate" style="color:black;margin-left:9%">
                        <label for="email" style="font-weight: bold">Correu Electrònic</label>
                      </div>      
                      <div class="md-form mb-4">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <input name="password" type="password" id="password" class="form-control validate" style="color:black;margin-left:9%">
                        <label for="password" style="font-weight: bold">Contrasenya</label>
                      </div>
                      <div class="md-form mb-4">
                          <i class="fas fa-check-circle prefix grey-text"></i>
                          <input name="password_confirmation" type="password" id="confirm-password" class="form-control validate" style="color:black;margin-left:9%">
                          <label for="confirm-password" style="font-weight: bold">Confirmar Contrasenya</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="submit" class="btn btn-success" id="register">Registrar-me</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
        <!--END MODAL LOGIN FORM-->

        </div>
    </nav>

    @if(session()->has('errors'))
    <div class="alert alert-danger alert-dismissible ">{{ $errors->first('email') }}{{ $errors->first('password') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif











    <div class="container-fluid">
        @yield('contingut')
    </div>
    

    <br>
    <br>
    <!-- Footer -->
<footer class="page-footer font-small unique-color-dark fixed">

  <div style="background-color: #6351ce;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Connecteu-vos amb nosaltres a les xarxes socials!</h6>
        </div>
        <!-- Grid column -->









        
        






        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

            <a href="https://www.facebook.com/pages/Gimnas-Palace/518792458522274?ref=br_rs" class="c-link c-link--facebook c-tooltip" aria-label="Facebook">
                <svg class="c-icon"><use xlink:href="#icon--facebook"></use></svg>
            </a>
            
            <a href="https://twitter.com/" class="c-link c-link--twitter c-tooltip" aria-label="Twitter">
                <svg class="c-icon"><use xlink:href="#icon--twitter"></use></svg>
            </a>
            
            <a href="https://www.instagram.com/" class="c-link c-link--instagram c-tooltip" aria-label="Instagram">
                <svg class="c-icon"><use xlink:href="#icon--instagram"></use></svg>
            </a>
            
            <svg style="display: none">
                <symbol id="icon--facebook" viewBox="0 0 24 24">
                    <path d="M19,4V7H17A1,1 0 0,0 16,8V10H19V13H16V20H13V13H11V10H13V7.5C13,5.56 14.57,4 16.5,4M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
                </symbol>
                <symbol id="icon--twitter" viewBox="0 0 24 24">
                    <path d="M17.71,9.33C17.64,13.95 14.69,17.11 10.28,17.31C8.46,17.39 7.15,16.81 6,16.08C7.34,16.29 9,15.76 9.9,15C8.58,14.86 7.81,14.19 7.44,13.12C7.82,13.18 8.22,13.16 8.58,13.09C7.39,12.69 6.54,11.95 6.5,10.41C6.83,10.57 7.18,10.71 7.64,10.74C6.75,10.23 6.1,8.38 6.85,7.16C8.17,8.61 9.76,9.79 12.37,9.95C11.71,7.15 15.42,5.63 16.97,7.5C17.63,7.38 18.16,7.14 18.68,6.86C18.47,7.5 18.06,7.97 17.56,8.33C18.1,8.26 18.59,8.13 19,7.92C18.75,8.45 18.19,8.93 17.71,9.33M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
                </symbol>
                <symbol id="icon--instagram" viewBox="0 0 24 24">
                    <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                </symbol>
            </svg>


        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Gimnàs Palace</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>El teu gimnàs de referència al centre de Figueres!</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">MDBootstrap</a>
        </p>
        <p>
          <a href="#!">MDWordPress</a>
        </p>
        <p>
          <a href="#!">BrandFlow</a>
        </p>
        <p>
          <a href="#!">Bootstrap Angular</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#!">Your Account</a>
        </p>
        <p>
          <a href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a href="#!">Shipping Rates</a>
        </p>
        <p>
          <a href="#!">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contactan's</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> C/ Oliva, 10. 17762 Figueres</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@gimnaspalace.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i>972524552</p>
        <p>
          <i class="fas fa-print mr-3"></i>972525555</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© {{date("Y")}} Copyright:
    <a href="http://facturaciogym.com"> www.GimnasPalace.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->    
<script type="text/javascript">
  $(document).ready(function(){
    
    $('#register').on('click', function(){
      $('#modalLoginForm').modal('hide');
    });

    
  });
</script>

    
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript" src="\js\mdb.min.js"></script>
    
    
    @yield('javascript')    
    @include('cookieConsent::index')
</body>
</html>