<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;
use Response;
use Mail;
use Swift_Mailer;
use Swift_MailTransport;
use Swift_Message;

class ForgotPassword extends Controller
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

   // use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function verifypassword()
    {
          return view('verifypassword');
    }
    public function forgetpassword()
    {
         return view('forgetpassword');
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
            $user = DB::table('users')  ->where('email','=',$email)->first();
           

            $name =  $user->name; 
            $subject = 'Forget Password'; 
            $company_name = 'EasyAccountingERP'; 
            $messages = 'forget password link'; 
            $randomId = date('Y-m-d h:i:s');

////////////////////////////////////////////////////////////////////////
        $message ='';
        $data = array(
        'name'=>"EasyAccountingERP",
        'email'=>$email,
        'subject'=>'Forget Password',
        'company_name'=>'Webshopedia APS',
        'messages'=>$message

        );
        Mail::send('forgetpasswordtemplate', $data, function($message) use ($name, $subject, $company_name, $messages, $email, $randomId) {
        $message->to($email, 'Thank You')->subject
        ('Thank You');
        $message->from('customercare@easyaccountingerp.com','Forget Password');
        });
        echo "Check your inbox.";

        return redirect()->back()->with("success","Verification Email has been send to your email");
        //exit;

///////////////////////////////////////////////////////////////////////
        }

     

    }



}
