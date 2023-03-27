<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RuleNhapForm;
use App\Models\Category;

class CategoryController extends Controller
{
    public function manageCategory()
    {
        $data = Category::all();
        return view('category.category', ['data' => $data]);
    }
    public function createCategory()
    {
        return view('category.create-category');
    }


    public function saveCategory(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $data = $request->all();
        $category = new Category();
        $category->name = $data['name'];
        $category->parent_id = 0;
        $category->status = 1;
        $category->save();

        return redirect()->route('manageCategory');
    }

    public function disableCategory($id)
    {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return redirect()->route('manageCategory');
    }

    public function enableCategory($id)
    {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        return redirect()->route('manageCategory');
    }

    public function editCategory($id)
    {
        $record = Category::where('id', $id)->first();

        return view('category.edit-category', ['record' => $record]);
    }

    public function saveEditCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => ['required', 'string'],
        ]);

        $data = $request->all();
        $category->name = $data['name'];
        $category->update();
        return redirect()->route('manageCategory');
    }
}
