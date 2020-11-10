@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        
        <blockquote>
            <h4>Cadastro de Novo Cliente</h4>
        </blockquote>

        <br>
        <br>
        
        
        <div class="row">
            {!! Form::open(['route' => 'clientes.store']) !!}
            
            <div class="input-field col s6">
                {!! Form::label('instituicao', 'Instituição',['class'=>'active']) !!}
                {!! Form::select('instituicao', $instituicoes, ['Selecione a Instituição']) !!}
            </div>
            
            <div class="input-field col s6">
                {!! Form::label('curso', 'Curso',['class'=>'active']) !!}
                {!! Form::select('curso', ['0'=>'Selecione o Curso'], ['0'=>'Selecione o Curso'], ['id'=>'curso']) !!}
            </div>
        </div>  

        {!! Form::label('nome', 'Nomenclatura') !!}
        {!! Form::text('nome', '') !!}

        <div class="row">
            <div class="input-field col s6">
                {!! Form::label('representante', 'Representante',['class'=>'active']) !!}
                {!! Form::text('representante', '', ['class'=>'active']) !!}
            </div>
            <div class="input-field col s6">
                {!! Form::label('telefone', 'Telefone',['class'=>'active']) !!}
                {!! Form::text('telefone', '', ['class'=>'']) !!}
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                {!! Form::label('ano_conclusao', 'Ano da Conclusão',['class'=>'active']) !!}
                {!! Form::number('ano_conclusao', '', ['class'=>'']) !!}
            </div>
            <div class="input-field col s6">
                {!! Form::label('data_formatura', 'Data da Formatura',['class'=>'active']) !!}
                {!! Form::date('data_formatura', '', ['class'=>'validate','placeholder' => '']) !!}
            </div>
        </div> 
        <div class="input-field col s12">
            {!! Form::submit('gravar', ['class'=>'btn']) !!}
        </div>
        
        
        {!! Form::close() !!}
        
        
        
    </div> 
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        M.updateTextFields();
        $('select').formSelect();
    });
    
    $(document).on('change','#instituicao', function(){
        getCursos();         
    });
    
    function getCursos() {
        var inst = $('#instituicao').val();
        var url = "{{ url('/getcurso') }}" + '/' + inst;
        var opt = "";
        
        $('#curso').empty();
        
        $.get(url, {'instituicao':inst},function (data) { 
            $.each(data, function (indexInArray, valueOfElement) { 
                $('#curso').append("<option value='"+indexInArray+"'>"+valueOfElement+"</option>");
                $('select').formSelect();
            });              
        });
        
    }
    
</script>
@endsection
