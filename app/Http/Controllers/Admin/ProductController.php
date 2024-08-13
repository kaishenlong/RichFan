<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ProductAddRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
class ProductController extends Controller
{
    public function listProduct(){
        $listProduct =  Product::with('ProductImage:id,product_id,image_url')->get();
        $listCategory = Category::all();
        return view('admin.products.listProduct')
        ->with(['listProduct' => $listProduct,
         'listCategory' => $listCategory]);
    }
    public function addProduct(ProductAddRequest $req){
             $data = [
                'category_id' => $req -> category_id,
                'name' => $req -> name,
                'price' => $req -> price,
                'description' =>  $req -> description,
            ];
            $product = Product::create($data);
            if ($req -> hasFile('imageProduct')){
                $images = $req -> file('imageProduct');
                foreach($images as $key => $image){
                    $newName = time().'-'.$image ->getClientOriginalName();
                    $image -> move(public_path('imagePro'), $newName);

                    ProductImage::create([
                        'product_id' => $product -> id,
                        'image_url' => 'imagePro/'. $newName,
                        'image_type' => $key == 0 ? 'main' : 'secondary',
                    ]);
            }}
           
           
        return redirect()->back()->with(['message' =>'Thêm mới thành công']);
    }
    public function deleteProduct(Request $req){
        $req -> validate([
            'id' => 'required',
        ]);
        $imageProduct = ProductImage::where('product_id', $req->idProduct)->select('image_url')->get();
        foreach ($imageProduct as $value) {
            File::delete(public_path($value->image_url));
        }
        $product = Product::find($req->id);
        $product->delete();
        return redirect()->back()->with(['message' =>'Xóa thành công']);
    }

    public function detailProduct(Request $req){
        $product = Product::where('id', $req->id)
        ->select('id','category_id','name','price','description')
        ->first();
        return json_encode($product);
     }

     public function updateProduct(ProductEditRequest $req){
        $product = Product::where('id',$req->idProduct);
        $data = [
                'category_id' => $req -> category_id,
                'name' => $req -> name,
                'price' => $req -> price,
                'description' => $req -> description,
            ];
            
            $product->update($data);
            if($req-> hasFile('imageProduct')){
                $images = $req-> file('imageProduct');
                $productImage = ProductImage::where('product_id',$req->idProduct)->select('image_url');
                foreach($productImage ->get() as $value){
                    File::delete(public_path($value->image_url));
                }
                $productImage-> delete();

                foreach($images as $key => $image){
                    $newName = time().'-'.$image ->getClientOriginalName();
                    $image -> move(public_path('imagePro'), $newName);

                    ProductImage::create([
                        'product_id' => $req -> idProduct,
                        'image_url' => 'imagePro/'. $newName,
                        'image_type' => $key == 0 ? 'main' : 'secondary',
                    ]);
                    }
                    
        return redirect()->back()->with(['message' =>'Chỉnh sửa thành công']);
    }}
}
