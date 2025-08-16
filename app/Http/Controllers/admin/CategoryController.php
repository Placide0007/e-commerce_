<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::where('category_name', 'like', "%$search%")->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $category_request)
    {
        try {
            Category::create([
                'category_name' => ucfirst($category_request->category_name),
            ]);

            return redirect()->route('categories.index')->with('status', 'categorie cree avec succees');
            
        } catch (\Throwable $th) {
            return back()->withErrors([
                'category_name' => 'Erreur lors de la création de la catégorie',
            ])->withInput();
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => ['required', 'string', 'max:20', Rule::unique('categories')->ignore($category->id)],
        ]);

        $category->category_name = ucfirst($request->input('category_name'));

        $category->save();

        return redirect()->route('categories.index')->with('status', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories.index')->with('status', 'Catégorie supprimée avec succès');

    }
}
