<?php

namespace App\Frontend\Http\Controllers\Auth;

use App\Frontend\Models\User;
use Validator;
use App\Frontend\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' 			=> 'required|max:255|unique:users',
            'first_name' 	=> 'required|max:255',
            'last_name' 	=> 'required|max:255',
            'email' 		=> 'required|email|max:255|unique:users',
            'password' 		=> 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
    public function showLoginForm()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }
        return view('frontend.pages.auth.login');
    }
    public function showRegistrationForm()
    {
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('frontend.pages.auth.register');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

//        return redirect($this->loginPath())
        return redirect('login')
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        /*if($this->captchaCheck() == false)
        {
            return redirect()->back()->withErrors(['Sorry, Wrong Captcha'])->withInput();
        }*/

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $activation_code 			= str_random(60) . $request->input('email');
        $user 						= new User;
        $user->name 				= $request->input('name');
        $user->first_name 			= $request->input('first_name');
        $user->last_name 			= $request->input('last_name');
        $user->email 				= $request->input('email');
        $user->password 			= bcrypt($request->input('password'));
        $user->activation_code 		= $activation_code;

        // GET IP ADDRESS
        $userIpAddress 				= new CaptureIp;
        $user->signup_ip_address	= $userIpAddress->getClientIp();

        if ($user->save()) {

            $this->sendEmail($user);
            $user_role = Role::whereName('user')->first();
            $user->assignRole($user_role);

            $profile = new Profile;
            $user->profile()->save($profile);

            return view('frontend.pages.auth.activateAccount')->with('email', $request->input('email'));

        } else {

            \Session::flash('message', \Lang::get('notCreated') );
        }

    }

    public function sendEmail(User $user)
    {
        $data = array(
            'name' => $user->name,
            'code' => $user->activation_code,
        );

        \Mail::queue('emails.activateAccount', $data, function($message) use ($user) {
            $message->subject( \Lang::get('pleaseActivate') );
            $message->to($user->email);
        });
    }

    public function resendEmail()
    {
        $user = \Auth::user();
        if( $user->resent >= 3 )
        {
            return view('frontend.pages.auth.tooManyEmails')->with('email', $user->email);
        } else {
            $user->resent = $user->resent + 1;
            $user->save();
            $this->sendEmail($user);
            return view('frontend.pages.auth.activateAccount')->with('email', $user->email);
        }
    }

    public function activateAccount($code, User $user)
    {

        if($user->accountIsActive($code)) {

            \Session::flash('message', \Lang::get('auth.successActivated') );
            return redirect('home');
        }

        \Session::flash('message', \Lang::get('auth.unsuccessful') );
        return redirect('home');

    }
}
