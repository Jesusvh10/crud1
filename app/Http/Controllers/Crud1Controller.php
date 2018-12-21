<?php
namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Teste;
use App\Http\Requests\Fuerza;


//use App\Http\Controllers\Controller;

class Crud1Controller extends Controller
{
    //
private $path ='user';


	public function show(){
	    // donde yo veo todos los registros
		$mostrar = Teste::all();
		return view('crud',compact('mostrar'));
	}



	public function cadastro(){
		//donde yo veo el formulario de cadastro para registrar
	 	return view('mostrarcrud');
	}



	public function add(Fuerza $request){
		//donde adiciono los registros
		  $validated = $request->validated();
		$crud = new Teste;
		$crud->name = $request->nam;
		$crud->lastname = $request->sobrenome;
		$crud->age = $request->idade;
		
		$crud->save();

		return redirect('/crud')->with('masage','Usuario Cadastrado');

	}



	public function editt(Request $request, $id){
		// para editar los datos sin guardar aun
		$edit = Teste::find($id);
		return view('editar',compact('edit'));

	}



	public function update(Request $request, $id){
		$crud = Teste::find($id);
		$crud->name = $request->get('name');
		$crud->lastname = $request->get('sobrnome');
		$crud->age = $request->get('idade');
		$crud->save();

         return redirect('/crud')->with('masage','Actualizado com exito');
	}



	public function delete(Request $request, $id){
		$crud = Teste::find($id);
		$crud->delete();
        return redirect('/crud')->with('masage','Usuario elminado com ID'.":".$id);
	}


}// fin del controlador