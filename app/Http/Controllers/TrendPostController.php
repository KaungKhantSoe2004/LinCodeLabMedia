<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //direct TrendPost
    public function directTrendPost(){

            $posts = ActionLog::select('action_logs.*','posts.*', 'posts.post_id as id', DB::raw('COUNT(action_logs.post_id) as count'))
            ->leftJoin('posts','posts.post_id','action_logs.post_id')
            ->orderBy('count', 'desc')
            // ->groupBy('action_logs.post_id')
            ->groupBy("action_logs.post_id")
            ->get();
            // ->paginate(5);
            // dd($posts->toArray());

        return view("trendPost.index", compact(['posts']));
    }
}
