<?php

namespace App\Http\Controllers;
use App\Http\Resources\News as NewsResource;
use Illuminate\Http\Request;
use App\Product;
use App\BrandProduct;
use App\CategoryProduct;
use App\News;
use App\NewsCategory;
use Illuminate\Support\Arr;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = NewsResource::collection(News::inRandomOrder()->Select('news.title','news.image','news.created_at','news.slug')->paginate(3));

        // var_dump($news);
        // echo '<pre>';
        // var_dump($news);        
        // echo '</pre>';
        $products = Product::paginate(8);
        return view('homeView.index',compact('products','news'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        //
         $products = Product::paginate(6);
        return view('homeView.shop',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brand($id)
    {
        //
        $brandProducts = BrandProduct::find($id)->product_br->toArray();
        return view('homeView.pages.brandShop',compact('brandProducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cate($id)
    {
        //
        $categoryProducts = CategoryProduct::find($id)->product_ct->toJson();
        // if($categoryProducts == '[]')
        // {
        //     $categoryProducts = null;
        // }
        // else
        // {
        $categoryProducts = json_decode($categoryProducts);
        // }

        // dd($categoryProducts);
        return view('homeView.pages.cateShop',compact('categoryProducts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $product = Product::find($id);
        $categoryProducts = CategoryProduct::find($product->cate_id)->product_ct->toArray();
        return view('homeView.pages.shopDetail',compact('product','categoryProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $products = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price','like',$request->key)->orWhere('promotion_price','like',$request->key)->get();
        $news = News::where('title','like','%'.$request->key.'%')->get();
        dd($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //phan tin tuc

    public function blog(){
        $news = NewsResource::collection(News::Select('news.title','news.image','news.created_at','news.slug')->orderby('id','desc')->paginate(8));
        // dd($news);
        return view('homeView.pages.blog.blogs',['news' => $news]);
    }

    //phan hien thi tin tuc
    public function blogDetail($slug)
    {
        //
        $blog = News::where('slug',$slug)->first();
        // var_dump($blog);
        $blogRelaed = NewsCategory::find($blog->newsCategory_id)->news->toArray();
        $blogRelaed = Arr::shuffle($blogRelaed);
        return view('homeView.pages.blog.blogDetail',compact('blog','blogRelaed'));
    }
}
