<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
{
    $query = Contact::query();

    if ($request->has('search') && $request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    $contacts = Contact::paginate(5);

    return view('admin.pages.contact.index', compact('contacts'));
}
}
