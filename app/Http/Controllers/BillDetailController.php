<?php

namespace App\Http\Controllers;

use App\BillDetail;
use App\Bill;
use customer;
use Illuminate\Http\Request;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BillDetail $billDetail,$id)
    {
        //
        $customer = Bill::find($id)->customerBill->toArray();

        $billDetails = BillDetail::join('products','products.id','=','bill_details.product_id')->join('bills','bills.id','=','bill_details.bill_id')->join('customers','customers.id','=','bills.customer_id')->select('products.name','products.promotion_price','bill_details.quantity','bill_details.price','bill_details.id')->where('bills.id','=',$id)->get();
        // dd($billDetails);

        return view('admin.cart.billDetail',compact('billDetails','customer'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BillDetail $billDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillDetail $billDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillDetail  $billDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillDetail $billDetail)
    {
        //
    }
}
