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
<h5>Cursos</h5>
</blockquote>

<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">mode_edit</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
  </ul>
</div>

    <p>
      <table id="table-cursos" class="">
        <thead>
          <tr>
            <th>Id</th>
            <th>Instituição</th>
            <th>Curso</th>
            <th>Contato</th>
            <th>Telefone</th>
            <th>Apagar</th> 
          </tr>
        </thead>
        <tbody id="clientes_table">
          @foreach ($cursos as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->instituicao->nome}}</td>
            <td>{{$item->nome}}</td>
            <td>{{$item->contato}}</td>
            <td>{{$item->telefone}}</td>
            {!! Form::open(['route' => ['cursos.destroy', $item->id],'method'=>'DELETE']) !!}
            <td>{!! Form::submit('Apagar', ['class'=>'btn btn-danger']) !!}</td> 
            {!! Form::close() !!}
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
      $('#table-cursos').DataTable({
        "pageLength": 5,
        "lengthChange": false,
          language: {
              "url":"http://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json" ,                   
          }
      });

     
    
    }); 
    
  </script>
  @endsection
  