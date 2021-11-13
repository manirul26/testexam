<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function forgetpassword()
    {
         return view('forgetpassword', compact('data'));
    }
    function forgetpasswordformsubmit(Request $request)
    {
        $email = $request->email;
        $id = DB::table('users')
        ->where('email','=',$email)
        ->count('email');
        if($id==0)
        {
         return redirect()->back()->with("success","Email Address Not Found");
        }
        else
        {
////////////////////////////////////////////////////////////////////////
        $message ='';
        $data = array(
        'name'=>"EasyAccountingERP",
        'email'=>$email,
        'subject'=>'Forget Password',
        'company_name'=>'Webshopedia APS',
        'messages'=>$message

        );
        Mail::send('contactmail', $data, function($message) use ($name, $subject, $company_name, $messages, $emailaddress) {
        $message->to($emailaddress, 'Thank You')->subject
        ('Thank You');
        $message->from('customercare@easyaccountingerp.com','Forget Password');
        });
        echo "Check your inbox.";

        return redirect()->back()->with("success","Email Send Successfully");
        //exit;

///////////////////////////////////////////////////////////////////////
        }

     

    }



}
