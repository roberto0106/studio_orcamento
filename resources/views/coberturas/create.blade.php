@extends('layouts.app')

@section('content')

<blockquote>
    <h5>Nova Cobertura</h5>
 </blockquote>
    
{!! Form::open(['route'=>'coberturas.store']) !!}
{!! Form::label('nome', 'Nome') !!}
{!! Form::text('nome', '') !!}
{!! Form::submit('gravar',['class'=>'btn']) !!}
{!! Form::close() !!}
@endsection

@section('scripts')
<script type="text/javascript">

</script>
@endsection
