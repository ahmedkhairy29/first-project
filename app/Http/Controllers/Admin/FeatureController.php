<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
   public function index(Package $package) {
    $features = $package->features;
    return view('admin.features.index', compact('package', 'features'));
}
public function create(Package $package)
{
    return view('admin.features.create', compact('package'));
}

public function edit(Feature $feature)
{
    return view('admin.features.edit', compact('feature'));
}

public function store(Request $request, Package $package)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'daily' => 'required|boolean',
        'minute' => 'nullable|integer',
        'type' => 'required|string|max:255',
    ]);

    $package->features()->create([
        'name' => $request->name,
        'daily' => $request->daily,
        'minute' => $request->minute,
        'type' => $request->type,
    ]);

    

    return redirect()->route('admin.features.index', $package->id)
                     ->with('success', 'Feature created successfully.');
}
public function update(Request $request, Feature $feature)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'daily' => 'required|boolean',
        'minute' => 'nullable|integer',
        'type' => 'required|string|max:255',
    ]);

    $feature->update([
        'name' => $request->name,
        'daily' => $request->daily,
        'minute' => $request->minute,
        'type' => $request->type,
    ]);

    return redirect()->route('admin.features.index', $feature->package_id)
                     ->with('success', 'Feature updated successfully.');
}

public function destroy(Feature $feature)
{
    $feature->delete();
    return back()->with('success', 'Feature deleted successfully.');
}


}
