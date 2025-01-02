<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories= Categories::all();

        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store( CategoryFormRequest $request)
    {
        $data =$request->validated();
        $categories= new Categories;

        $categories->name=$data['name'];
        
         if ($request->hasFile('image')) {

            $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/categories'), $fileName);

        $categories->image = 'uploads/categories/' . $fileName;
    }


    $categories->save();


    return redirect('admin/category')->with('message', 'Category added successfully!');
}
public function edit($category_id)
{
    $category= Categories::find($category_id);
    return view('admin.categories.edit',compact('category'));
}

public function update(CategoryFormRequest $request,$category_id)
{
     $data =$request->validated();
        $categories= Categories::find($category_id);

        $categories->name=$data['name'];
        
         if ($request->hasFile('image')) {

            $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/categories'), $fileName);

        $categories->image = 'uploads/categories/' . $fileName;
    }


    $categories->update();


    return redirect('admin/category')->with('message', 'update added successfully!');
}
public function destroy($category_id)
{
    try {
        $category = Categories::find($category_id);

        if ($category) {
        
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            
            $category->delete();

            return redirect('admin/category')->with('message', 'Category deleted successfully!');
        } else {
            return redirect('admin/category')->with('message', 'Category not found!');
        }
    } catch (\Exception $e) {
        return redirect('admin/category')->with('message', 'An error occurred: ' . $e->getMessage());
    }
}

}
