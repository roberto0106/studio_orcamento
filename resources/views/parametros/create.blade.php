@extends('layouts.app')

@section('content')

<blockquote>
    <h5>Novo Parametro</h5>
 </blockquote>


<div class="row">
    {!! Form::open(['route'=>'parametros.store'],['class'=>"col s12"]) !!}
        <div class="row">
            <div class= "col s12">
                {!! Form::label('cobertura_id', 'Cobertura') !!}
                {!! Form::select('cobertura_id', $coberturas, ['null'=>'Escolha a cobertura']) !!}
            </div>
            
            <div class= "col s12">
            {!! Form::label('produto_id', 'Produto') !!}
            {!! Form::select('produto_id', ['0'=>'Selecione o Produtos'], ['0'=>'Selecione o Produtos'], ['id'=>'produto_id']) !!}
        </div>

            <div class= "col s12">
            {!! Form::label('qtd_formandos_minima', 'Quantidade de Formandos Mínima') !!}
            {!! Form::number('qtd_formandos_minima', '') !!}
            </div>

            <div class= "col s12">
            {!! Form::label('qtd_formandos_maxima', 'Quantidade de Formandos Máxima') !!}
            {!! Form::number('qtd_formandos_maxima', '') !!}
            </div>

            <div class= "col s12">
            {!! Form::label('qtd_produtos', 'Quantidade do Produto') !!}
            {!! Form::number('qtd_produtos', '') !!}
            </div>
            {!! Form::submit('Gravar',['class'=>'waves-effect waves-light btn']) !!}

        </div>
    {!! Form::close() !!}    
</div>        
            
@endsection

@section('scripts')
<script type="text/javascript">
    
    $(function () {
        $('select').formSelect();
        getProdutos();
        
    });

    $(document).on('change','#cobertura_id', function(){
        getProdutos();         
    });

    function getProdutos() {
        var cobertura = $('#cobertura_id').val();
        var url = "{{ url('/getproduto') }}" + '/' + cobertura;
        var opt = "";
        
        $('#produto_id').empty();

        $.get(url, {'cobertura':cobertura},function (data) { 
            $.each(data, function (indexInArray, valueOfElement) { 
                $('#produto_id').append("<option value='"+indexInArray+"'>"+valueOfElement+"</option>");
                $('select').formSelect();
            });              
        });
        
    }
    
</script>
@endsection
            