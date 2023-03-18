<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;







class ProductController extends Controller
{


    /* Funções para Categorias */

    public function view(){

        $categories = Category::all();

        return view('admin.orders', [
            'categories' => $categories,
        ]);
    }



    //Função cria e coloca no banco de dados, as informações referentes a Categoria
    public function storeCategory(Request $request)
    {
        
        $admin = Auth::user();

        if($admin){

            $category = new Category();

            $category->name = $request->name;
            $category->active = true;

            $category->save();

            toast('Categoria criada!','success');

        }else{
            toast('Algo deu errado','error');
        }

        return Redirect::route('admin.orders')->with('status', 'category-created');
        
    }


    //Função que atualiza se a categoria está ativa ou não
    public function updateActive(Request $request)
    {
        
        $category = Category::findOrFail($request->id);
        $category->active = true;
        $category->save();

        
        return response()->json([
            'success' => true
          ]);
    }


}
