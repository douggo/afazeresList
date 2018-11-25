@extends('layouts/principalPessoa')

@section('conteudo')
    <h1 class="meio">Alteração de pessoa</h1>
    <form action="/pessoas/update" method="post">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{$p->id}}">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{$p->nome}}">
        </div>
        <div class="form-group">
            <input class="btn btn-primary totalwidth" type="submit" value="Alterar">
        </div>
    </form>
@stop
