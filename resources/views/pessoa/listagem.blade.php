@extends('layouts/principalPessoa')

@section('conteudo')
<h1 class="meio">Listagem de pessoas</h1>

@if (session('adicionou') == true)
    <script>
        swal("Sucesso", "Pessoa {{session('pessoa')}} adicionada com sucesso!", "success");
    </script>
@endif

@if (session('alterado') == true)
    <script>
        swal("Sucesso", "Pessoa {{session('pessoa')}} alterada com sucesso!", "success");
    </script>
@endif

@if (session('removido') == true)
    <script>
        swal("Sucesso", "Pessoa {{session('pessoa')}} removida com sucesso!", "success");
    </script>
@endif

<table class="table table-bordered table-stripped">
    <thead class="thead-dark">
        <th>Nome</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($pessoas as $p)
            <tr>
                <td>{{$p->nome}}</td>
                <td class="meio">
                    <a href="/pessoas/altera/{{$p->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/pessoas/remover/{{$p->id}}">
                        <i class="fas fa-minus-circle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop
