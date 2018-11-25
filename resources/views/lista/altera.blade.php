@extends('layouts/principalPessoa')

@section('conteudo')
    <h1 class="meio">Alteração da lista</h1>
    <form action="/listas/update" method="post">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{$l->id}}">
        <div class="form-group">
            <label for="nome">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{$l->descricao}}">
        </div>
        <div class="form-group">
            <label for="nome">Prazo</label>
            <input type="text" name="prazo" id="prazo" class="form-control" value="{{$l->prazo}}">
        </div>
        <div class="form-group">
            <label for="id_pessoa">Pessoa</label>
            <select name="id_pessoa" id="id_pessoa" class="form-control">
                <option>Selecione uma nova pessoa</option>
                @foreach ($pessoas as $p)
                    <option value="{{$p->id}}" selecte>{{$p->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary totalwidth" type="submit" value="Alterar">
        </div>
    </form>
@stop
