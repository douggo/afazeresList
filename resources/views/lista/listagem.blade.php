@extends('layouts/principalLista')

@section('conteudo')
<h1 class="meio">Lista de Afazeres</h1>

@if (session('adicionou') == true)
    <script>
        swal("Sucesso", "Lista {{session('lista')}} adicionada com sucesso!", "success");
    </script>
@endif

@if (session('alterada') == true)
    <script>
        swal("Sucesso", "Lista {{session('lista')}} alterada com sucesso!", "success");
    </script>
@endif

@if (session('removida') == true)
    <script>
        swal("Sucesso", "Lista {{session('lista')}} concluída com sucesso!", "success");
    </script>
@endif

<table class="table table-bordered table-stripped">
    <thead class="thead-dark">
        <th>Descrição</th>
        <th>Responsável</th>
        <th>Prazo</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($listas as $l)
            <tr>
                <td>{{$l->descricao}}</td>
                <td>{{$l->nome}}</td>
                <td>{{$l->prazo}}</td>
                <td class="meio">
                    <a href="/listas/altera/{{$l->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/afazeresLista/{{$l->id}}">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="/listas/remover/{{$l->id}}">
                        <i class="fas fa-check-circle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
