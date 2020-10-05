<?php

namespace App\Http\Controllers;
use App\CategoryProduct;
use App\BrandProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(5);
        // $brands = ;
        // $cates = ;
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cates = CategoryProduct::all()->pluck('id','name');
        $brands = BrandProduct::all()->pluck('id','name');
        return view('admin.product.create',compact('cates','brands'));
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
        $data = new Product;
        $data->name = $request->name;
        $data->cate_id = $request->cate;
        $data->brand_id = $request->brand;
        $data->desc = $request->desc;
        $data->content = $request->content;
        $data->unit_price = $request->unit_price;
        $data->promotion_price = $request->unit_price-(($request->unit_price*$request->promotion)/100);
        $data->status = $request->status;
        $data->quantity = 1;

        // lay hinh anh
        //b1 kiem tra xem da up file len chua
        if($request->hasfile('image')){
        //b2 luu file vao bien file
            $file = $request->file('image');
        //3 kiem tra xem do co phai file anh hay khong
            if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension('image') == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){
        // b4 neu la file anh thi lay ra ten cua file do
                $file_name = $file->getClientOriginalName('image');
        //b5 luu file vao folder upload/product
                $file->move('upload/product',$file_name);
        //b6 luu ten file vao trong database
                $data->image = $file_name;
            }
        //neu khong phai anh thi de bang null
            else {
                $data->image = 'null';
            }
        //neu khong co file nao duoc upload thi de la null
        }
        else {
            $data->image = 'null';
        }
        
        $data->save();
        return redirect()->back()->with('message', 'Thêm sản phẩm thành công');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        //
        $cates = CategoryProduct::all()->pluck('id','name');
        $brands = BrandProduct::all()->pluck('id','name');
        $product = Product::find($id);
        return view('admin.product.edit',compact('cates','brands','product'));

    }
    //an va hien thi san pham

    public function unActive($id){
        $data = Product::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }
    public function active($id){
        $data = Product::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();   
    }

    //ket thuc phan an hien thi san pham

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {
        //
        $data = Product::find($id);
        $data->name = $request->name;
        $data->cate_id = $request->cate;
        $data->brand_id = $request->brand;
        $data->desc = $request->desc;
        $data->content = $request->content;
        $data->unit_price = $request->unit_price;
        $data->promotion_price = $request->unit_price-(($request->unit_price*$request->promotion)/100);
        $data->status = $request->status;
        $data->quantity = 1;

        // lay hinh anh
        if($request->hasfile('image')){

            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension('image') == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){
                $file_name = $file->getClientOriginalName('image');
                $file->move('upload/product',$file_name);
                $data->image = $file_name;
            }
            //khong co anh thi khong lam gi het
        }
        $data->save();
        return redirect()->back()->with('message', 'sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        //
        Product::destroy($id);
        return redirect()->route('san-pham.index');
    }
}
