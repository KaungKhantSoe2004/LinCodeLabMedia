<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //direct Post
    public function directPost(){
        $data = Post::when(request('key'),function($query){
$query->where('posts.title','like','%'.request('key').'%');
        })->get();
        // dd($data->count());
        return view('posts.index',compact('data'));

    }


public function addPostPage(){
    $categories = Category::get();
    // dd($categories->toArray());
    return view("posts.addPost", compact('categories'));
}



public function addPost(Request $request){

$data= $this->getInsertableArr($request);
if($request->file('image')){
    // dd(uniqid().'kks'.$request->file("image")->getClientOriginalName());
   $path = uniqid().'kks'.$request->file("image")->getClientOriginalName();
  //  $request->file("image")->storeAs('public/img/'.$path);
    $request->file("image")->move(public_path().'/img',$path);
    $data['image'] = $path;
}
Post::create($data);
return redirect()->route("admin#post")->with(['postAdded'=> "New Post Added"]);
// dd($data);
}


// post Delete
 public function postDelete(Request $request){
    $img = Post::where("post_id",$request->id)->first()->image;
    if(File::exists(public_path().'/img/'.$img)){
File::delete(public_path().'/img/'.$img);
    }
Post::where("post_id", $request->id)->delete();

return redirect()->route('admin#post')->with(['deleted'=> "Post Deleted"]);

}


// direct Post Edit Page
 public function postEditPage(Request $request){
$data = Post::where("post_id",$request->id)->first();
$categories = Category::get();
return view('Posts.editPost',compact(['data','categories']));
 }

 public function updatePost(Request $request){
    // dd($request->all());
    $data =$this->getInsertableArr($request);
    // dd($data);
    if($request->file('image')){
        // dd($request->id);
        $imgName = Post::where("post_id",$request->id)->first()->image;

        $path = uniqid().'kks'.$request->file("image")->getClientOriginalName();
        if(File::exists(public_path().'/img/'.$imgName)){
     File::delete(public_path().'/img/'.$imgName);
        }
        $request->file("image")->move(public_path().'/img', $path);
        $data['image'] = $path;

        // dd($request->file('image')->getClientOriginalName());
    }
Post::where("post_id",$request->id)->update($data);
return redirect()->route("admin#post")->with(['updated'=> $request->title.'is Updated']);
 }

// postDetails
public function postDetails(Request $request){
$data = Post::where("post_id",$request->id)->first();
return view('Posts.info',compact(['data']));
}
// end


private function getInsertableArr($request){
  $validatingRules = [
    'title'=> ['required'],
    'description'=> ['required'],
    'category'=> ['required'],
    'image'=> ['required',"mimes:jpeg,jpg,png,gif"]
  ];
  Validator::make($request->all(),$validatingRules)->validate();
  return [
    'title'=> $request->title,
    'description'=> $request->description,
    'category_id'=> $request->category
  ];
}

}
