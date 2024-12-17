<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index()
    {
       $products = product::all();
       $brands=[];
       $array=[];
      foreach($products as $product){

          $brands=$product->brands;

          $array[]=['productName'=>$product->name,'sku'=>$product->sku,'productLocation'=>$product->location,'productUnitPrice'=>$product->unitPurchasePrice,
              'brandName'=>$brands->name,'productId'=>$product->id,'unit'=>$product->units->name];

      }


        return response()->json(['Products'=>$array]);
    }

    public function getProducts()
    {
        $products = product::all();
        $units=[];

        foreach($products as $product){
            $units=$product->units->pluck('name');

        }

        $names=Product::all()->pluck('name');
        return response()->json(
            ["Units"=>$units,"productNames"=>$names]);


    }
    //
}
