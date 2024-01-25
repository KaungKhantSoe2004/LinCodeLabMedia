<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    //searchPosts
    public function searchPosts(Request $request){
$key = $request->key;
 $posts =  Post::where('posts.title', 'like', '%'.$key.'%')->get();
 return response()->json([

    'posts' => $posts,
    'status'=> true
 ]);
    }


// searchWithCategory
public function searchWithCategory(Request $request){
$id = $request->id;
$posts = Post::where("category_id",$id)->get();
return response()->json([
    'posts'=> $posts,
    'status'=> 'success'
]);
}
// end

// getPostDetails
public function getPostDetails(Request $request){
$id = $request->id;
$post = Post::where('post_id',$id)->first();
return response()->json([
    'post'=> $post,
    'status'=> 'success'
]);
}
// end
}
