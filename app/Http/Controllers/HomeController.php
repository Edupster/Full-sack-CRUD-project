<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Models\Order;


class HomeController extends Controller
{
    //Display the Blade View
    public function home()
    {
        $products = Product::sortable()->paginate(5);
        return view('home',compact('products'));
    }

    public function createOrder()
    {
        $products = Product::sortable()->paginate(5);
        $baskets= Basket::sortable()->paginate(5);
        return view('createOrder',compact('products'),compact('baskets'));
    }

    public function addBasket(Request $request)
    {
        $data = $request->only([
            'item',
            'price']);
        $newBasket = Basket::create($data);
        
        return back();
    }

    public function deleteItem(Basket $basket){
        $basket->delete();
        return back();
    }

    public function checkout()
    {
        $baskets= Basket::sortable()->paginate(5);
        return view('checkout',compact('baskets'));
    }

    public function orders()
    {
        $orders= Order::sortable()->paginate(5);
        return view('orders',compact('orders'));
    }
    
    public function finishOrder(Request $request)
    {
        $data = $request->validate([
            'name' =>  'required',
            'email' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'items' => 'required',
        ]);
        $newOrder = Order::create($data);
        $orders= Order::sortable()->paginate(5);
        Basket::truncate();
        return view('orders',compact('orders'));
    }

    public function cancelHome()
    {
        Basket::truncate();
        
        return redirect('home');
    }

    public function editOrder(Order $order)
    {
        return view('editOrder',['order' => $order]);
    }

    public function updateOrder(Order $order, Request $request)
    {
        $data = $request->validate([
            'name' =>  'required',
            'email' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'items' => 'required'
        ]);
        $order->update($data);
        $orders= Order::sortable()->paginate(5);
        return view('orders',compact('orders'));
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return back();
    }

    public function basket()
    {
        $baskets= Basket::sortable()->paginate(5);
        return view('basket',compact('baskets'));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $products = Product::where('item','LIKE', '%'.$search_text.'%')->orWhere('id','LIKE','%'.$search_text.'%')->get();

        return view('search',compact('products'));
    }

}
