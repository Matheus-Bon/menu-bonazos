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


    //Função update do nome da categoria
    public function updateCategory($id , Request $request)
    {
        

        $category = Category::where('id',$id)->first();

        //dd($category);

        $category->name = $request->name;

        $category->save();

        toast('Categoria atualizada!','success');

        return Redirect::route('admin.orders');
    }
    
    public function deleteCategory($id)
    {

        $category = Category::where('id' , $id)->first();

        $category->delete();

        toast('Categoria deletada!','success');

        return Redirect::route('admin.orders');

    }


    //Função que atualiza se a categoria está ativa ou não
    public function updateActive(Request $request)
    {
        $active = $request->input('active') === 'true' ? true : false;
        $category = Category::findOrFail($request->id);

        
        $category->active = $active;
        
        $category->save();

        
        return response()->json([
            'success' => $active
        ]);
    }


}
