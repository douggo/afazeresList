@extends('layouts/principalLista')

@section('conteudo')
    <h1 class="meio">Cadastro de Lista
    </h1>
    <form action="/listas/adiciona" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label for="prazo">Prazo</label>
            <input type="date" name="prazo" id="prazo" class="form-control">
        </div>
        <div class="form-group">
            <label for="id_pessoa">Pessoa</label>
            <select name="id_pessoa" id="id_pessoa" class="form-control">
                <option>Selecione uma pessoa</option>
                @foreach ($pessoas as $p)
                    <option value="{{$p->id}}" selecte>{{$p->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary totalwidth" type="submit" value="Cadastrar">
        </div>
    </form>
@stop
