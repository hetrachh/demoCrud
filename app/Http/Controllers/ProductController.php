<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all data
        echo 'All Products';
        $products = Product::all();
//        return $products;
        $response = APIHelpers::createAPIResponse(false,200,'',$products);
        return  response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        //to save products
        $product = new Product;
        $product->product_name = $request->name;
        $product->product_desc = $request->desc;
        $product->product_price = $request->price;
        $product_save = $product->save();

        if($product_save)
        {
            $response = APIHelpers::createAPIResponse(false,201,'Product Added',null);
            return  response()->json($response,201);
        }
        else{
            $response = APIHelpers::createAPIResponse(true,400,'Product creation Failed',null);
            return  response()->json($response,400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetch single daata
        echo 'single product';
        $products  = Product::find($id);
        $response = APIHelpers::createAPIResponse(false,200,'',$products);
        return  response()->json($response,200);
    }

    /**
     * http://127.0.0.1:8000/api/products/2
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update product
        $product = Product::find($id);
        $product->product_name = $request->name;
        $product->product_desc = $request->desc;
        $product->product_price = $request->price;
        $product_save = $product->save();

        if($product_save)
        {
            $response = APIHelpers::createAPIResponse(false,200,'Product Updated',null);
            return  response()->json($response,200);
        }
        else{
            $response = APIHelpers::createAPIResponse(true,400,'Product Update Failed',null);
            return  response()->json($response,400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete data
        $product  = Product::find($id);
        $product_save = $product->delete();
        if($product_save)
        {
            $response = APIHelpers::createAPIResponse(false,200,'Product Delete',null);
            return  response()->json($response,200);
        }
        else{
            $response = APIHelpers::createAPIResponse(true,400,'Product Delete Failed',null);
            return  response()->json($response,400);
        }
    }
}
