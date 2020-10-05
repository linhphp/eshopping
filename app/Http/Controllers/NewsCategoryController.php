<?php

namespace App\Http\Controllers;

use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = NewsCategory::paginate(5);
        return view('admin.newsCategory.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.newsCategory.create');
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
        $data = new NewsCategory;
        $data->name = ucwords($request->name);
        $data->slug = Str::slug($request->name,'-');
        $data->save();
        return redirect()->back()->with('massege','lưu thể loại bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory,$id)
    {
        //
        $data = NewsCategory::find($id);
        return view('admin.newsCategory.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsCategory $newsCategory,$id)
    {
        //
        $data = NewsCategory::find($id);
        $data->name = ucwords($request->name);
        $data->slug = Str::slug($request->name,'-');
        $data->save();
        return redirect()->back()->with('massege','sửa tên thể loại bài viết thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsCategory $newsCategory,$id)
    {
        //
        NewsCategory::where('id',$id)->delete();
        // NewsCategory::withTrashed()->where('id',2)->restore();
        return redirect()->back()->with('massege','xoá thể lại bài viết thành công');
    }
}
