@extends('layouts.app')

@section('content')

<blockquote>
    <h5>Novo Produto</h5>
 </blockquote>

{!! Form::open(['route'=>'produtos.store']) !!}

<div class="col s12">
    {!! Form::label('cobertura_id', 'Cobertura') !!}
    {!! Form::select('cobertura_id',  \App\Cobertura::getCoberturas(), ['Selecione a Cobertura']) !!}
</div>

<div class="input-field col s12">
    {!! Form::label('nome', 'Nome do Produto') !!}
    {!! Form::text('nome', '') !!}
</div>

<div class="input-field col s12">
    {!! Form::label('preco_custo', 'Preco de custo do Produto') !!}
    {!! Form::number('preco_custo', '') !!}
</div>

<div class="input-field col s12">
    {!! Form::label('preco_venda', 'Preco de venda do Produto') !!}
    {!! Form::number('preco_venda', '') !!}
</div>

{!! Form::submit('gravar',['class'=>'btn']) !!}

{!! Form::close() !!}


@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
@endsection
