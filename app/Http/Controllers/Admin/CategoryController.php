<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryAddRequest;

class CategoryController extends Controller
{
    public function listCategory(){
        $listCategory = Category::paginate(5);
        return view('admin.Categories.listCategory')
        ->with('listCategory', $listCategory);
    }
    public function addCategory(CategoryAddRequest $req){
        $newCategories = new Category();
        $newCategories -> name = $req -> name;
        $newCategories -> save();

        return redirect()->back()->with(['message' =>'Thêm mới thành công']);
    }

    public function deleteCategory(Request $req){
        $req->validate([
            'id' => 'required',
        ]);
        Category::where('id', $req->id)->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
    public function detailCategory(Request $req){
        $Category = Category::where('id', $req->id)
        ->select('id','name')
        ->first();
        return json_encode($Category);
    }
    public function updateCategory(Request $req){

        $Category = Category::where('id',$req-> idCategory);
            $data = [
                'name' => $req -> name,
            ];
            $Category->update($data);
        return redirect()->back()->with(['message' =>'Chỉnh sửa thành công']);
    }
}
