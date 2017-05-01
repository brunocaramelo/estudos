@extends('principal')

@section('conteudo') 

<div class='alert alert-danger'>
    <ul>
    @foreach( $errors->all() as $error )
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>

<form action='/produtos/adicionar' method='post' >

    <div class='form-group'>
        <label>Nome</label>
        <input type="text" name="nome" value="" class='form-control' />
        <input type="hidden" name='_token' value="{{ csrf_token() }}"  />
    </div>

    <div class='form-group'>
        <label>Valor</label>
        <input type="text" name="valor" value="" class='form-control' />
    </div>

    <div class='form-group'>
        <label>Quantidade</label>
        <input type="text" name="quantidade" value="" class='form-control' />
    </div>
    
    <div class='form-group'>
        <label>Categoria</label>
       <select name='categoria_id'>
            @foreach( $categorias as $categoria )
                <option value='{{$categoria->id}}'>{{$categoria->nome}}</option>
            @endforeach
        </select>
    </div>

    <div class='form-group'>
        <label>Tamanho</label>
        <input type="text" name="tamanho" value="" class='form-control' />
    </div>

    <div class='form-group'>
        <label>Descricao</label>
        <input type="text" name="descricao" value="" class='form-control' />
    </div>

    <div class='form-group'>
        <input type="submit"  value="enviar" class='btn btn-primary' />
    </div>

</form>
@stop