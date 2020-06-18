<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PainType;
use App\Models\Patient;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class RegisterController extends Controller
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
    use Authenticatable;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'max:11'],
            'birth_date' => ['required'],
            'gender' => ['required'],
            'country' => ['required'],
            'occupation' => ['required'],
            'pain_types' => ['required']
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
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'user_name' => $data['user_name'],
            'mobile_number' => $data['mobile_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $patient = Patient::create([
            'birth_date' => $data['birth_date'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'occupation' => $data['occupation'],
            'user_id' => $user->id
        ]);
        $patient->pain_types()->attach($data['pain_types']);
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

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());
    }

    public function completeInfo(Request $request)
    {
        return view('auth.complete-profile', [
            'countries' => DB::table('countries')->get(),
            'pain_types' => PainType::all(),
            'user_name' => $request->user_name,
            'password' => $request->password,
        ]);
    }
}
