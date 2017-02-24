<?php namespace App\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ContactUS;
//use Twilio;

class CmsController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

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
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function contactUS()
    {
        return view('frontend.pages.cms.contact-us');
    }

    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
//            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'phone' => 'required|min:11|numeric',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $msg = $request->get('phone');
//        Twilio::message('+91'.$request->get('phone'), $msg);

        ContactUS::create($request->all());
        \Mail::send('emails.contact-us',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('noreply@webexpertz.org');
                $message->to('contact@webexpertz.org', 'Admin')->subject('User Feedback');
            });

//        return \Redirect::route('contactus')->with('message', 'Thanks for contacting us!');
        return back()->with('success', 'Thanks for contacting us!');
    }

    /*public function contactUSPost(ContactFormRequest $request)
    {

        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('wj@wjgilmore.com');
                $message->to('wj@wjgilmore.com', 'Admin')->subject('TODOParrot Feedback');
            });

        return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

    }*/

}
