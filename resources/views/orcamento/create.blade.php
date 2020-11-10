@extends('layouts.app')

@section('content')
    
{!! Form::open(['route'=>'orcamentos.store']) !!}

<div class="col s12">
{!! Form::label('cliente_id', 'Cliente') !!}
{!! Form::select('cliente_id', $clientes, ['null'=>'Selecione o Cliente']) !!}


<div class="col s12">
{!! Form::label('data_evento', 'Data do Evento',['class'=>'active']) !!}
{!! Form::date('data_evento', '',['class'=>'active validate']) !!}
</div>

<div class="input-field col s12">
{!! Form::label('qtd_formandos', 'Quantidade de Formandos') !!}
{!! Form::number('qtd_formandos', '') !!}
</div>

<div class="input-field col s12">
{!! Form::label('cidade', 'Cidade') !!}
{!! Form::text('cidade', '') !!}
</div>

<div class="input-field col s12">
{!! Form::label('consultor', 'Consultor') !!}
{!! Form::text('consultor','') !!}
</div>

<div class="input-field col s12">
{!! Form::label('supervisor', 'Supervisor') !!}
{!! Form::text('supervisor', '') !!}
</div>

<div class="input-field col s12">
{!! Form::submit('Gravar', ['class'=>'btn']) !!}
{!! Form::close() !!}
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        M.updateTextFields();
        $('select').formSelect();
    });
</script>
@endsection
