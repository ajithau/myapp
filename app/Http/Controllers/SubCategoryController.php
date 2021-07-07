<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use DB;

class SubCategoryController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $subcategories = Subcategory::get();
    return view('subcategories.index', ['subcategories' => $subcategories]);
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    $categories = DB::table('categories')->get();

    return view('subcategories.create', ['categories' => $categories]);
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
    ]);

    Subcategory::create($request->all());

    return redirect()->route('subcategories.index')->with('success','category created successfully.');
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy(Subcategory $subcategory)
{
    $subcategory->delete();

    return redirect('/subcategories');

}
}
