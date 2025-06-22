<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $packages = $query->paginate(5); 
        return view('admin.packages.index', compact('packages'));
    }

   public function features(Package $package)
{
    $features = $package->features; 
    return view('admin.packages.features', compact('package', 'features'));
}
public function create()
{
    return view('admin.packages.create');
}

public function edit(Package $package)
{
    return view('admin.packages.edit', compact('package'));
}

 public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'nullable|string|max:255',
            'Description' => 'required|string|max:255',
            'Description_ar' => 'required|string|max:255',
            'daily' => 'nullable|string|max:255',
            'minute' => 'nullable|integer',
            'type' => 'required|in:free,paid',
        ]);

        Package::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'Description' => $request->Description,
            'Description_ar' => $request->description_ar,
            'daily' => $request->daily,
            'minute' => $request->minute,
            'type' => $request->type,
        ]);

    $package->update($data);

    return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
}



public function deleteFeature(Package $package, Feature $feature)
{
    $feature->delete();
    return back()->with('success', 'Feature deleted.');
}

}
