<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->repositoryProduct = new ProductRepository();
    }

    public function index()
    {
        $products = $this->repositoryProduct->index();

        $data = count($products) > 0 ? $products : 'There aren\'t products to display';

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
        return $this->repositoryProduct->show($id);
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
