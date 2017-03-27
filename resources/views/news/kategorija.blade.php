@extends('layouts.app')

@section('content')
<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-md-offset-1'>
		@if(Session::has('error'))
		<div class='alert alert-danger'>{{Session::get('error')}}</div>
		@endif
		@if(Session::has('message'))
		<div class='alert alert-success'>{{Session::get('message')}}</div>
		@endif
			<div class='panel  panel-default'>
				<div class='panel-heading'> Kategorije</div>
				<div class='panel-body'>
				<table class='table'>
					<tr>
						<th> Naslov </th>
						<th> Akcija </th>
					</tr>
					
			@foreach($kategorije as $kategorija )
			<tr>
			
			<td>{{ $kategorija->naziv}}</td>
			<td>
			{!! Form::open(array('route'=> ['kategorija.destroy', $kategorija->id], 'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!}
			 {{ link_to_route('kategorija.edit', 'Izmeni',[$kategorija->id], ['class' =>'btn btn-primary' ]) }} 
				|
			 		
			 		{!! Form::button('Brisanje',['type'=>'submit', 'class'=>'btn btn-danger']) !!}
			 		{!! Form::close() !!}
			</td>
			</tr>
			@endforeach
				</table>
				
			{{ link_to_route('kategorija.create', 'Dodaj novu kategoriju',null, ['class' =>'btn btn-success' ]) }}
				</div>
			</div>
		</div>
	</div>
</div>





@endsection