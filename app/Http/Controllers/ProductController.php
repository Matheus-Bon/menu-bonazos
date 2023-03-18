<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;








class ProductController extends Controller
{
    /* Funções para Categorias */

    public function view(){

        $categories = Category::all();

        return view('admin.orders', [
            'categories' => $categories,
        ]);
    }

    public function storeCategory(Request $request)
    {
        


        $admin = Auth::user();

        $category = new Category();

        $category->name = $request->name;

        $category->save();

        
    
        return Redirect::route('admin.orders')->with('status', 'category-created');
        
    }


}
