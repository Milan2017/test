
@extends('layouts.app')

@section('content')
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='panel  panel-default'>
				<div class='panel-heading'> Izmena članka</div>
				<div class='panel-body'>
					
				{!! Form::model($clanak, array('route'=> ['clanak.update', $clanak->id], 'method'=>'PUT')) !!}
					<div class='form-group'>
					{!!  Form::label('kategorija','Odaberi kategoriju') !!}
					{!! Form::select('kategorija_id', $kategorije, null, ['class' => 'form-control'])!!}
					</div>
					<div class='form-group'>
					{!! Form::label('naslov','Unesi naslov') !!}
					{!! Form::text('naslov', null, ['class'=>'form-control']) !!}
					</div>
					<div class='form-group'>
					{!! Form::label('tekst','Unesi tekst') !!}
					{!! Form::textarea('tekst', null, ['class'=>'form-control']) !!}
					</div>
					
					<div class='form-group'>
					{!! Form::button('Potvrdi',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
					
					</div>
				{!! Form::close() !!}
				
				
				
				
				</div>
			</div>
			@if(count($errors) > 0)
				<ul class="alert alert-danger">
				@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
				@endforeach
				</ul>
			@endif
		</div>
	</div>
</div>
@endsection
