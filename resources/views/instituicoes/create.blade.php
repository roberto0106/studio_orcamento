@extends('layouts.app')

@section('content')

<blockquote>
   <h5>Nova Instituição</h5>
</blockquote>

{!! Form::open(['route'=>'instituicoes.store']) !!}

{!! Form::label('nome', 'Nome',['class'=>'active']) !!}
{!! Form::text('nome', '', ['class'=>'active']) !!}

{!! Form::label('cidade', 'Cidade',['class'=>'active']) !!}
{!! Form::text('cidade', '', ['class'=>'active']) !!}

{!! Form::label('estado', 'Estado',['class'=>'active']) !!}
{!! Form::text('estado', '', ['class'=>'']) !!}

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
