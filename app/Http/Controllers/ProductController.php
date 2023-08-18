<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('products.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {

        $viewData = [];

        try {
            $product = Product::findOrFail($id);
            $viewData['title'] = $product['name'].' - Online Store';
            $viewData['subtitle'] = $product['name'].' - Product information';
            $viewData['product'] = $product;

            return view('products.show')->with('viewData', $viewData);

        } catch (\Throwable $e) {
            report($e);

            return redirect()->route('home.index');
        }

    }

    public function create(): View
    {

        $viewData = []; //to be sent to the view

        $viewData['title'] = 'Create product';

        return view('products.create')->with('viewData', $viewData);

    }

    public function save(Request $request): View
    {
        $viewData = [];
        $request->validate([
            'name' => 'required',
            'description' => 'max:120',
            'price' => 'required|gt:0',
        ]);
        Product::create($request->only(['name', 'price']));
        //dd($request->all()); => dump and die, muestra la info para debugerar y mata procesos?, si mata la ejecucion del script
        $viewData['title'] = 'Creating product: '.$request['name'];
        $viewData['subtitle'] = 'Creation status';
        $viewData['header'] = 'Created,Well Done!';
        $viewData['message'] = 'You successfully created the product '.$request['name'].' with the following price: '.$request['price'];

        return view('products.success')->with('viewData', $viewData);

        //here will be the code to call the model and save it to the database

    }
}
