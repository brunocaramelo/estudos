@extends('principal')

@section('conteudo') 

<h1>Detalhes do produto</h1>

	<table class='table'>
		<thead>
				<tr>
					<th>Nome</th>
					<th>Valor</th>
					<th>Descricao</th>
					<th>Quantidade</th>
					<th>Tamanho</th>
				</tr>
		</thead>
		<tbody>
				<tr>
					<td>{{$produto->nome}}</td>
					<td>{{$produto->valor}}</td>
					<td>{{$produto->descricao}}</td>
					<td>{{$produto->quantidade}}</td>
					<td>{{$produto->tamanho}}</td>
				</tr>
		</tbody>
	</table>
@stop