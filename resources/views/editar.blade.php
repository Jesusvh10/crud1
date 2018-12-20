@extends('layouts/app')
{{$edit}}
@section('content')

<div class="container" >
	<div class="row">
		@include('erro')
	    <form method="POST" action="{{ url('/upcrud', $edit->id) }}">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<label>Nome</label>
		<input type="text" name="name" value= "{{ $edit->name }}"/>
		<label>Email</label>
		<input type="text" name="sobrnome"  value= "{{ $edit->lastname }}"/ >
		<label>Pagamento</label>
		<input type="text" name="idade"  value= "{{ $edit->age }}"/>
		
		<button class="btn btn-primary  " >salvar</button>
        </form>
    </div>
    </div>

@endsection

