<?php

namespace App\Http\Controllers\Admin;

use App\Models\DewaniyaCategory;
use App\Models\DewaniyaSubCategory;
use Illuminate\Http\Request;

class AdminDewaniyaSubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = DewaniyaSubCategory::with('category')->get();
        return view('admin.dewaniya_sub_categories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = DewaniyaCategory::all();
        return view('admin.dewaniya_sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dewaniya_category_id' => 'required|exists:dewaniya_categories,id',
        ]);

        DewaniyaSubCategory::create($request->only('name', 'dewaniya_category_id'));

        return redirect()->route('admin.dewaniya_sub_categories.index')->with('success', 'تم إضافة القسم الفرعي');
    }

    public function edit(DewaniyaSubCategory $dewaniyaSubCategory)
    {
        $categories = DewaniyaCategory::all();
        return view('admin.dewaniya_sub_categories.edit', compact('dewaniyaSubCategory', 'categories'));
    }

    public function update(Request $request, DewaniyaSubCategory $dewaniyaSubCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dewaniya_category_id' => 'required|exists:dewaniya_categories,id',
        ]);

        $dewaniyaSubCategory->update($request->only('name', 'dewaniya_category_id'));

        return redirect()->route('admin.dewaniya_sub_categories.index')->with('success', 'تم تعديل القسم الفرعي');
    }

    public function destroy(DewaniyaSubCategory $dewaniyaSubCategory)
    {
        $dewaniyaSubCategory->delete();
        return redirect()->route('admin.dewaniya_sub_categories.index')->with('success', 'تم حذف القسم الفرعي');
    }
}
