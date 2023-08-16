<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
class ProductController extends Controller

{

public static $products = [

["id"=>"1", "name"=>"Game", "description"=>"Best Game","price"=>"250","img"=>"game.png"],

["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone","price"=>"300","img"=>"safe.png"],

["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast","price"=>"100","img"=>"submarine.png"],

["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses","price"=>"50","img"=>"glasses.png"]

];

public function index(): View

{
$viewData = [];
$viewData["title"] = "Products - Online Store";
$viewData["subtitle"] = "List of products";
$viewData["products"] = ProductController::$products;
return view('products.index')->with("viewData", $viewData);
}

public function show(string $id)

{

$viewData = [];


try {
    $product = ProductController::$products[$id-1];
    $viewData["title"] = $product["name"]." - Online Store";
    $viewData["subtitle"] = $product["name"]." - Product information";
    $viewData["product"] = $product;
    return view('products.show')->with("viewData", $viewData);

} catch (\Throwable $e) {
    report($e);
    return redirect()->route('home.index');
}



}
public function create(): View

{

$viewData = []; //to be sent to the view

$viewData["title"] = "Create product";

return view('products.create')->with("viewData",$viewData);

}

public function save(Request $request)

{
$viewData = [];
$request->validate([
"name" => "required",
"description" => "max:120",
"price" => "required|gt:0"
]);

//dd($request->all()); => dump and die, muestra la info para debugerar y mata procesos?, si mata la ejecucion del script
$viewData["title"] = "Creating product: ".$request["name"] ;
$viewData["subtitle"] = "Creation status";
$viewData["header"] = "Created,Well Done!";
$viewData["message"] ="You successfully created the product ".$request["name"]." with the following price: ".$request["price"];
$viewData["description"]= "This is the product description: ".$request["description"];

return view('products.success')->with("viewData", $viewData);


//here will be the code to call the model and save it to the database

}

}
