<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Provider;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate('30');
        $productUnits = ProductUnit::all();
        $productCategories = CategoryProduct::all();
        $providers = Provider::all();

        return view('Products.index', compact('products', 'productUnits', 'productCategories', 'providers'));
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
    public function store(ProductRequest $request)
    {
        try {
            Product::create([
                'name' => $request->product_name,
                'product_units_id' => $request->product_unit,
                'description' => $request->product_description,
                'providers_id' => $request->providers_id,
                'category_products_id' => $request->product_category
            ]);

            return redirect()->back()->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema!');
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
        //
    }

    /**
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
    public function update(ProductRequest $request, $id)
    {
        try {
            Product::find($id)->update([
                'name' => $request->product_name,
                'product_units_id' => $request->product_unit,
                'description' => $request->product_description,
                'providers_id' => $request->providers_id,
                'category_products_id' => $request->product_category
            ]);

            return redirect()->back()->with('success', 'Actualización Éxitosa!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema!');
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
        try {
            Product::find($id)->delete();

            return redirect()->back()->with('success', 'Eliminación Éxitosa!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }
}
