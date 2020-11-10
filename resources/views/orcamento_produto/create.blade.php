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



{!! Form::select('coberturas[]', $coberturas, ['Escolha a Cobertura'], ['multiple','id'=>'coberturas_array']) !!}

{!! Form::submit('Carregar Produtos', ['class'=>'btn','id'=>'carregar_produtos']) !!}



<blockquote>
    <h5>Produtos</h5>
</blockquote>


<table class="highlight">
    <thead>
        <tr>
            <th data-field="id">Cobertura</th>
            <th data-field="name">Produto</th>
            <th data-field="price">Quantidade</th>
            <th data-field="price">Valor Unitario</th>
            <th data-field="price">Total</th>
            <th data-field="price">Ações</th>
        </tr>
    </thead>
    <tbody>


    </tbody>
</table>



@endsection

@section('scripts')
<script type="text/javascript">
    
    $(function () {
        $('select').formSelect();   
    });

    $('#carregar_produtos').click(function (e) { 
        e.preventDefault();
        refresh();
        
    });

    function refresh() {
        var coberturas_array = $('#coberturas_array').val();
        var url = "{{ url('/refresh_produtos') }}" + '/' + coberturas_array;
        var opt = "";
        
        $('#curso').empty();

        $.get(url, {'coberturas_array':coberturas_array},function (data) { 
            $.each(data, function (indexInArray, valueOfElement) { 
               alert(data);
            });              
        });
        
    }
    
</script>
@endsection
