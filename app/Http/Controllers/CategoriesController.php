<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store(StoreCategory $request)
    {
        $validated = $request->validated();

        Category::create($validated);
        
        // On utilise Carbon pour l'affichage des dates
        Carbon::setLocale('fr');

        $request->session()->flash('status', 'La catégorie "'.$request->name.'" a été ajoutée!');

        return redirect('/category/create');
    }
    
    public function edit(Category $id)
    {
        return view('categories.edit', ['category' => Category::findorFail($id)->first()]);
    }
    
    public function update(UpdateCategory $request)
    {
        $validated = $request->validated();

        $category = Category::find($request->id);
        $category->name = $validated['name'];
        $category->save();

        $request->session()->flash('status', 'La catégorie "'.$request->name.'" a été modifiée!');

        return redirect('/categories');
    }
    
    public function createJquery(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json(['id'=>$category->id, 'name'=>$category->name]);
    }
}
