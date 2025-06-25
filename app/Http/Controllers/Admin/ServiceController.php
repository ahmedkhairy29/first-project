<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
       $services = Service::latest()->paginate(5);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
    ]);

    Service::create([
        'title_en' => $request->title_en,
        'title_ar' => $request->title_ar,
        'description_en' => $request->description_en,
        'description_ar' => $request->description_ar,
    ]);

    return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
}




    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

   public function update(Request $request, Service $service)
{
    $request->validate([
        'title_en' => 'required|string|max:255',
        'title_ar' => 'required|string|max:255',
        'description_en' => 'nullable|string',
        'description_ar' => 'nullable|string',
    ]);

    $service->update([
        'title_en' => $request->title_en,
        'title_ar' => $request->title_ar,
        'description_en' => $request->description_en,
        'description_ar' => $request->description_ar,
    ]);

    return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
}

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }
}

