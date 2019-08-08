<?php

namespace App\Http\Controllers;

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
    
    public function store(Request $request)
    {
        Category::create($request->all());
        
        // On utilise Carbon pour l'affichage des dates
        Carbon::setLocale('fr');
        
        return redirect('/category/create')->with('status', 'La catégorie "'.$request->name.'" a été ajoutée!');
    }
    
    public function edit(Category $id)
    {
        return view('categories.edit', ['category' => Category::findorFail($id)->first()]);
    }
    
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        
        return redirect('/categories')->with('status', 'La catégorie "'.$request->name.'" a été modifiée!');
    }
    
    public function createJquery(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json(['id'=>$category->id, 'name'=>$category->name]);
    }
}
