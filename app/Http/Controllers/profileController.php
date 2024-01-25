<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class profileController extends Controller
{
    // direct profile page
    public function profileData(){
        $id = Auth::user()->id;
        $data = User::where("id",$id)->first();
        return view('adminProfile.index',compact('data'));
    }


// direct passwordChange Page
public function changePassword($e){
    return view("adminProfile.changePassword",compact('e'));
}


// updatePassword
public function updatePassword(Request $request){
   $id = Auth::user()->id;
  $data = User::where("id",$id)->first();
  if(!Hash::check($request->oldPassword, $data->password)){
    return back()->with(["noMatch"=>"Please fill correct Password "]);
  }
  $updatablePass = $this->getUpdatablePassword($request);
User::where("id",$id)->update($updatablePass);
return redirect()->route("admin#profile")->with(["changePass"=>"Change Password Success"]);
//   dd($data->password);
}


// update profile
public function updateProfile(Request $request){
 $updatableArr = $this->getUpdatableProfile($request);
//  dd($updatableArr);
$id = Auth::user()->id;
// $data
User::where('id',$id)->update($updatableArr);
return back()->with(['updateSuccess'=>"Profile Updating is Success"]);
}



// private functions

// updateProfile
private function getUpdatableProfile($request){
    $id = Auth::user()->id;

    $validationRules = [
        'adminName'=> ['required'],
        "adminEmail"=> ["required",Rule::unique('users',"email")->ignore($id,"id")]
    ];
  Validator::make($request->all(),$validationRules)->validate();
return [
    'name'=> $request->adminName,
    "email"=> $request->adminEmail,
    'phone'=>$request->adminPhone,
    'address'=> $request->adminAddress,
    "gender"=> $request->adminGender
];
}

//getUpdatablePassword
private function getUpdatablePassword($request){
$validatingRules = [
    "oldPassword"=> ['required'],
    'newPassword'=> ['required', 'min:8', 'max: 22', 'same:againPassword'],
    'againPassword'=>['required',  'min:8', 'max: 22', 'same:newPassword']
];
Validator::make($request->all(),$validatingRules)->validate();
return [
    'password'=> Hash::make($request->newPassword)
];
}

}
