<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;

class ProductController extends Controller

{

public static $products = [

["id"=>"1", "name"=>"TV", "description"=>"Best TV"],

["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone"],

["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast"],

["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses"]

];

public function index(): View

{
$viewData = [];
$viewData["title"] = "Products - Online Store";
$viewData["subtitle"] = "List of products";
$viewData["products"] = ProductController::$products;
return view('products.index')->with("viewData", $viewData);
}

public function show(string $id) : View

{

$viewData = [];

$product = ProductController::$products[$id-1];
$viewData["title"] = $product["name"]." - Online Store";

$viewData["subtitle"] = $product["name"]." - Product information";

$viewData["product"] = $product;

return view('products.show')->with("viewData", $viewData);

}
public function create(): View

{

$viewData = []; //to be sent to the view

$viewData["title"] = "Create product";

return view('products.create')->with("viewData",$viewData);

}

public function save(Request $request)

{

$request->validate([

"name" => "required",

"price" => "required"

]);

dd($request->all());

//here will be the code to call the model and save it to the database

}

}
