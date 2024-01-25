<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
   public function getLoginToken(Request $request){
$user  = User::where('email',$request->email)->first();
if(isset($user)){
    if(Hash::check($request->password, $user->password)){
         return response()->json([
        'status'=> true,
            'user'=> $user,
            'token'=> $user->createToken(time())->plainTextToken
        ]);
    } else{
    return response()->json([
        'status'=> false,
        'user'=> null,
        'token'=> null
    ]);
    }
} else {
    return  response()->json([
        'status'=> false,
        'user'=> null,
        'token'=> null
    ]);
}
   }


//    getRegisterToken
public function getRegisterToken(Request $request){
    $email = $request->email;
    $password = $request->password;
    $name = $request->name;
   $Validation = User::where("email",$email)->first();
   if(isset($Validation)){
    return response()->json([
        'user'=>null,
         'error'=> "Email already exists"
    ]);
   }else{
    $data = [
        'name'=> $name,
        'email'=> $email,
        'password'=> Hash::make($password)
    ];
User::create($data);
$user= User::where('email',$email)->first();
if(isset($user)){
    return response()->json([
        'user'=> $user,
        'token'=> $user->createToken(time())->plainTextToken
    ]);
}
   }
}

//getAllPostList
public function getAllPostList(){
$post = Post::select('posts.*','categories.title as categoryName')
->leftJoin('categories','posts.post_id','categories.category_id')
->get();
return response()->json([
    'post'=> $post,
    'status'=> true
]);
}

}
