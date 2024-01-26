<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Mail\LowStockEmail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'brand' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for image
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $data['image'] = $imagePath;
        }

        Product::create($data);




        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    public function create()
    {
        return view('products.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'brand' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->save('product_images', 'public');
            $data['image'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'nullable',
            'brand' => 'nullable',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the existing image file
            Storage::disk('public')->delete($product->image);

            // Upload the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete the associated image file
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }



}
