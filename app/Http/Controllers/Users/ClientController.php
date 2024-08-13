<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        $listProduct =  Product::with('ProductImage:id,product_id,image_url')->get();
        $categories = Category::with('products.ProductImage:id,product_id,image_url')->get();
        return view('users.home', compact('listProduct', 'categories'));
    }
    public function detailProduct($id){
        $product = Product::with('ProductImage:id,product_id,image_url')->find($id);
        return view('users.detail',compact('product'));
        
    }
    public function detailCategory($id){
        $categories = Category::all();
        $listProduct = Product::with('ProductImage:id,product_id,image_url')->where('category_id',$id)->limit(5)->get();
        return view('users.home', compact('listProduct','categories'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->search;
        $categories = Category::all();
        $listProduct = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
        if ($listProduct->isEmpty()) {
            return redirect()->back()->with(['error' => 'Không tìm thấy sản phẩm nào phù hợp']);
        }
        return view('users.home', compact('listProduct','categories'));
    }
}
