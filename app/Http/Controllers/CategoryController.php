<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

 // Show the form to add a new category
 public function create()
 {
     return view('categories.create');
 }

 // Store a new category
 public function store(Request $request)
 {
     /*$request->validate([
         'name' => 'required|string|max:255|unique:categories',
     ]);*/

     Category::create($request->all());

     return redirect()->route('categories.create')->with('success', 'Category added successfully');
 }

  // Show the form to edit a category
  public function edit(Category $category)
  {
      return view('categories.edit', compact('category'));
  }

  // Update a category
  public function update(Request $request, Category $category)
  {
     /* $request->validate([
          'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
      ]);*/

      $category->update($request->all());

      return redirect()->route('categories.index')->with('success', 'Category updated successfully');
  }

  // Delete a category
  public function destroy(Category $category)
  {
      $category->delete();

      return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
  }
}


