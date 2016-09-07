@extends('layouts.main')

@section('title', 'Agregar nueva publicación')

@section('stylesheets')
	{{ Html::style('css/parsley.css') }}
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Agregar nueva publicación</h1>
			<hr>

			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
			    {{ Form::label('titulo', 'Título:') }}
			    {{ Form::text('titulo', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

			    {{ Form::label('descripcion', 'Descripción:') }}
			    {{ Form::textarea('descripcion', null, array('class' => 'form-control', 'required' => '')) }}

			    {{ Form::submit('Agregar publicacion', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;' )) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')
	{{ Html::script('js/parsley.min.js') }}
	{{ Html::script('i18n/es.js', array('type' => 'text/html')) }}
@endsection