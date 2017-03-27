
@extends('layouts.app')

@section('content')
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='panel  panel-default'>
				<div class='panel-heading'> Izmeni komentar na članak "<i>{{$naslov}}</i> "</div>
				<div class='panel-body'>
					
				
				{!! Form::model($komentar, array('route'=> ['komentar.update', $komentar->id], 'method'=>'PUT')) !!}
					<div class='form-group'>
					{!! Form::label('sadrzaj','Unesi tekst komentara') !!}
					{!! Form::textarea('sadrzaj', null, ['class'=>'form-control']) !!}
					{!! Form::hidden('clanak_id', $komentar->clanak_id, ['class'=>'form-control']) !!}
					</div>
					
					<div class='form-group'>
					{!! Form::button('Potvrdi izmenu komentara',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
					
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


