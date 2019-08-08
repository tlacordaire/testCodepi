<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Feature;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::with('categories', 'features')->get()]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all(), 'features' => Feature::all()]);
    }
    
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        
        $product->categories()->sync($request->get('categories'));
        $product->features()->sync($request->get('features'));
        
        return redirect('/product/create')->with('status', 'Le produit "'.$request->name.'" a été ajouté!');
    }
    
    public function edit(Product $id)
    {
        return view('products.edit', ['product' => Product::with('categories', 'features')->whereIn('id', $id)->first(), 'categories' => Category::all(), 'features' => Feature::all()]);
    }
    
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->save();
        
        // On ajoute aux pivots les valeurs
        $product->categories()->sync($request->get('categories'));
        $product->features()->sync($request->get('features'));
        
        return redirect('/products')->with('status', 'Le produit "'.$request->name.'" a été modifié!');
    }
    
    /**
     * @param Product $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Cette fonction permet de supprimer le produit de manière softDelete
     */
    public function delete(Product $id)
    {
        $product = Product::find($id)->first();
        $product->delete();
        
        return redirect('/products')->with('status', 'Le produit a été supprimé!');
    }
}
