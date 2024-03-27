<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function update(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'password' => 'equired',
            'new_password' => 'equired|confirmed',
        ]);

        if (!Hash::check($validatedData['password'], $user->password)) {
            return back()->withErrors(['password' => 'The current password is incorrect.']);
        }

        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        return redirect()->route('settings')->with('success', 'Password changed successfully.');
    }
}


