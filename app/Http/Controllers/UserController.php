<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
Class UserController extends Controller {
private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function getAllUser(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function show($id)
    {
        //
        return User::where('id','like','%'.$id.'%')->get();
    }
    public function add(Request $request ){
        $rules = [
            'id' => 'max:20',
            'firstname' => 'max:20',
            'lastname' => 'max:20',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $user;
       
}
    public function update(Request $request,$id)
    {
    $rules = [
    'id' => 'max:20',
    'firstname' => 'max:20',
    'lastname' => 'max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $user;
}
    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

 
    // old code
    /*
    $user = User::where('userid', $id)->first();
    if($user){
    $user->delete();
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('User ID Does Not Exists',
    Response::HTTP_NOT_FOUND);
    }
    */
    }
}

//website
//https://dev.to/tanzimibthesam/making-api-crud-create-read-update-delete-with-laravel-8-n-api-authentication-with-sanctum-19oh
 