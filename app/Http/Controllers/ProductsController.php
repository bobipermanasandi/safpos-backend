<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Products;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $data = Products::select(['id', 'images', 'name', 'category', 'stock', 'price'])->orderBy('created_at', 'desc');

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('images', function($row) {
                        if ($row->images) {
                            $url = asset('storage/products/' . $row->images);
                            return '<img src="'.$url.'" class="img-thumbnail"/>';
                        } else {
                            return '<span class="badge bg-danger">No Image</span>';
                        }
                    })
                    ->editColumn('stock', function($row) {
                        if($row->stock <= 10) {
                            return '<div class=text-danger>'.$row->stock.'</div>';
                        }else {
                            return $row->stock;
                        }
                    })
                    ->addColumn('action', function($row){

                            $btn = "<div class=\"d-flex justify-content-center\">
                                        <a href=".route('products.edit', $row->id) ."
                                            class=\"btn btn-sm btn-info btn-icon\">
                                            <i class=\"fas fa-edit\"></i>
                                            Edit
                                        </a>

                                        <button class=\"btn btn-sm btn-danger btn-icon delete-user ml-2\" data-id=\"$row->id\"><i class=\"fas fa-times\"></i> Delete</button>
                                    </div>";

                            return $btn;
                    })
                    ->rawColumns(['images','stock','action'])
                    ->make(true);
        }
        return view('pages.products.index');
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(StoreProductRequest $request)
    {

        $filename = time() . '.' . $request->images->extension();
        $request->images->storeAs('products', $filename);
        $data = $request->all();

        $product = new Products;
        $product->name = $request->name;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category = $request->category;
        $product->images = $filename;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product successfully created');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);

        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $product = Products::findOrFail($id);

        if($request->hasFile('images')) {

            Storage::delete('products/'. $product->images);

            $filename = time() . '.' . $request->images->extension();
            $request->images->storeAs('products', $filename);
            $product->images = $filename;
            $product->save();
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product successfully updated');
    }

    public function destroy(Products $product) {

        Storage::delete('products/'. $product->images);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product successfully deleted');
    }
}
