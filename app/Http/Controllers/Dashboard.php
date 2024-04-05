<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


// package DB: يجب تضمينه اذا بغينا نستخدمه -> يتصل بالداتابيس حتى بدون مودل أو ماقريشن
use Illuminate\Support\Facades\DB;
// يجب تضمين المودل
use App\Product;
use App\ProductDetails;

class Dashboard extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
       Session::put('data','Welcome To tuwaiq');
       Cookie::queue('Cooki','this is my cookies',60);
        return view('dashboard.index');    
    } 
    public function test()
    {
        $data = DB::select('select * from products');

        //$data = DB::table('products')->get();
        return Response()->json($data);
    }

    // read product
    public function GetProducts(Request $request)
    {
        if ($request->has('ProductName')) {
            // Search products
            $products = Product::where('ProductName', 'like', '%' . $request->ProductName . '%')->get();
            $value = true;
        } else {
            // Get all products
            $products = Product::all();
            $value = false; 
        }
        return view('dashboard.products', ['products' => $products, 'searched' => $value]);

    }
/*
    public function GetProducts()
    {
        $products = Product::all();
        return view('dashboard.products',['products'=>$products]);
        

    }*/
    public function CreateProduct(Request $request)
    {

        $validate = $request->validate([
            // any role
            'ProductName'=>'required',
        ]);

        $products = Product::create([
            'ProductName'=>$request->ProductName
        ]);

        $products->save();
        
        return redirect('/dashboard/products');
    }
    public function DeleteProduct($id)
    {
     $product = Product::find($id);
     $product->delete();

     return redirect('/dashboard/products');   
    }
    public function EditProduct($id)
    {
        $product = Product::find($id);
        return view('dashboard.edit',['product'=>$product]);

    }
    public function UpdateProduct(Request $request)
    {

        $product = Product::where('id', $request->id)->update([
            'ProductName'=> $request->ProductName,
        ]);
        
       return Redirect('/dashboard/products');
    }
    public function Search(Request $request)
    {
        //$product = Product::where('ProductName', $request->ProductName)->get();
        $product = Product::where('ProductName','like','%'.$request->ProductName.'%')->get();
        $value = true;
        return view('dashboard.products',['products'=>$product, 'searched'=>$value]);

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function GetProductsDetails(Request $request)
{
    if ($request->has('ProductName')) {
        // Search products by ProductName
        $productsDetails = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.ProductId')
            ->select('product_details.id', 'products.ProductName', 'product_details.Color', 'product_details.Price', 'product_details.Qty', 'product_details.Description')
            ->where('products.ProductName', 'like', '%' . $request->ProductName . '%')
            ->get();
        $products = Product::where('ProductName', 'like', '%' . $request->ProductName . '%')->get();
        $value = true;
    } else {
        // Get all products
        $products = Product::all();
        $productsDetails = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.ProductId')
            ->select('product_details.id', 'products.ProductName', 'product_details.Color', 'product_details.Price', 'product_details.Qty', 'product_details.Description')
            ->get();
        $value = false;
    }

    return view('dashboard.productsDetails', ['productsDetails' => $productsDetails, 'products' => $products,'searched'=>$value]);
}
    public function CreateProductDetails(Request $request)
    {  
        $validate = $request->validate([
            // any role
            'color'=>'required|max:8',
            'price'=>'required',
            'qty'=>'required|numeric',
            'description'=>'required|string|max:255',

        ]);
       $productsDetails = ProductDetails::create([
            
           'Color'=>$request->color,
            'Price'=>$request->price,
           'Qty'=>$request->qty,
            'Description'=>$request->description,
            'ProductId'=>$request->product

        ]);

        $productsDetails->save();
        
        return redirect('/dashboard/productsDetails');
    }

    public function DeleteProductDetails($id)
    {
     $product = ProductDetails::find($id);
     $product->delete();

     return redirect('/dashboard/productsDetails');   
    }

    public function EditProductDetails($id)
    {
        $products = Product::all();
        $productDetails = ProductDetails::find($id);

        return view('dashboard.editDetails',['productsDetails'=>$productDetails, 'products'=>$products]);

    }
    public function UpdateProductDetails(Request $request)
    {
        
        $product = ProductDetails::where('id', $request->id)->update([
            'Color'=> $request->color,
            'Price'=>$request->price,
            'Qty'=>$request->qty,
            'Description'=>$request->description,
            'ProductId'=> $request->product,
        ]);
        
       return Redirect('/dashboard/productsDetails');
    }

}
