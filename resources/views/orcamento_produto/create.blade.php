@extends('layouts.app')

@section('content')

<blockquote>
    <h5>Dados do Cliente</h5>
</blockquote>

@foreach ($dados_orcamento as $item)
{{$item->cliente}}
@endforeach

<blockquote>
    <h5>Dados do Orcamento</h5>
</blockquote>

@foreach ($dados_orcamento as $item)
{{$item->cliente}}
@endforeach

<blockquote>
    <h5>Coberturas</h5>
</blockquote>

<style>
.mostrar{
    display: block;
}

.fechar{
    display: none;
}

</style>




<div class="row">

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



<blockquote>
    <h5>Coberturas Inseridas</h5>
</blockquote>

<div id="produtos_inseridos">
    
</div>


<ul class="collapsible popout" id="produtos_inseridos">

</ul>



@endsection

@section('scripts')
<script type="text/javascript">
    
    
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

                $('#produtos_inseridos').append(
                        '<li>'+
                        '<div class="collapsible-header"><i class="material-icons">filter_drama</i>'+
                            data.cobertura+
                        '</div>'+
                        '<div class="collapsible-body">'+
                            '<table class="produtos">'+
                            '<thead>'+
                               ' <tr>'+
                                   ' <th>Cobertura</th>'+
                                    '<th>Produto</th>'+
                                    '<th>Quantidade</th>'+
                                    '<th>Valor Unitario</th>'+
                                    '<th>Total</th>'+
                                    '<th>Ações</th>'+
                                '</tr>'+
                           ' </thead>'+
                        '<tbody id="corpo_tabela">');


                $.each(data.produtos, function (indexInArray, valueOfElement) { 

                    $('#corpo_tabela').append(
                        ' <tr>'+
                            ' <td>'+valueOfElement.cobertura+'</td>'+
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
