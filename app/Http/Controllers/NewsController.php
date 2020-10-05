<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = News::join('news_categories','news_categories.id','=','news.newsCategory_id')->select('news.*',('news_categories.name as cate_name'))->orderby('id','desc')->paginate(5);
        return view('admin.news.index',compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $cates = NewsCategory::all()->pluck('id','name');
        return view('admin.news.create',compact('cates'));
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
        $data = new News;
        $data->title = $request->title;
        $data->newsCategory_id = $request->cate;
        $data->slug = Str::slug($request->title,'-');
        $data->source = $request->source;
        $data->desc = $request->desc;
        $data->content = $request->content;
        if($request->hasfile('image')){

            $file = $request->file('image');
             if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension('image') == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){

                $file_name = $file->getClientOriginalName('image');
                $file->move('upload/news',$file_name);
                $data->image = $file_name;
             }
        }
        $data->save();
        return redirect()->back()->with('message','lưu bài viết thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news,$id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news,$id)
    {
        //
        $cates = NewsCategory::all()->pluck('id','name');
        $news = News::find($id);
        return view('admin.news.edit',compact('cates','news'));

    }

    /**
     * Update the specified resource in storage.
     *djksods
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news,$id)
    {
        //
        $data = News::find($id);
        $data->title = $request->title;
        $data->newsCategory_id = $request->cate;
        $data->slug = Str::slug($request->title,'-');
        $data->source = $request->source;
        $data->desc = $request->desc;
        $data->content = $request->content;
        if($request->hasfile('image')){

            $file = $request->file('image');
             if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension('image') == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){

                $file_name = $file->getClientOriginalName('image');
                $file->move('upload/news',$file_name);
                $data->image = $file_name;
             }
        }
        $data->save();
        return redirect()->back()->with('message','chỉnh sửa bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news,$id)
    {
        //
        News::where('id',$id)->delete();
        return redirect()->route('bai-viet.index')->with('message','xoá bài viết thành công');
    }
}
