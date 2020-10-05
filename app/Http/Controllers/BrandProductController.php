<?php

namespace App\Http\Controllers;

use Config;
use App\BrandProduct;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandProductController extends Controller
{

    public function index()
    {
        //
        $brands = BrandProduct::paginate(Config::get('paginate.fives'));
        return view('admin.brand_product.index',compact('brands'));
    }

    public function create()
    {
        //
        return view('admin.brand_product.create');
    }

    public function store(BrandRequest $request)
    {
        //
        BrandProduct::create(
            [
                'name' => $request->name
            ]
        );
        return redirect()->back()->with('massege','thêm thương hiệu thành công');
    }

    public function show(BrandProduct $brandProduct)
    {
        //
    }

    public function edit(BrandProduct $brandProduct,$id)
    {
        //
        $brand = BrandProduct::find($id);
        return view('admin.brand_product.edit',compact('brand'));
    }

    public function update(BrandRequest $request, BrandProduct $brandProduct,$id)
    {
        //
        $brandProduct = BrandProduct::find($id);
        $brandProduct->name = $request->name;
        $brandProduct->save();
        return redirect()->back()->with('massege','sửa thương hiệu thành công');
    }

    public function destroy(BrandProduct $brandProduct,$id)
    {
        //
        BrandProduct::destroy($id);
        return redirect()->back();
    }
}
