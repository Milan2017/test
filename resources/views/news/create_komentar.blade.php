
@extends('layouts.app')

@section('content')
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='panel  panel-default'>
				<div class='panel-heading'> Ostavi komentar na članak "<i>{{$clanak->naslov}}</i> "</div>
				<div class='panel-body'>
					
				{!! Form::open(array('route'=> 'komentar.store')) !!}
	
					<div class='form-group'>
					{!! Form::label('sadrzaj','Unesi tekst komentara') !!}
					{!! Form::textarea('sadrzaj', null, ['class'=>'form-control']) !!}
					{!! Form::hidden('clanak_id', $clanak->id, ['class'=>'form-control']) !!}
					</div>
					
					<div class='form-group'>
					{!! Form::button('Pošalji komentar',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
					
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

