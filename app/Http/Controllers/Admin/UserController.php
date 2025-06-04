<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // عرض مستخدم واحد
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // حذف مستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'تم حذف المستخدم بنجاح']);
    }

    // (اختياري) تعديل بيانات مستخدم
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
        ]);

        $user->update($request->only(['name', 'email']));

        return response()->json(['message' => 'تم تحديث المستخدم بنجاح', 'user' => $user]);
    }
}
