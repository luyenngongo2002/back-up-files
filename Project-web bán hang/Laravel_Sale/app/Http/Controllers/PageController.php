<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Date;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\Bill;
use App\Models\BillDetail;


use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function index(){
        $slide = Slide ::all();
        $products = Product::simplePaginate();
        $new_products  = Product::where('new', 1)->paginate(4);
        return view('banhang.index', compact('slide','new_products', 'products'));
    }
    
    public function getLoaiSp($type){
        $loai_sp = ProductType::all();
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac =  Product::where ('id_type','<>',$type)->paginate(3);
        return view ('banhang.loai_sanpham',compact('sp_theoloai', 'loai_sp', 'sp_khac'));
    }
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getCheckout(){
        return view('banhang.checkout');
        // return view('layout.trangchu');
    }
    public function postCheckout(Request $request){
        $cart=Session::get('cart');
        
        $customer = new Customer;
        $customer->name=$request->name;
        $customer->gender=$request->gender;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->phone_number=$request->phone;
        $customer->note=$request->notes;
        $customer->save();

        $bill =new Bill;
        $bill->id_customer =$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total= $cart->totalPrice; 
        $bill->payment =$request->payment_method;
        $bill->note=$request->notes;
        $bill->save();

        foreach($cart->items as $key =>$value){
            $bill_detail =new BillDetail;
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product =$key;
            $bill_detail->quantity =$value['qty'];
            $bill_detail->unit_price=($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
        
    }
    public function delItemCart($id){
        $oldCart =Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

}
