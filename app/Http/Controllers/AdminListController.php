<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    //direct adminLIst
    public function getAdminList(){
        // if(request('key')){
        //     dd(request('key'));
        // }
        $data = User::when(request('key'), function($query){
            $query->orWhere('users.name','like', '%'.request('key')."%")
            ->orWhere('users.email','like', '%'.request('key')."%")
            ->orWhere('users.address','like', '%'.request('key')."%")
            ->orWhere('users.phone','like', '%'.request('key')."%");
        })
        ->paginate(5);
        // dd($data->toArray());
        return view("admin.index",compact('data'));
    }

// adminAccount Delete
public function accountDelete($id){
User::where('id',$id)->delete();
return redirect()->route("admin#adminList")->with(["accDel"=>"Account is Deleted"]);
}

}
