<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\models\userdelete;

class registrationpageedit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $qry = 'SELECT * FROM users WHERE id LIKE "'.$id.'"' ;
        $ppl = DB::select($qry);
        return view('registrationpageedit', ['ppl' => $ppl]);
    }

    public function add_dataedit($id)
    {
        $FullName=Input::get('FullName');
        $UserName=Input::get('UserName');

        $Password=Input::get('Password');
        $AccessLevel=Input::get('AccessLevel');

        if($FullName =="" || $UserName=="" ||  $AccessLevel=="" )
        {
            echo "info";

            $notification = array(
              'message' => 'Insert the Required Field',
              'alert-type' => 'info'
          );
 
        }
        else{
         //  $qry = 'SELECT count(slno)+1 as slno FROM questiontbl WHERE CategoryName ="'.$CategoryName.'" and TestName="'.$name.'"' ;
        //   $id = DB::select($qry);
           // $id = DB::table('users')
           // ->where('email','=',$UserName)
           // ->count('email');
            //if($id>0)
           // {
            //    echo "warning";

           //     $notification = array(
           //       'message' => 'User Already Exits',
           ///       'alert-type' => 'warning'
           //   );
          //  }
          //  else{
					$data = array(
                    'name'    =>  $FullName,
                    'email' => $UserName,
                  //  'password' => Hash::make($Password),
                    'UserType' =>  $AccessLevel
    
                    );
                   // $id = DB::table('users')->where('id','=',$id);
                    $id = DB::table('users')->where('email','=',$UserName)->update($data);

//////////////////////////////////this is for Module/////////////////////////////////////////////
                    //    $qrys = 'delete FROM usercategory WHERE UserID ="'.$UserName.'"' ;
                    //    $idss = DB::select($qrys);
					
					$qrys =  DB::table('usercategory')->where('UserID', $UserName)->delete();
					
					
					
					
                        $answers =Input::get('myCheckboxes');
                        if(is_array($answers))
                        { 
                          foreach($answers as $answer)
                          {
                            // echo $answer; echo "</br>";
                            $datas = array(
                            'UserID'    =>  $UserName,
                            'CategoryID' =>  $answer,
                            'EnteredBy' =>$UserName
                            );
                            $ids = DB::table('usercategory')->insert($datas);
                          ///////////////////////////////////
                          }
                        }
///////////////////////////////////////////////////////////////////////////////
/////////////////////this is for page permission//////////////////////////////////////////////////////
						
						$qrys =  DB::table('xpermision')->where('xuser', $UserName)->delete();
						
                        $pages =Input::get('myCheckpage');
                        if(is_array($pages))
                        { 
                          foreach($pages as $pagename)
                          {
                            // echo $answer; echo "</br>";
                            $datas = array(
                            'xuser'    =>  $UserName,
                            'module' =>  $pagename,
                            'enterby' =>$UserName
                            );
                            $ids = DB::table('xpermision')->insert($datas);
                          ///////////////////////////////////
                          }
                        }
///////////////////////////////////////////////////////////////////////////////
                        echo 'success';
                        $notification = array(
                        'message' => 'Data save Successfully',
                        'alert-type' => 'success'
                        );
                    

                  

           // }
            return back()->with($notification);
            ////

        }

    }
   public function delete_id($id,$email)
   {

     // $testname = userdelete::find($id);
     // $testname->delete();
	  
	    $qry = 'delete FROM users WHERE id ="'.$id.'"' ;
        $ppl = DB::select($qry);
		
		$data = DB::table('usercategory') 
		->where('UserID',$email)->delete();
	
      echo 'success';
      $notification = array(
          'message' => 'Delete Successfully',
          'alert-type' => 'success'
      );
     return back()->with($notification);

   }
   public function delete_id_student($id,$email)
   {

     // $testname = studentdelete::find($id);
     // $testname->delete();
	  
	   $qry = 'delete FROM studentinfo WHERE id ="'.$id.'"' ;
        $ppl = DB::select($qry);
	  

	  
		$data = DB::table('usercategory') 
		->where('UserID',$email)->delete();
	
      echo 'success';
      $notification = array(
          'message' => 'Delete Successfully',
          'alert-type' => 'success'
      );
     return back()->with($notification);

   }    
    
}
