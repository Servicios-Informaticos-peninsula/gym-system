<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\CategoryProduct;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\Provider;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;

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
            $producto = Product::create([
                'bar_code' => $request->bar_code,
                'name' => $request->product_name,
                'product_units_id' => $request->product_unit != null ? $request->product_unit : null,
                'description' => $request->product_description != null ? $request->product_description : null,
                'providers_id' => $request->providers_id != null ? $request->providers_id : null,
                'requireInventory' => $request->requireInventory != null ? 1 : 0,
                'category_products_id' => $request->product_category,
            ]);
            if ($producto->requireInventory == false || $producto->requireInventory == 0) {
                Inventory::create([
                    'products_id' => $producto->id,
                    'quantity' => 0,
                    'minimum_alert' => 0,
                    'maximun_alert' => 0,
                    'purchase_price' => 0,
                    'sales_price' => $request->sales_price,
                    'asigned_by' => Auth::id(),
                    'status' => $request->status,
                ]);
            }


            return redirect()
                ->back()
                ->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()
                ->back()
                ->with('error', 'Hubo un problema!');
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
                'bar_code' => $request->bar_code,
                'name' => $request->product_name,
                'product_units_id' => $request->product_unit,
                'description' => $request->product_description,
                'providers_id' => $request->providers_id,
                'requireInventory' => $request->requireInventory != null ? 1 : 0,
                'category_products_id' => $request->product_category,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Actualización Éxitosa!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e);
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

            return redirect()
                ->back()
                ->with('success', 'Eliminación Éxitosa!');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e);
        }
    }
}
