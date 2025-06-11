<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function edit()
    {
        return view('admin.settings.edit');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['regex:/^[A-Za-z\s]+$/', 'required', 'max:255'],
            'email' => ['email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'required'],
            'profile' => ['image', 'nullable', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('profile')) {
            $data['profile'] = Storage::disk('public')->put('profile', $request->file('profile'));
        }

        $user->update($data);

        return redirect()->route('setting')->with('success', 'Successfully updated your profile details');
    }

    public function deleteAccount(User $user){
        
        $user->delete();

        return redirect()->route('login')->with('success', 'Permanently Deleted Your Finance Flow Account');
    }
}
