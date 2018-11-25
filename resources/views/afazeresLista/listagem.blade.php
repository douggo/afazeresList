@extends('layouts/principalLista')

@section('conteudo')
<h1 class="meio">Listagem de afazeres</h1>

@if (session('adicionou') == true)
    <script>
        swal("Sucesso", "afazer incluído com sucesso", "success");
    </script>
@endif

@if (session('removido') == true)
    <script>
        swal("Sucesso", "afazer concluído com sucesso", "success");
    </script>
@endif
    <form action="/afazeresLista/adiciona" method="post">
        {{ csrf_field() }}
        <input name="id_lista" type="hidden" value="{{$idLista}}">
        <div class="form-group">
            <label for="acao">Ação</label>
            <input type="text" name="acao" id="acao" class="form-control">
        </div>
        <div class="form-group">
            <input class="btn btn-primary totalwidth" type="submit" value="Cadastrar">
        </div>
    </form>
    <table class="table table-bordered table-stripped">
        <thead class="thead-dark">
            <th>Ação</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($afazeres as $a)
                <tr>
                    <td>{{$a->acao}}</td>
                    <td class="meio">
                        <a href="/afazeresLista/remover/{{$a->id}}">
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
