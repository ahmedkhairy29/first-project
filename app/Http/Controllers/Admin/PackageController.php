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

public function update(Request $request, Package $package)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'name_ar' => 'nullable|string|max:255',
        'price' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'type' => 'required|in:free,paid',
    ]);

    $data = $request->only(['name', 'name_ar', 'price', 'type']);

    
    if ($request->hasFile('photo')) {
       
        if ($package->photo && file_exists(public_path('uploads/packages/' . $package->photo))) {
            unlink(public_path('uploads/packages/' . $package->photo));
        }

        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/packages'), $fileName);
        $data['photo'] = $fileName;
    }

    
    $package->update($data);

    return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
}


 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'name_ar' => 'nullable|string|max:255',
        'price' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'type' => 'required|in:free,paid',
    ]);

    $data = $request->only(['name', 'name_ar', 'price', 'type']);

    if ($request->hasFile('photo')) {
        $fileName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads/packages'), $fileName);
        $data['photo'] = $fileName;
    }

    Package::create($data);

    return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
}




public function destroy(Package $package)
{
    if ($package->photo && file_exists(public_path('uploads/packages/' . $package->photo))) {
        unlink(public_path('uploads/packages/' . $package->photo));
    }

    $package->delete();

    return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
}

}
