<?php

namespace App\Repository\Modules\Category;


use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Repository\Modules\Category\CategoryInterface;


class DBcategory implements CategoryInterface
{
    public function all()
    {
        return Category::orderBy('id', 'DESC')->get();;
    }

    public function create()
    {

        $brands = Brand::all();
        return $data = [
            'brands' => $brands,
        ];
    }

    public function store($request)
    {
        $category = new Category();
        // Uploade image
        if ($request->hasFile('image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/assets/images/categories/', $filename);
            $category->image = $filename;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        // $category->brand_id = $request->brand_id;
        $category->save();
        $cate=Category::find($category->id);
        return $cate->Brands()->syncWithoutDetaching($request->brands_id);

    }


    public function edit($id)
    {
        $category=Category::find($id);
        $brands = Brand::all();
        return $data = [
            'category'=>$category,
            'brands' => $brands,
        ];
    }

    public function update($id, $request)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.all')->with('errors', 'Category Is Not Found')->withInput();
        } else {

            // Uploade image
            if ($request->hasFile('image')) {
                $path = public_path('backend/assets/images/categories/' . $category->image);
                if (File::exists($path)) {
                    File::delete($path);
                }

                $file = $request->image;
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('backend/assets/images/categories/', $filename);
                $category->image = $filename;
            }

            $category->name = $request->name;
            $category->description = $request->description;
            $category->update();
            return $category->Brands()->sync($request->brands_id);
        }
    }

    public function delete($id,$request)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.all')->with('errors', 'Category Is Not Found');
        } else {
                $path = public_path('backend/assets/images/categories/' . $category->image);
                if (File::exists($path)) {
                    File::delete($path);
                }

            $category->delete();
            return redirect()->route('admin.category.all')->with('success', 'Category Deleted Successfully');
        }
    }

    public function getallbrands($request){
        $category=Category::find($request->id);
        return $category->Brands;
    }
}
