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
    <h5>Parametros</h5>
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

<table id="table-parametros">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Cobertura</th>
            <th>Qtd Formandos Min</th>
            <th>Qtd Formandos Max</th>
            <th>Quantidade do Produto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($parametros as $item)
        <tr>
            <td>{{$item->produto->nome}}</td>
            <td>{{$item->cobertura->nome}}</td>
            <td>{{$item->qtd_formandos_minima}}</td>
            <td>{{$item->qtd_formandos_maxima}}</td>
            <td>{{$item->qtd_produtos}}</td>
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
      $('#table-parametros').DataTable({
        "pageLength": 5,
        "lengthChange": false,
          language: {
              "url":"http://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json" ,                   
          }
      });
    });
</script>
@endsection
