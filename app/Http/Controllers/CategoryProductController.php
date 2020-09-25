<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cates = CategoryProduct::paginate(5);
        return view('admin.category_product.index',compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category_product.create');
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
            ['name' => 'required|unique:category_products,name|min:5|max:100'],
            [
                'name.required' => 'vui lòng nhập tên danh mục',
                'name.unique' => 'tên danh mục đã tồn tại',
                'name.min' => 'tên danh mục tối thiểu 5 ký tự',
                'name.max' => 'tên danh mục tối đa 100 ký tự'
            ]
        );

        CategoryProduct::create(
            [
                'name' => $request->name,
                'desc' => $request->desc
            ]
        );
        return redirect()->back()->with('massege','thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $categoryProduct,$id)
    {
        //
        $cate = CategoryProduct::find($id);
        return view('admin.category_product.edit',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryProduct $categoryProduct,$id)
    {
        //
        $this->validate($request,
            ['name' => 'required|min:5|max:100'],
            [
                'name.required' => 'vui lòng nhập tên danh mục',
                'name.min' => 'tên danh mục tối thiểu 5 ký tự',
                'name.max' => 'tên danh mục tối đa 100 ký tự'
            ]
        );

        $data = CategoryProduct::find($id);
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->save();
        return redirect()->back()->with('massege','sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryProduct $categoryProduct,$id)
    {
        //
        CategoryProduct::destroy($id);
        return redirect()->route('danh-muc-san-pham.index');
    }
}
