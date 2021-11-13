<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;


class registrationpage extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
	    $companyname = session()->get('bussid');
        $items = array(
            'itemlist' =>  DB::table('users')->where('companyname','=',$companyname)->get()
          );
        
      //  return view('question');
        return view('registrationpage',$items);
    }
    public function studentpendinglist()
    {
        $items = array(
            'itemlist' =>  DB::table('users')->get()
          );
        
      //  return view('question');
        return view('studentpendinglist',$items);
    }
    public function add_data()
    {
        $FullName=Input::get('FullName');
        $UserName=Input::get('UserName');

        $Password=Input::get('Password');
        $AccessLevel=Input::get('AccessLevel');

        if($FullName =="" || $UserName=="" || $Password=="" || $AccessLevel=="" )
        {
            echo "info";

            $notification = array(
              'message' => 'Insert the Required Field',
              'alert-type' => 'info'
          );
		  return back()->with($notification);
 
        }
        else{
         //  $qry = 'SELECT count(slno)+1 as slno FROM questiontbl WHERE CategoryName ="'.$CategoryName.'" and TestName="'.$name.'"' ;
        //   $id = DB::select($qry);
            $id = DB::table('users')
            ->where('email','=',$UserName)
            ->count('email');
            if($id>0)
            {
                echo "warning";

                $notification = array(
                  'message' => 'User Already Exits',
                  'alert-type' => 'warning'
              );
			  return back()->with($notification);
            }
            else{
					$data = array(
                    'name'    =>  $FullName,
                    'email' => $UserName,
                    'password' => Hash::make($Password),
                    'UserType' =>  $AccessLevel,
                    'companyname' =>  session()->get('bussid'),
                    'status' =>  '1'
    
                    );
                    $id = DB::table('users')->insert($data);
                    if($id > 0)
                    {
///////////////////////////////////////////////////////////////////////////////

                $answers =Input::get('myCheckboxes');
                if(is_array($answers)){ 
                foreach($answers as $answer)
                {
                   // echo $answer; echo "</br>";
					///////////////////////////////////
						$datas = array(
						'UserID'    =>  $UserName,
						'CategoryID' =>  $answer,
						'EnteredBy' =>$UserName
						);
						$ids = DB::table('usercategory')->insert($datas);
					
					
					///////////////////////////////////
                }
            }

                        echo 'success';
                        $notification = array(
                            'message' => 'Data save Successfully',
                            'alert-type' => 'success'
                        );
                    }

            }
            return back()->with($notification);
            ////

        }

    }
    
}
