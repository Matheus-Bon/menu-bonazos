<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Auth;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Menu',

            [
                dd(Auth::guard('web')->user()),
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
        
        $unitId = Auth::user()->unit->id;
    
        $request->validate([
            'name' => 'required|min:3|max:40',
            'active' => 'boolean',
            'unit_id' => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'active' => false,
            'unit_id' => $unitId
        ]);


        return to_route('dashboard.menu.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia::render('Admin/Menu', [
            'categoryForEdit' => Category::where('id', $id)->first(),
            'categories' => Category::all()
            
        ]);
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


        $request->validate([
            'name' => 'required|string|min:3', 
        ]);

        $categoryFound->name = $request->name;
        $categoryFound->save();
        
        return to_route('dashboard.menu.index');
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
