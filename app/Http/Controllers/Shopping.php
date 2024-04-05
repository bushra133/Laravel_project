<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
// API 
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;

class Shopping extends Controller
{
    //
    public function ShowListItems(Request $request)
    {
        $data = DB::table('products')
        ->join('product_details','products.id','=','product_details.ProductId')
        ->get();
        
        $tax=15/100;
        $descount = 10;

        foreach($data as $key=> $row)
        {
            $data[$key]->total = ($data[$key]->Price*$tax)+$data[$key]->Price;
            $data[$key]->descount = $descount;
            $data[$key]->tax = $tax;
            $data[$key]->net = $data[$key]->total-$data[$key]->descount;
        }

        return view('shopping.list-items',['data'=>$data]);
    }

    public function ShowItemDetails($id)
    {
        $data = DB::table('products')
        ->join('product_details','products.id','=','product_details.ProductId')
        ->where('product_details.id','=',$id)
        ->first();

        $tax=15/100;
        $descount = 10;


        $data->total = ($data->Price*$tax)+$data->Price;
        $data->descount = $descount;
        $data->tax = $tax;
        $data->net = $data->total-$data->descount;

        return view('shopping.details',['data'=>$data]);
    }
    public function AddToCart(Request $request,$id)
    {
        $userId = $request->user()->id; // get current user id
        $data = DB::table('products')
        ->join('product_details','products.id','=','product_details.ProductId')
        ->where('product_details.id','=',$id)
        ->first();

        $tax=15/100;
        $descount = 10;

        $data->total = ($data->Price*$tax)+$data->Price;
        $data->descount = $descount;
        $data->tax = $tax;
        $data->net = $data->total-$data->descount;

        $row = [
            'ProductId'=>$data->id,
            'Price'=>$data->Price,
            'Qty'=>$data->Qty,
            'Tax'=>$data->tax,
            'Total'=>$data->total,
            'Desc'=>$data->descount,
            'Net'=>$data->net,
            'UserId'=>$userId
        ];
        DB::table('carts')->insert($row);

        $count = DB::table('carts')
        ->where('UserId','=',$userId)
        ->count();

        Session::put('count',$count);
        return redirect()->back();
    }
    public function GetHotCafe()
    {
        $response = Http::get('https://api.sampleapis.com/coffee/hot');
        

       // return Response()->json([
        //    'response'=>$response->object()
        //]);

        return view('shopping.cafe',['data'=>$response->object()]);
    }
    public function Cart()
    {
        $data = DB::table('carts')
        ->join('product_details', 'carts.ProductId', '=', 'product_details.id')
        ->select('carts.id','carts.ProductId', 'carts.Price', 'carts.Qty', 'carts.Tax','carts.Total','carts.Desc','carts.Net','product_details.image')
        ->get();
        
        return view('shopping.cart',['products'=>$data]);
    }

    public function DeleteFromCart($id)
    {
     $product = Cart::find($id);
     $product->delete();
     $count = Session::get('count');   
     $count = $count - 1;
     $count = Session::put('count',$count);
   
     return redirect('/shopping/cart');   
    }
    

}
