<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Package;
use App\Models\Service;

class DashboardController extends Controller
{
   public function index()
{
    $userCount = User::count();
    $packageCount = Package::count(); 
    $serviceCount = Service::count(); 

    return view('admin.dashboard', compact('userCount', 'packageCount', 'serviceCount'));
}
}
