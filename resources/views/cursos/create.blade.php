@extends('layouts.app')

@section('content')

<blockquote>
    <h5>Novo curso</h5>
</blockquote>

{!! Form::open(['route' => 'cursos.store']) !!}

{!! Form::label('instituicao', 'Instituição',['class'=>'active']) !!}
{!! Form::select('instituicao_id', $instituicoes, ['Selecione a Instituição']) !!}

{!! Form::label('nome', 'Nome',['class'=>'active']) !!}
{!! Form::text('nome', '', ['class'=>'active']) !!}

{!! Form::label('contato', 'Contato',['class'=>'active']) !!}
{!! Form::text('contato', '', ['class'=>'active']) !!}

{!! Form::label('telefone', 'Telefone',['class'=>'active']) !!}
{!! Form::text('telefone', '', ['class'=>'']) !!}

{!! Form::submit('gravar', ['class'=>'btn']) !!}

{!! Form::close() !!}

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        M.updateTextFields();
        $('select').formSelect();
    });
    
    
</script>
@endsection
