<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class apiTrendPostController extends Controller
{
    //createActionLog
    public function createActionLog(Request $request){
$data = [
    'post_id'=> $request->post_id,
    'user_id'=> $request->user_id,

];
ActionLog::create($data);
$count = ActionLog::where("post_id",$request->post_id)->get()->count();
return response()->json([
    'count' => $count
]);
    }
}
