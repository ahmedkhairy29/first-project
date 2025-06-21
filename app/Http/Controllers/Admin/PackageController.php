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
    $features = $package->features; // علاقة one-to-many
    return view('admin.packages.features', compact('package', 'features'));
}

public function storeFeature(Request $request, Package $package)
{
    $request->validate(['name' => 'required|string|max:255']);

    $package->features()->create([
        'name' => $request->name,
    ]);

    return back()->with('success', 'Feature added successfully.');
}

public function deleteFeature(Package $package, Feature $feature)
{
    $feature->delete();
    return back()->with('success', 'Feature deleted.');
}

}
