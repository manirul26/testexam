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
        $qry = 'SELECT * FROM xproduct WHERE id LIKE "'.$id.'"' ;
        $ppl = DB::select($qry);
        return view('inventory/createNewitem_edit', ['ppl' => $ppl]);
    }

    //public function add_dataedit($id)
    //{
		  
   // }
    function add_dataedit($id)
    {
       $bussid=Input::get('bussid');


$bussid=Input::get('bussid'); 
$autoID = Input::get('autoID');
$pcode=Input::get('pcode'); 
$pname=Input::get('pname'); 
$Description=Input::get('Description'); 
$xcolor=Input::get('xcolor'); 
$xsize=Input::get('xsize'); 
$unit=Input::get('unit'); 
$Category=Input::get('Category'); 
$SubCategory=Input::get('SubCategory'); 
$status=Input::get('status'); 

$expirydate=Input::get('expirydate'); 
$currentbalance=Input::get('currentbalance'); 

$salesprice=Input::get('salesprice'); 
$Purchaseprice=Input::get('Purchaseprice'); 
$Discount=Input::get('Discount'); 
$Vat=Input::get('Vat'); 
$Points=Input::get('Points'); 
$alertstock=Input::get('alertstock'); 
$level1 = Input::get('level1');
$Points = Input::get('Points');
$alertstock = Input::get('alertstock');

$openingbal = Input::get('openingbal');
$Openingbaldata=Input::get('Openingbaldata');


         if($pcode =="" ||  $pname=="" || $Description=="" || $xcolor=="" || $SubCategory=="" ||$Category=="" || $Points=="" || $alertstock=="" || $status=="")
         {
           $notification = array(
               'message' => 'Insert the Required Field',
               'alert-type' => 'info'
           );
         }
         else{

        $user_id = Auth::user()->id;

                    $data = array(
                    'pcode'    =>  $pcode,
                    'Productgroup'    =>  $Category,
                    'Productcategory'    =>  $SubCategory,
                    'pname'    =>  $pname,
                    'Unit'    => $unit,
                    'vat'    =>  $Vat,
                    'unitcose'    =>  $Purchaseprice,
                    'salesprice'    =>  $salesprice,
                    'Discount'    =>  $Discount,
                    'bussid' => session()->get('bussid'),
                    'ExpairDate' => date('Y-m-d',strtotime($expirydate)),
                    'Description' => $Description,
                    'xcolor' => $xcolor,
                    'EnteredBy' =>  $user_id,
                    'xsize' => $xsize,
                    'Product_Subcategory' => 'x',
                    'assetacc' => $level1,
                    'points' => $Points,
                    'alertstock' => $alertstock,
                    'Status' => $status,
                    'DPPrice' => $currentbalance,
                    'openingbal' => $openingbal,
                    'openingDate' => date('Y-m-d',strtotime($Openingbaldata)),
                    'EnteredTime' =>  date('Y-m-d h:i:sa')
                    );

                 //   print_r($data);
                //    $id = DB::table('xproduct')->insert($data);
                     $id = DB::table('xproduct')->where('id','=',$id)->update($data);
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
