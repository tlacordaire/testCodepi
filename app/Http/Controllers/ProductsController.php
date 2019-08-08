<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
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
    
    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        $product = Product::create($validated);
        
        $product->categories()->sync($request->get('categories'));
        $product->features()->sync($request->get('features'));

        $request->session()->flash('status', 'Le produit "'.$request->name.'" a été ajouté!');

        return redirect('/product/create');
    }
    
    public function edit(Product $id)
    {
        // TO DO : find a better way to get this product
        //return view('products.edit', ['product' => $id, 'categories' => Category::all(), 'features' => Feature::all()]);
        return view('products.edit', ['product' => Product::with('categories', 'features')->whereIn('id', $id)->first(), 'categories' => Category::all(), 'features' => Feature::all()]);

    }
    
    public function update(UpdateProduct $request)
    {
        $validated = $request->validated();

        $product = Product::find($request->id);
        $product->name = $validated->name;
        $product->save();
        
        // We add to the pivots the values
        $product->categories()->sync($request->get('categories'));
        $product->features()->sync($request->get('features'));

        $request->session()->flash('status', 'Le produit "'.$request->name.'" a été modifié!');

        return redirect('/products');
    }
    
    /**
     * @param Product $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * This function allows you to delete the product in a softDelete
     */
    public function delete(Product $request)
    {
        $product = Product::find($request->id)->first();
        $product->delete();

        $request->session()->flash('status', 'Le produit a été supprimé!');

        return redirect('/products');
    }
}
