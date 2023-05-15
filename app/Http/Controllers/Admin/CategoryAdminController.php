<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Redirect;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Menu',

            [
                'categories' => Category::all()
            ]
                
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Components/ModalAddCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Category::all());
        
        $request->validate([
            'name' => 'required|min:2|max:40',
            'active' => 'boolean'
        ]);

        Category::create([
            'name' => $request->name,
            'active' => false
        ]);

        return to_route('dashboard.menu.index')->with('toast', 'Categoria criada com sucesso.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {   
        $categoryFound = Category::findOrFail($category->id);

        $categoryFound->name = $request->name;
        $categoryFound->save();
        
        return back();
    }

    public function updateActiveCategory(Request $request, Category $category)
    {
        $category->active = !$category->active;
        $category->save();

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   
        //dd($category);
        $categoryFound = Category::findOrFail($category->id);

        $categoryFound->delete();

        return Redirect::back()->with('toast', 'Categoria excluída');
    }

}
