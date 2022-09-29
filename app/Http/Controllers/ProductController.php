<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        if (count($product->all()->toArray()) > 0) {
            $data = $product->all();
        } else {
            $data = 'there aren\'t products to display';
        }
        return view('product.index', compact('data'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request, Product $product)
    {
        $product->insert([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $data = Product::find($id);
        return $data;
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return view('product.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $product = $this->show($id);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $product = $this->show($id);
        $product->delete();
        return redirect()->route('dashboard');
    }
}
