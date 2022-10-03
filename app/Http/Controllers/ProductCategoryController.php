<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\CategoryProduct;
use Exception;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = CategoryProduct::paginate(20);

        return view('Product-category.index', compact('productCategories'));
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
    public function store(ProductCategoryRequest $request)
    {
        try {
            CategoryProduct::create([
                'name' =>  $request->category_name,
                'description' => $request->category_description
            ]);

            return redirect()->back()->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
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
    public function update(ProductCategoryRequest $request, $id)
    {
        try {
            CategoryProduct::find($id)->update([
                'name' =>  $request->category_name,
                'description' => $request->category_description
            ]);

            return redirect()->back()->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
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
            CategoryProduct::find($id)->delete();

            return redirect()->back()->with('success', 'Registro Éxitoso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }
}
