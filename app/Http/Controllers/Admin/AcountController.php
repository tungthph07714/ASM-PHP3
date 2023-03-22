<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\RuleNhapForm;
use App\Models\User;


class AcountController extends Controller
{
    public function manageAdmin()
    {
        $userAuth = Auth::user();

        $user = User::all();
        return view('admin.acount', ['user' => $user]);
    }

    public function createAcount()
    {
        return view('admin.create-acount');
    }
    public function saveAcount(RuleNhapForm $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->all();
        $user = new User();
        $user->username = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->status = 1;
        $user->password = Hash::make($data['password']);

        $user->save();

        $data = User::all();
        return view('admin.acount', ['user' => $data]);
    }
    public function disableAccount($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect()->route('manageAdmin');
    }
    public function authAccount($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.auth-account', ['user' => $user]);
    }
    public function saveAuthAccount(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();

        $user->role = $data['role'];
        $user->save();
        return redirect()->route('manageAdmin');
    }
    public function enableAccount($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect()->route('manageAdmin');
    }
}
