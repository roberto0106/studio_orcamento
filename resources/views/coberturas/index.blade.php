@extends('layouts.app')

@section('content')

<style>
    input[type=search] {
        border-top: none !important; 
        border-left: none !important;
        border-right: none !important;
        border-bottom: 1px solid !important;
        height: 20px !important;
        margin: 5px;
    }
</style>

<blockquote>
    <h5>Coberturas</h5>
</blockquote>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      {{-- <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">table_chart</i></a></li> --}}
      <li><a class="btn-floating blue" href="{{ route('coberturas.create') }}"><i class="material-icons">add_circle_outline</i></a></li>
    </ul>
  </div>

<p>
<table id="table-coberturas">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Produtos Associados</th>
            <th>Apagar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coberturas as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nome}}</td>
            <td>{{$item->produtos->count()}}</td>
            <td>
            {!! Form::open(['route'=>['coberturas.destroy',$item->id],'method'=>'DELETE']) !!}
            {!! Form::submit('apagar') !!}
            {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

</p>


@endsection

@section('scripts')
<script type="text/javascript">
     $(function () {
      $('.fixed-action-btn').floatingActionButton();
      $('#table-coberturas').DataTable({
        "pageLength": 5,
        "lengthChange": false,
          language: {
              "url":"http://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json" ,                   
          }
      });
    });
</script>
@endsection
