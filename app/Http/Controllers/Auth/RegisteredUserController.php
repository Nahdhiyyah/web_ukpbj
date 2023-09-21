<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
// use PragmaRX\Google2FAQRCode\Google2FA;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */


    // use RegisteredUserController {
    //     register as registration;
    // }
    
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'google2fa_secret' => $request->google2fa_secret
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     $google2fa = app('pragmarx.google2fa');
    //     $registration_data = $request->all();
    //     $registration_data['google2fa_secret'] = $google2fa->generateSecretKey();
        
    //     session()->flash('registration_data', $registration_data);
    //     $twofa = new Google2FA();
    //     $key = $twofa->generateSecretKey();
    //     $QR_Image = $google2fa->getQRCodeInline(
    //         config('app.name'),
    //         $registration_data['email'],
    //         $registration_data['google2fa_secret']
    //     );

    //     return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    // }
    

    // public function completeRegistration(Request $request){
    //     $request->merge(session('registration_data'));
    //     return $this->register($request);
    // }
}