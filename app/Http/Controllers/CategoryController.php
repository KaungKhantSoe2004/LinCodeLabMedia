<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct Category
    public function directCategory(){
        $data = Category::when(request('key'), function($query){
            $query->where('categories.title','like', '%'.request('key')."%");
        })
        ->paginate(5);

        return view("category.index", compact('data'));
    }


    // add category
    public function addPage(){
        return view("category.categoryAdd");
    }

    public function addCategory(Request $request){
$data = $this->getInsertableArr($request);

Category::create($data);
return redirect()->route("admin#category")->with(['categoryAdded'=> "Category is Added"]);
    }

// direct Category Edit Page
 public function editPage(Request $request){
 $id = $request->id;
 $data = Category::where('category_id', $id)->first();
//  dd($data->title);
    return view("category.categoryEdit", compact(['data']));
 }


// update Category
public function updateCategory(Request $request){
// dd($request->all());
$data = $this->getInsertableArr($request);
Category::where("category_id",$request->id)->update($data);
return redirect()->route('admin#category')->with(["updated"=> "Category Edited"]);
}

// delete Category
 public function delete(Request $request){
   Category::where("category_id",$request->id)->delete();
   return redirect()->route('admin#category')->with(['deleted'=> "Category Deleted"]);
 }


private function getInsertableArr($request){
$validatingRules = [
    'title'=> ['required'],
    'description'=> ['required', 'min:20']
];
Validator::make($request->all(),$validatingRules)->validate();
return [
    'title'=> $request->title,
    'description'=> $request->description
];
}




}
