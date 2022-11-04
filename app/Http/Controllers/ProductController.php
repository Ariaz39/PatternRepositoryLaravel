<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->repositoryProduct = new ProductRepository();
    }

    public function index()
    {
        $products = $this->repositoryProduct->index();

        if (count($products) > 0) {
            $data = $products;
        } else {
            $data = 'There aren\'t products to display';
        }

        return view('product.index', compact('data'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->repositoryProduct->store($request);
        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $data = $this->repositoryProduct->show($id);
        return $data;
    }

    public function edit($id)
    {
        $data = $this->show($id);
        return view('product.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->repositoryProduct->update($id, $request);
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $this->repositoryProduct->destroy($id);
        return redirect()->route('dashboard');
    }
}
