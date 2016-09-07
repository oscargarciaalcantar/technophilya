@extends('layouts.main')

@section('title', 'Todas las publicaciones')

@section('stylesheets')
	{{ Html::style('css/styles.css') }}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-9">
			<h1>Todas las publicaciones</h1>
		</div>

		<div class="col-md-3">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Crear publicación</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Fecha de creación</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td>{{ $post->titulo }}</td>
								<td>{{ substr($post->descripcion, 0, 50) }} {{ strlen($post->descripcion) > 50 ? '...' : '' }}</td>
								<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">Visualizar</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Editar</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>

@stop