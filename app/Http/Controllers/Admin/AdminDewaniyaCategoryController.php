<?php

namespace App\Http\Controllers\Admin;

use App\Models\DewaniyaCategory;
use Illuminate\Http\Request;

class AdminDewaniyaCategoryController extends Controller
{
    public function index()
    {
        $categories = DewaniyaCategory::all();
        return view('admin.dewaniya_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.dewaniya_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DewaniyaCategory::create($request->only('name'));

        return redirect()->route('admin.dewaniya_categories.index')->with('success', 'تم إضافة القسم');
    }

    public function edit(DewaniyaCategory $dewaniyaCategory)
    {
        return view('admin.dewaniya_categories.edit', compact('dewaniyaCategory'));
    }

    public function update(Request $request, DewaniyaCategory $dewaniyaCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $dewaniyaCategory->update($request->only('name'));

        return redirect()->route('admin.dewaniya_categories.index')->with('success', 'تم تعديل القسم');
    }

    public function destroy(DewaniyaCategory $dewaniyaCategory)
    {
        $dewaniyaCategory->delete();
        return redirect()->route('admin.dewaniya_categories.index')->with('success', 'تم حذف القسم');
    }
}
