<?php

namespace App\Http\Controllers;

use App\Models\productfeature;
use Illuminate\Http\Request;

class ProductfeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $pro=new product();
        $pro->productname=$request->productname;
        $pro->rate=$request->productrate;
        $pro->category=$request->category;
        $pro->colors=$request->colors;
         $pro->productdescription=$request->description;
         //$pro->features=$request->features;
         $pro->save();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productfeature  $productfeature
     * @return \Illuminate\Http\Response
     */
    public function show(productfeature $productfeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productfeature  $productfeature
     * @return \Illuminate\Http\Response
     */
    public function edit(productfeature $productfeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productfeature  $productfeature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productfeature $productfeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productfeature  $productfeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(productfeature $productfeature)
    {
        //
    }
}
