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
				<div class='panel-heading'> Članci</div>
				<div class='panel-body'>
				<table class='table'>
					<tr>
						<th> Kategorija </th>
						<th> Naslov </th>
						<th> Autor </th>
						<th> Akcija </th>
					</tr>
					
			@foreach($clanci as $clanak )
			<tr>
			<td>{{ $kategorije->find($clanak->kategorija_id)->naziv}}</td>
			<td>{{link_to_route('clanak.show',$clanak->naslov, $clanak->id)}}</td>
			<td>{{ $users->find($clanak->autor_id)->name}}</td>
			<td>
			{!! Form::open(array('route'=> ['clanak.destroy', $clanak->id], 'method'=>'DELETE','onsubmit' => 'return ConfirmDelete()')) !!}
			 {{ link_to_route('clanak.edit', 'Izmeni',[$clanak->id], ['class' =>'btn btn-primary' ]) }} 
				|
			 		
			 		{!! Form::button('Brisanje',['type'=>'submit', 'class'=>'btn btn-danger']) !!}
			 		{!! Form::close() !!}
			</td>
			</tr>
			@endforeach
				</table>
				
			{{ link_to_route('clanak.create', 'Dodaj novi članak',null, ['class' =>'btn btn-success' ]) }}
				</div>
			</div>
		</div>
	</div>
</div>





@endsection
