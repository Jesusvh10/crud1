@extends('layouts/app')

@section('content')

@if (session('masage'))
      <div class="alert alert-success">
          {{ session('masage') }}
      </div>
  @endif

 <div class="conteiner my-4" >
   
   <h1 class="display-4">Registro</h1>

 </div>

 

  <table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">Idade</th>
          <th>Editar</th> 
          <th>Delete</th>
          <th> <a href="{{ URL::to('/cadastro')}}" class="btn btn-primary float-right ">Cadastrar</a>
          </th>
        </tr>
      </thead>
        <tbody>
          @foreach($mostrar as $item)
          <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->lastname}}</td>
              <td>{{$item->age}}</td>
              <td><a href="{{ URL::to('/editcrud',$item->id)}}" class="btn btn-primary">Edit</a></td>         
            <td>
              <form action="{{ URL::to('/delcrud',$item->id)}}"method="post">
                 @csrf
                 @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
             </td>

          </tr>
          @endforeach()
        </tbody>
  </table>

@endsection