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
        <!-- Dropdown Structure -->
        <ul id="clientes" class="dropdown-content">
            <li><a href="{{route('coberturas.index')}}">Coberturas</a></li>
            <li><a href="{{route('produtos.index')}}">Produtos</a></li>
            <li><a href="{{route('parametros.index')}}">Parametros</a></li>
            <li class="divider"></li>
            <li><a href="{{route('clientes.index')}}">Clientes</a></li>
            <li><a href="{{route('instituicoes.index')}}">Instituicões</a></li>
            <li><a href="{{route('cursos.index')}}">Cursos</a></li>
        </ul>
        <ul id="orcamentos" class="dropdown-content">
            <li><a href="{{route('orcamentos.create')}}">Criar</a></li>
            <li><a href="{{route('orcamentos.index')}}">Consultar</a></li>
            <li class="divider"></li>
            <li><a href="#">three</a></li>
        </ul>
       
        <nav>
            <div class="nav-wrapper white">
                <a href="#!" class="brand-logo center black-text">
                    Studio Orçamento
                </a>
                <ul class="right hide-on-med-and-down">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger black-text" href="#!" data-target="clientes">Configurações<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger black-text" href="#!" data-target="orcamentos">Orçamentos<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a class="dropdown-trigger black-text" href="#!" data-target="coberturas">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
        </div>

        <div class="container">
            @yield('content')
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    
    
    
    @yield('scripts')
    
    <script>
        
        $(document).ready(function(){
            $(".dropdown-trigger").dropdown();

        });
    </script>
    
    
</body>
</html>
