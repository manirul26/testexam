<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\models\userdelete;
use Illuminate\Support\Facades\Auth;
use Response;
class proudctlist_edit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $qry = 'SELECT * FROM product WHERE productid  LIKE "'.$id.'"' ;
        $ppl = DB::select($qry);
        return view('product/createNewitem_edit', ['ppl' => $ppl]);
    }

    //public function add_dataedit($id)
    //{
		  
   // }
    function add_dataedit($id)
    {
$pcode=Input::get('pcode'); 
$pname=Input::get('pname'); 
$brand=Input::get('brand'); 

         if($pcode =="" ||  $pname=="" )
         {
           $notification = array(
               'message' => 'Insert the Required Field',
               'alert-type' => 'info'
           );
         }
         else{

        $user_id = Auth::user()->id;

                    $data = array(
                  'proudctname'    =>  $pname,                   'productbrand'    =>  $pname,                   'productquantity'    =>  $pname,                   'galleryimage'    =>  $pname,                   'EnteredBy'    =>  $user_id,                   'UpdateBy'    =>  '',                    'uploaddatetime' =>  date('Y-m-d h:i:sa')
                    );

                 //   print_r($data);
                //    $id = DB::table('xproduct')->insert($data);
                     $id = DB::table('product')->where('productid','=',$id)->update($data);
                    if($id > 0)
                    {
                      $notification = array(
                      'message' => 'update Successfully',
                      'alert-type' => 'success'
                      );
                    }


          //  echo json_encode($arr);

                
         }
             
        return back()->with($notification);
    }
   public function delete_id($id,$email)
   {

      $testname = userdelete::find($id);
      $testname->delete();
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
