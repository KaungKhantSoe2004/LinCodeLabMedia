<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    //getAllCategories
    public function getAllCategories(){
        $categories = Category::get();
        return response()->json([
            'categories' => $categories,
            'status'=> 'success'
        ]);
    }}
