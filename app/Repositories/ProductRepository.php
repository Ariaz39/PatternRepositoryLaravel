<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function index()
    {
        return Product::orderBy('id', 'desc')
            ->get()
            ->toArray();
    }

    public function store($product)
    {
        Product::insert([
            'name' => $product->name,
            'description' => $product->description,
            'created_at' => now()
        ]);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function update($id, $product)
    {
        Product::find($id)
            ->update([
                'name' => $product->name,
                'description' => $product->description,
                'updated_at' => now()
            ]);
    }

    public function destroy($id)
    {
        Product::find($id)
            ->delete();
    }
}
