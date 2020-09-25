<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use Illuminate\Http\Request;

class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = BrandProduct::paginate(5);
        return view('admin.brand_product.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brand_product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
            ['name' => 'required|unique:brand_products,name|min:3|max:100'],
            [
                'name.required' => 'vui lòng nhập tên thương hiệu',
                'name.unique' => 'tên thương hiệu đã tồn tại',
                'name.min' => 'tên danh mục tối thiểu 5 ký tự',
                'name.max' => 'tên danh mục tối đa 100 ký tự'
            ]
        );

        BrandProduct::create(
            [
                'name' => $request->name,
                'desc' => $request->desc
            ]
        );
        return redirect()->back()->with('massege','thêm thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandProduct  $brandProduct
     * @return \Illuminate\Http\Response
     */
    public function show(BrandProduct $brandProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandProduct  $brandProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandProduct $brandProduct,$id)
    {
        //
        $brand = BrandProduct::find($id);
        return view('admin.brand_product.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandProduct  $brandProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandProduct $brandProduct,$id)
    {
        //
        $this->validate($request,
            ['name' => 'required|min:5|max:100'],
            [
                'name.required' => 'vui lòng nhập tên thương hiệu',
                'name.min' => 'tên danh mục tối thiểu 5 ký tự',
                'name.max' => 'tên danh mục tối đa 100 ký tự'
            ]
        );

        $data = BrandProduct::find($id);
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->save();
        return redirect()->back()->with('massege','sửa thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandProduct  $brandProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandProduct $brandProduct,$id)
    {
        //
        BrandProduct::destroy($id);
        return redirect()->back();
    }
}
