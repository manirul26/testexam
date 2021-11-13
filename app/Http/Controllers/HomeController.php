<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

//use Session;

use Mail;

use App\Http\Controllers\Session;

use Illuminate\Support\Facades\Auth;





use Swift_Mailer;

use Swift_MailTransport;

use Swift_Message;







class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

      //  return view('home');

        return view('addproductlist');

       // return view('/'); // this will redirect to welcome page

    }

    public function dashboard($id,$user_id)    {		

         $id = Crypt::decrypt($id);		 
         $user_id = Crypt::decrypt($user_id);

       session()->put('bussid', $id);

        return view('home');

       

    }

    public function contactfrom()

    {

		//mail is view in View Folder

		// $message->to('manirul26@gmail.com', 'Tutorials Point') Receiving Email

		// $message->from('info@itechsoftbd.net','Virat Gandhi'); from where email will send

		 $data = array('name'=>"Virat Gandhi");

		 

      Mail::send('mail', $data, function($message) {

         $message->to('manirul26@gmail.com', 'Tutorials Point')->subject

            ('Laravel HTML Testing Mail');

         $message->from('info@itechsoftbd.net','Virat Gandhi');

      });

      echo "HTML Email Sent. Check your inbox.";

/*	

Mail::raw('Hi, welcome user!', function ($message) {

  $message->to('manirul2@gmail.com')

    ->subject('hi');

});	



       echo "test file";

*/

    }

}

