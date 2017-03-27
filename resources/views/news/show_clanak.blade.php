@extends('layouts.app')

@section('content')
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
		
		@if(Session::has('message'))
		<div class='alert alert-success'>{{Session::get('message')}}</div>
		@endif
		
			<div class='panel  panel-default'>
				<div class='panel-heading'> <b>{{$clanak->naslov}}</b></div>
				<div class='panel-body'>
							{{$clanak->tekst}}
				</div>
				<div class=panel-footer>
				 {{ $users->find($clanak->autor_id)->name}}
				</div>
			</div>
			<div class='panel-footer'>
			{{ link_to_route('komentar.create', 'Ostavi komentar',$clanak->id, ['class' =>'btn btn-success' ]) }}
			</div>
		</div>
	</div>
</div>
@foreach ($komentari as $komentar)
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
		
			<div class='panel  panel-default'>
				<div class='panel-heading'> {{$users->find($komentar->autor_id)->name}}
				
				</div>
				<div class='panel-body'>
							{{$komentar->sadrzaj}}
				</div>
				@if($komentar->autor_id==$autor)
				<div class='panel-footer'>
				{!! Form::open(array('route'=> ['komentar.destroy', $komentar->id], 'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!}
			 {{ link_to_route('komentar.edit', 'Izmeni',[$komentar->id], ['class' =>'btn btn-primary' ]) }} 
				|
			 		
			 		{!! Form::button('Brisanje',['type'=>'submit', 'class'=>'btn btn-danger']) !!}
			 		{!! Form::close() !!}
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endforeach

@endsection
