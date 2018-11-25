@extends('layouts/principalPessoa')

@section('conteudo')
    <h1 class="meio">Cadastro de pessoa</h1>
    <form action="/pessoas/adiciona" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <input class="btn btn-primary totalwidth" type="submit" value="Cadastrar">
        </div>
    </form>
@stop
