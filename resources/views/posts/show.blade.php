@extends('layouts.main')

@section('title', 'Muestra publicación')

@section('content')

	<div class="row">

		<div class="col-md-8">
			<h1>{{ $post->titulo }}</h1>
			<p class="lead">{{ $post->descripcion }}</p>
		</div>

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<dt>Fecha de creación:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Fecha de modificación:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Editar', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.destroy', 'Eliminar', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
				</div>

			</div>
		</div>

	</div>

@endsection