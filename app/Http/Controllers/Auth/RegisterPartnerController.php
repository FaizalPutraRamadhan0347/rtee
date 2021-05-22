<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Model\Partner;
use App\Mail\PartnerRegisterEmail;
use App\Rules\EmailExists;

class RegisterPartnerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/partner-thanks';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register-partner');
    }
    
    /**
     * Show thank you page.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanks()
    {
        return view('auth.partner-thanks');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:120'],
            'no_hp' => ['required', 'max:15'],
            'email' => ['required', new EmailExists],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'partner_name' => ['required', 'string', 'max:120'],
            'partner_address' => ['required', 'string', 'min:30'],
            'partner_phone' => ['required', 'max:15'],
            'partner_info' => ['required', 'string', 'min:30'],
        ], [
            'password.min' => 'Password Tidak Boleh Kurang Dari 8 Karakter',
            'password.confirmed' => 'Password Tidak Sama',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'partner',
            'status' => 'pending',
        ]);

        $insertedId = $user->id;

        $partner = Partner::create([
            'users_id' => $insertedId,
            'partner_name' => $data['partner_name'],
            'partner_address' => $data['partner_address'],
            'partner_phone' => $data['partner_phone'],
            'partner_info' => $data['partner_info'],
        ]);

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $user = $this->create($request->all());

        event(new Registered($user));

        Mail::to($user->email)->send(new PartnerRegisterEmail($user->name));
        
        return redirect($this->redirectPath());
    }
}
