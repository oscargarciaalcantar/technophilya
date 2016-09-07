@extends('layouts.main')

@section('title', 'Modificar publicación')

@section('stylesheets')
	{{ Html::style('css/parsley.css') }}
	{{ Html::style('css/styles.css') }}
@endsection

@section('content')

	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'data-parsley-validate' => '', 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('titulo', 'Título') }}
			{{ Form::text('titulo', null, ['class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255']) }}

			{{ Form::label('descripcion', 'Descripción', ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('descripcion', null, ['class' => 'form-control', 'required' => '']) }}
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
						{!! Html::linkRoute('posts.show', 'Cancelar', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Guardar', array('class' => 'btn btn-success btn-md btn-block')) }}
					</div>
				</div>

			</div>
		</div>
		{!! Form::close() !!}
	</div><!--Enf of the form .row-->

@endsection

@section('scripts')
	{{ Html::script('js/parsley.min.js') }}
	{{ Html::script('i18n/es.js', array('type' => 'text/html')) }}
@endsection