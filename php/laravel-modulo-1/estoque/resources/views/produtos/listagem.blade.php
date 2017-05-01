@extends('principal')

@section('conteudo') 

<h1>Lista de produtos</h1>

@if(old('nome'))
	Produto {{old('nome')}} inserido com sucesso
@endif

<table class='table'>
	<thead>
			<tr>
				<th>Nome</th>
				<th>Valor</th>
				<th>Descricao</th>
				<th>Quantidade</th>
				<th>Tamanho</th>
				<th>Categoria</th>
				<th colspan='2' >Acoes</th>
			</tr>
	</thead>
	<tbody>
		@foreach($produtos as $produto)
			<tr class='{{$produto->quantidade <= 1 ? 'danger':''}}' >
				<td>{{$produto->nome}}</td>
				<td>{{$produto->valor}}</td>
				<td>{{$produto->descricao}}</td>
				<td>{{$produto->quantidade}}</td>
				<td>{{$produto->tamanho}}</td>
				<td>{{$produto->categoria['nome']}}</td>
				<td><a href='/produtos/mostra/{{$produto->id}}'>Acessar</a></td>
				<td><a href='/produtos/remove/{{$produto->id}}'>Remover</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@stop
