<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        // lay thong tin san pham
    	$product = Product::find($request->pro_id);
    	$qty = $request->qty;
        // luu thong tin san pham vao trong mang data
    	$data = array('id' => $product->id, 'name' => $product->name, 'qty' =>$qty, 'price' => $product->promotion_price, 'weight' => 550,'options' =>['image' => $product->image]);
        // luu mang data vao trong gio hang    	
    	Cart::add($data);
    	return redirect()->route('showCart');
    }
    public function indexCart()
    {
        // hien thi gio hang
    	$content = Cart::content();
    	
    	return view('homeView.pages.cart',compact('content'));
    }
    public function deleteCart(Request $request)
    {
        // remove Item san pham
    	$rowId = $request->rowId;
    	Cart::remove($rowId);
        // neu khong con san pham trong gio hang thi xoa luon gio hang
    	if(Cart::count() == 0){
    		Cart::destroy();
    	}
    	return redirect()->back();
    }
    //phan thanh toan don hang
    public function getCheckout()
    {
        // kiem tra dang nhap
    	if(Auth::check()){
            
    		$customer = User::find(Auth::id())->customer_user->toArray();
    		
    		//kiem tra dia chi khach hang
    		if(!$customer == null){foreach($customer as $ctm){}}
            //neu khong co thi tra ve null
    		else{$ctm = null;}
            //lay tat ca san pham co trong gio hang
    		$content = Cart::content();
    		return view('homeView.pages.checkout',compact('content','ctm'));
    	}
        // neu chua dang nhap thi tra ve trang login
    	else{return redirect()->route('signUp');}
    }
    public function postCheckout(Request $request)
    {
    	$content = Cart::content();
    	//luu thong tin khach hang
		if(!$request->save == null)
        {
    		$user = new User;
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->password = Hash::make($request->password);
    		$user->save();
    	}
        //xem khach hang do da co dia chi chua?
    	$check = Customer::where('user_id',Auth::id())->first();
    	// neu co dia chi roi thi sua lai
    	if($check)
        {

	    	$customer = Customer::find($check->id);
	    	$customer->name = $request->name;
	    	$customer->email = $request->email;
	    	$customer->address = $request->address;
	    	$customer->phone = $request->phone;
            $customer->brand++;
	    	$customer->save();

    	}
    	//chua co dia chi thi tao moi
    	else
        {
	    	
	    	$customer = new Customer;
            //neu save != null thi tao mot customer moi co user_id == voi id cua user vua moi tao o tren
	    	if(!$request->save == null){$customer->user_id = $user->id;}
            //neu save == null thi tao mot customer moi co user_id == voi id cua user hien tai
	    	else{$customer->user_id = Auth::id();}
            //tien hanh luu du lieu
	    	$customer->name = $request->name;
	    	$customer->email = $request->email;
	    	$customer->address = $request->address;
	    	$customer->phone = $request->phone;
            $customer->brand = 0;
	    	$customer->save();
    	}

    	//luu thong tin hoa don dat hang

    	$bill = new Bill;
    	$bill->customer_id = $customer->id;
    	$bill->total_price = Cart::priceTotal();
        // neu khach hang khong chon phuong thuc thanh toan thi mac dinh la COD
    	if($request->payment == null){$bill->payment = 'COD';}
    	else{$bill->payment = $request->payment;}

    	if($request->note == null){$bill->note = null;}
    	else {$bill->note = $request->note;}

    	$bill->status ='Đang xử lý';
    	$bill->save();
    	// luu thong tin don hang chi tiet
    	// duyet tat ca don hang bang vong lap
    	foreach($content as $cart){

            $billDetail = new BillDetail;
            $billDetail->bill_id = $bill->id;
            $billDetail->product_id = $cart->id;
            $billDetail->name_product = $cart->name;
            $billDetail->quantity = $cart->qty;
            $billDetail->price = ($cart->price)*($cart->qty);
            $billDetail->save();

    	}
    	//ket thuc phan luu don hang
        //sau khii luu thanh cong thi xoa gio hang hien tai di
    	Cart::destroy();
    	return redirect()->back()->with('massege','bạn đã đặt hàng thành công');
    }
    // ket thuc phan luu thong tin dong hang

    //phan theo gioi don hang da dat

    public function cartCheck(){
        // lay thong tin khach hang
    	$customer = Customer::where('user_id',Auth::id())->first();
        //kiem tra xem co ton tai khach hang do khong
    	if($customer){
            // lay ra bills ma khach hang da dat thanh cong
    		$bills = Customer::find($customer->id)->bill->sortByDesc('id')->toArray();
    		return view('homeView.pages.cartCheck',compact('customer','bills'));
    	}
        // truong hop chua tung dat hang
    	return redirect()->route('home')->with('note', 'bạn chưa có đơn hàng nào cả!');
    }
    //hien thi chi tiet don hang
    public function cartShow($id){
        //kiem tra xem kh da dang nhap chua
    	if(Auth::check()){
            //lay thong tin khach hang
    		$customer = Customer::where('user_id',Auth::id())->first();
            //co thong tin
    		if($customer){
                // lay ra tat ca cac san pham da dat thuoc mot bill da tron
	    		$billDetails = Bill::find($id)->billDetail->sortByDesc('id')->toArray();
	    		return view('homeView.pages.cartShow',compact('billDetails','customer'));
    		}
    		

    	}
        // chua dang nhap thi tra ve trang login
    	return redirect()->route('signUp');
    }
}
