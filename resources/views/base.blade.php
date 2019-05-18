<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="_token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="\css\mdb.min.css">
    <link rel="stylesheet" href="\css\app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <title>FacturacioGym</title>
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
              <a class="nav-link" href=" {{route('clients.index')}} ">Clients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=" {{route('cuotes.index')}} ">Cuotes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{route('cuotes.index')}} ">Remeses</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
              
          </ul>
          @if(!auth()->check())
          <span class="navbar-text" style="padding-right:3%">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLoginForm">Accedir</a>
          </span>

          @else
          <ul class="navbar-nav ml-auto mr-5" style="padding-right:3%">

                @if(empty(auth()->user()->password))
                  <img src="{{auth()->user()->avatar}}" class="avatar" width="30" height="30" alt="">
                @else
                  <img src="storage/{{auth()->user()->avatar}}" class="avatar" width="30" height="30" alt="">
                @endif
                <li class="nav-item dropdown ">
                
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Sortir</a>
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
                          <label for="email" >Correu Electrònic</label>
                        </div>
      
                        <div class="md-form mb-4">
                          <i class="fas fa-lock prefix grey-text"></i>
                          <input name="password" type="password" id="password" class="form-control validate" style="color:black;margin-left:9%">
                          <label for="password" >Contrasenya</label>
                        </div>
      
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-default" id="login">Accedir</button>
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
    
    <hr>
    <p>Copyright &copy 2019 </p>    
    
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="\js\app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript" src="\js\mdb.min.js"></script>
    
    
    @yield('javascript')


    
    
    
</body>
</html>