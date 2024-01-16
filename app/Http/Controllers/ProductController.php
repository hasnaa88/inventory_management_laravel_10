<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       // Fetch products with pagination
       $product = Product::latest()->paginate(5); // You can adjust the number of items per page (e.g., 10)

    // Pass the paginated products to the view
    return view('products.index', ['product' => $product]);
    
        //return view('products.index', compact('product'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('products.create', compact('categories'));
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
            $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'product_code' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
            ]);
        
            Product::create($request->all());
        
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
  
        return view('products.show', compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // Existing validation rules...
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($request->all());
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
  
        $product->delete();
  
        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
}