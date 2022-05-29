<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function createBuyerAccount()
    {
        return view('auth.register');
    }

    public function createTransporterAccount()
    {
        return view('auth.register-transporter');
    }

    public function createAdminAccount()
    {
        return view('auth.register-admin');
    }

    public function createFarmerAccount(){
        return view('auth.register-farmer');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //Validate the path the user used in registering and match against role returned
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'numeric', 'min:10', 'unique:users'],
            'role' => ['required', 'string', 'max:15']
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        event(new Registered($user));

        Auth::login($user);

        //redirect accordingly
        
        return redirect()->route(RouteServiceProvider::getApproprieteRoute());
    }
}
