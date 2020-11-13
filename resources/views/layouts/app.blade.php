<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Studio Oficial</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css">
    
    
</head>
<body>
    <div id="app">
        
        <div class="col">  
                        
                <nav>
                    <div class="nav-wrapper blue">
                        <a href="#!" class="brand-logo">Studio Orçamento</a>
                        <a href="#" data-target="mobile-demo" class="sidenav-trigger blue-text"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span></a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                        </ul>
                    </div>
                </nav>
                
                
            </div>

            <div class="row">
            <div class="col s3">
                <!-- Grey navigation panel -->
                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Configurações</div>
                      <div class="collapsible-body">
                          <a href="{{route('coberturas.index')}}">Coberturas</a><br>
                          <a href="{{route('produtos.index')}}">Produtos</a><br>
                          <a href="{{route('parametros.index')}}">Parametros</a><br>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header"><i class="material-icons">place</i>Orçamentos</div>
                      <div class="collapsible-body">
                          
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header"><i class="material-icons">whatshot</i>Relatórios</div>
                      <div class="collapsible-body">
                          
                      </div>
                    </li>
                  </ul>
            </div>
        
            <div class="col s9">
            <!-- Teal page content  -->
            
                    @yield('content')
   
            </div>
            </div>


            
        </div>
        
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        
        
        
        @yield('scripts')
        
        <script>
            
            $(document).ready(function(){
                $(".dropdown-trigger").dropdown();
                $('.collapsible').collapsible();
                
            });
        </script>
        
        
    </body>
    </html>
    