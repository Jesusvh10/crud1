<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\teste;
use Validator;
class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'username' => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User([
            'name'     => $request->name,
            'username'     => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    public function store(Request $request, teste $product )
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'lastname' => 'required',
            'age' => 'required'
        ]);


        if($validator->fails()){
            
            return response()->json(['message' => 'Successfully logged out']);    
        }


         $product->name = $input['name'];
         $product->lastname = $input['lastname'];
         $product->age = $input['age'];
         $product->save();


        return response()->json([$product, 'Product updated successfully.']);
    }


       
      public function show($id)
    {
        $product = teste::find($id);


        if (is_null($product)) {
           return response()->json(['message' => 'asdsdasddasd']);    
        }


        return response()->json([$product, 'Product retrieved successfully.']);
    }

     
      public function update(Request $request, $id)
    {
        $input = $request->all();
        $actualiza = teste::find($id);

         $actualiza->name = $input['name'];
         $actualiza->lastname = $input['lastname'];
         $actualiza->age = $input['age'];
         $actualiza->save();


       return response()->json([$actualiza, 'Product updated successfully.']);
    }


    public function delete(Request $request, $id){

        $deleter = teste::find($id);
        $deleter->delete();
        return response()->json('este usuario fue eliminado');
    }

}