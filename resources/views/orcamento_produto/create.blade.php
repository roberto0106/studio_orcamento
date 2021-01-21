@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        @foreach ($dados_orcamento as $item)
        <div class="card">
            <div class="card-image">
                <img src="">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p>Cliente: {{$item->cliente->nome}}</p>
                    <p>Instituição: {{$item->cliente->instituicao->nome}}</p>
                    <p>Localização: {{$item->cliente->instituicao->cidade}} / {{$item->cliente->instituicao->estado}}</p>
                    <p>Curso: {{$item->cliente->curso->nome}}</p>
                    <p>Contato: {{$item->cliente->curso->contato}}</p>
                    <p>Telefone: {{$item->cliente->curso->telefone}}</p>
                    <p>Representante: {{$item->cliente->representante}}</p>
                </div>
                <div class="card-action">
                    <a href="#">Editar informações do cliente</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col">

        @foreach ($dados_orcamento as $item)
        <div class="card">
            <div class="card-image">
                <img src="">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p>#Id do Orçamento:{{$item->id}}</p>
                    <p>#Id do Cliente{{$item->cliente_id}}</p>
                    <p>Data do Evento:{{$item->data_evento}}</p>
                    <p>Quatidade de Formandos:{{$item->qtd_formandos}}</p>
                    <p>Cidade:{{$item->cidade}}</p>
                    <p>Consultor:{{$item->consultor}}</p>
                    <p>Supervisor:{{$item->supervisor}}</p>
                </div>
                <div class="card-action">
                    <a href="#">Editar informações do cliente</a>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
  
       


<style>
    .mostrar{
        display: block;
    }
    
    .fechar{
        display: none;
    }
    
</style>



<div class="row">
    <div class="col s4">
        <blockquote>
            <h5>Coberturas</h5>
        </blockquote>
        
        <div style="height: 500px; overflow-y: scroll;">
            @foreach ($coberturas as $item)
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s4">
                        {!! Form::label('coberturas', $item->nome) !!}        
                    </div>
                    <div class="input-field col s4">
                        {!! Form::number('formandos_pagantes', '', ['id'=>$item->id,'class'=>'validate']) !!}
                        {!! Form::label('formandos_pagantes', 'Formandos Pagantes') !!}
                    </div>
                    <div class="input-field col s4">
                        <a class="btn-floating btn-large waves-effect waves-light green add" id="add_{{$item->id}}" onclick="show_options({{$item->id}})"><i class="material-icons">add</i></a>
                        <a class="btn-floating btn-large waves-effect waves-light red remove" id="remove_{{$item->id}}"><i class="material-icons">delete</i></a>
                        <a class="btn-floating btn-large waves-effect waves-light blue check" id="check_{{$item->id}}"><i class="material-icons">check</i></a>
                    </div>    
                </div>
                
            </form>
            @endforeach
        </div>        
    </div>
    
    <div class="col s4">
        <blockquote>
            <h5>Coberturas Inseridas</h5>
        </blockquote>
        <ul class="collapsible popout" id="produtos_inseridos">
            
        </ul>
        <hr>
        <h4>Total: R$ 1000,00</h4>
    </div>
    <div class="col s4">
        <blockquote>
            <h5>Distribuição das Despesas</h5>
        </blockquote>
        <canvas id="myChart"></canvas>
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
    
    function grafico(valor){
        var data = {
            datasets: [{
                data: [valor],
                // backgroundColor: ["#0074D9", "#FF4136", "#2ECC40"]
            }],
            
            // These labels appear in the legend and in the tooltips when hovering different arcs
            // labels: [
            //     'Red',
            //     'Yellow',
            //     'Blue'
            // ]
        };
        
        var ctx = document.getElementById('myChart').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            
            // options: options
        });
        
    }
    
    
    
    
    $(document).ready(function () {
        $('.check').hide();
        $('.remove').hide();
    });
    
    $(function () {
        $('select').formSelect();   
    });
    
    $('#carregar_produtos').click(function (e) { 
        e.preventDefault();
        refresh();
        
    });
    
    
    function show_options(id){
        $('#remove_'+id).show();
        $('#add_'+id).hide();
        $('#check_'+id).show();
        addCoberturas(id);
    }
    
    
    
    function addCoberturas(id){
        
        
        var qtd_formandos = $('#'+id).val();
        var url = "{{ url('/inserir_cobertura') }}" + '/' + id + '/' + qtd_formandos;
        
        $.get(url, {
            'cobertura':id,
            'formandos':qtd_formandos
        },function (data) {
            console.log(data);
            
            
            cobertura_id = data.cobertura[0].id;
            cobertura = data.cobertura[0].nome;
            grafico(data.total_cobertura);
            
            $('#produtos_inseridos').append(
            '<li>'+
                '<div class="collapsible-header"><i class="material-icons">filter_drama</i>'+
                    cobertura+' <span class="badge">Total R$: '+data.total_cobertura+'</span>'+
                    '</div>'+
                    '<div class="collapsible-body">'+
                        '<table class="produtos">'+
                            '<thead>'+
                                ' <tr>'+
                                    '<th>Produto</th>'+
                                    '<th>Qtd</th>'+
                                    '<th>Preço</th>'+
                                    '<th>Total</th>'+
                                    '<th>Ações</th>'+
                                    '</tr>'+
                                    ' </thead>'+
                                    '<tbody id="corpo_tabela_'+cobertura_id+'">');
                                        
                                        
                                        $.each(data.produtos, function (indexInArray, valueOfElement) { 
                                            
                                            $('#corpo_tabela_'+cobertura_id).append(
                                            ' <tr>'+
                                                '<td>'+valueOfElement.nome+'</td>'+
                                                '<td>'+valueOfElement.quantidade+'</td>'+
                                                '<td>'+valueOfElement.preco_venda+'</td>'+
                                                '<td>'+valueOfElement.valor_total+'</td>'+
                                                '<td><a class="btn-floating btn-large waves-effect waves-light red" id=""><i class="material-icons">delete</i></a></td>'+
                                                '</tr>'
                                                );  
                                            }); 
                                            
                                            $('#produtos_inseridos').append(
                                            '</tbody>'+
                                            '</table>'+     
                                            '</div>'+
                                            '</li>'
                                            );
                                            
                                        });
                                        
                                    }
                                    
                                </script>
                                @endsection
                                