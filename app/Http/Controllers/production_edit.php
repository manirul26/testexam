<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\models\userdelete;
use Illuminate\Support\Facades\Auth;
use Response;

class production_edit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {

            if(session()->get('bussid'))
            {
              $qry = 'SELECT * FROM journal WHERE j_id LIKE "'.$id.'"' ;
        $ppl = DB::select($qry);
        return view('production/productionentry_edit', ['ppl' => $ppl]);
            }  
            else{

                    return view('welcome');

            }  
       




        

    }

    function adddatapost_prdedit(Request $request)
    {
        $bussid=$request->bussid; 
        $jdate=$request->jdate; 
        $jno=$request->jno; 
        $xuser=$request->xuser; 
        $note=$request->note; 
        $jr=$request->jr; 



         if($jdate =="" ||  $jno=="" || $note=="" || $bussid=="")
         {
           echo "Required";
         }
         else{

        $user_id = Auth::user()->id;

//////////////////////////////////////////////////////////////////////////////
                            echo "save";

//////////////////////////////////////////////////////////////////////////////////
if(sizeof($jr) > 0)
{
    foreach( $jr as $u )
    {
////check product///////////
        $id = DB::table('xproduct')
        ->where('pcode','=',$u[0])
        ->where('bussid','=',session()->get('bussid'))
        ->count('pcode');
        if($id>0)
        {
       // echo "Found";

            $user = DB::table('xproduct')->where('pcode','=',$u[0])->where('bussid','=',session()->get('bussid'))->first();
          

              $data2 = array(
                    'xdate'    =>  date('Y-m-d',strtotime($jdate)),
                    'account'    =>  'Production Stock',
                    'accountno' => '230001',
                    'memo'    =>  $note,
                    'debit'    =>  '0',
                    'bussid' => session()->get('bussid'),
                    'enteredby' =>  $user_id,
                    'Level1' =>  '',
                    'level2' =>  '',
                    'level3' =>  '',
                    'level4' => '',
                    'pcode' =>  $u[0],
                    'pname' =>  $u[1],
                    'Description' =>  $u[2],
                    'xcolor' =>  $u[3],
                    'xsize' =>  $u[4],
                    'Qty' =>  $u[5],
                    'UnitPrice' =>  $user->unitcose,
                    'GrandTotal' => $user->unitcose*$u[5],
                    'Discount' =>  $user->Discount,
                    'Vat' =>   $user->vat,
                    'DPPrice' => $user->DPPrice,
                    'unitcose' => $user->unitcose,
                    'salesprice' => $user->salesprice,
                    'credit' => '0', 
                    'j_id' => $jno,
                    'voucherType' => 'Stock',
                    'Details' => 'Stock',
                    'transactionid' => $jno,
                    'accounttype' => 'Current Asset',
                    'pagename' => 'Stock',
                    'RecQty' => $u[5],
                    'IssQty' => '0',
                    'points' => $user->points,
                    'custsupper' => '',
                    'pagename' => 'production stock',
           'voucher_status' => 'hitinventory',
                    'xtime' =>  date('Y-m-d h:i:sa')
                    );

                    //   print_r($data);
                    $id = DB::table('journal_entry')->insert($data2);
      
        }
        else{


////End Check Product        

                  
        }
    }
}


//////////////////////////////////////////////////////////////////////////////////   
                
         }
             
       // return back()->with($notification);
    }

    function autoprd_edit(Request $request)
    {
        $bussid = $request->bussid;
        $search = $request->search;

         $data = DB::table('xproduct')
        ->where('bussid', '=', session()->get('bussid'))
       ->Where('pname', 'like', '%'.$search.'%')

        //   ->orWhere('post_description', 'like', '%'.$query.'%')
        ->orderBy('pname', 'ASC')
        ->paginate(10);
  //  DB::listen(function($data) {
  //  var_dump($data);
  //  });
       
        return view('inventory/searchitem', compact('data'))->render();

 
    }
   function getproductdata(Request $request)
    {
      $bussid = $request->bussid;
        $m = $request->m;


            $data = DB::table('xproduct')->where('bussid','=',$bussid)->where('pcode','=',$m) 
            ->get();
            foreach($data as $row) {
            //echo $row->Question;
                  $data = $data;
            } 
            echo json_encode($data);

 
    }

	  function updatepostproduction($id) //Request $request
    {

      $act=Input::get('act');

       $Jdate=Input::get('Jdate');
        $Jno=Input::get('jno');
      
        $note=Input::get('note');
     

        if($Jno=="" || $Jdate=="")
        {
          echo "insert the Required";
            exit;
        }
         $user_id = Auth::user()->id;

        $datas = array(
              'jdate'    =>  date('Y-m-d',strtotime($Jdate)),
              'jno'    =>  $Jno,
              'note'    =>  $note,
              'bussid' => session()->get('bussid'),
              'updateby' =>  $user_id,
              'updatetime' =>  date('Y-m-d h:i:sa'),

              );
              $id = DB::table('journal')->where('jno','=',$Jno)->update($datas);
              if($id > 0)
              {
                 // echo "journal";
              }
            
            
        if($act=='fun_insert')
        {

            foreach(Input::get('pcode') as $key => $pcode) 
            {
                // print_r($item); echo "</br>";
               // echo $pcode; 
                $pname = Input::get('pname')[$key]; //echo "</br>";

                $qty = Input::get('qty')[$key]; //echo "</br>";
                 $p_id = Input::get('p_id')[$key]; //echo "</br>";
                

  $user = DB::table('xproduct')->where('pcode','=',$pcode)->where('bussid','=',session()->get('bussid'))->first();


              $data2 = array(
                    'xdate'    =>  date('Y-m-d',strtotime($Jdate)),
                    'memo'    =>  $note,
                    'debit'    =>  '0',
                    'bussid' => session()->get('bussid'),
                    'Qty' =>  $qty,
                    'UnitPrice' =>  $user->unitcose,
                    'GrandTotal' => $user->unitcose*$qty,
                    'Discount' =>  $user->Discount,
                    'Vat' =>   $user->vat,
                    'DPPrice' => $user->DPPrice,
                    'unitcose' => $user->unitcose,
                    'salesprice' => $user->salesprice,
                    'RecQty' => $qty,
                    'points' => $user->points,

                    );
                         // print_r($data2);
                        $ids = DB::table('journal_entry')->where('je_id','=',$p_id)->update($data2);
                       if($ids > 0)
                        {
                        echo "";
                        }
            }
  
        }
        else
        {
          echo "here";
        }
        



    }
     function productdelete(Request $request)
    {
       // echo "Delete Data 90000";
            echo $IDatuo = $request->get('user_id');

            $qry =  DB::table('journal_entry')->where('je_id', $IDatuo)->delete();
       
             echo "Delete";
             
    }
    function add_dataedit($id)
    {
      
      
        $Jdate=Input::get('Jdate');
        $Jno=Input::get('jno');
        $Supplier=Input::get('Supplier');
        $challenno=Input::get('challenno');   
        $deliverydate=Input::get('deliverydate');
        $paymenttype=Input::get('paymenttype');
        $note=Input::get('note');

        if($note=="")
        {
          echo "insert the Required";
            exit;
        }
        /////update header
        $user_id = Auth::user()->id;
              $datas = array(
              'jdate'    =>  date('Y-m-d',strtotime($Jdate)),
              'jno'    =>  $Jno,
              'note'    =>  $note,
              'voucherType'    =>  'Journal Voucher',
              'bussid' => session()->get('bussid'),
              'updateby' =>  $user_id,
              'Details' => 'x', 
              'transactionid' => $Jno,
              'paymenttype' => $paymenttype,
              'deliverydate' => date('Y-m-d',strtotime($deliverydate)),
              'updatetime' =>  date('Y-m-d h:i:sa'),
              'orderstatus' => 'Confirm'
              );
              $id = DB::table('journal')->where('jno','=',$Jno)->update($datas);
              if($id > 0)
              {
                  echo "journal";
              }
        ///// end update header

        foreach($_POST['pcode'] as $key => $pcode) 
        {
            // print_r($item); echo "</br>";
           // echo $pcode; 
            $pname = $_POST['pname'][$key];
          $price = $_POST['price'][$key];
            $qty = $_POST['qty'][$key];
            $discount = $_POST['discount'][$key];
            $vat = $_POST['vat'][$key];
            $p_id = $_POST['p_id'][$key];

            $user = DB::table('xproduct')->where('pcode','=',$pcode)->where('bussid','=',session()->get('bussid'))->first();

                          $data2 = array(
                    'xdate'    =>  date('Y-m-d',strtotime($Jdate)),
                    'accountno'    =>  '2000',
                    'account' => 'Cash in hand',
                    'memo'    =>  $note,
                    'debit'    =>  '0',
                    'Updateby' =>  $user_id,
                    'pcode' => $pcode,
                    'pname' =>  $pname,
                    'Description' =>  $user->Description,
                    'xcolor' =>  $user->xcolor,
                    'xsize' =>  $user->xsize,
                    'Qty' =>  $qty,
                    'IssQty' => $qty,
                    'UnitPrice' =>  $price,
                    'GrandTotal' => $qty*$price,
                    'Discount' =>  $discount,
                    'Vat' =>   $vat,
                    'credit' => '0', 
                    'j_id' => $Jno,
                    'custsupper' => $Supplier,
                    'DPPrice' => $user->DPPrice,
                    'unitcose' => $user->unitcose,
                    'salesprice' => $user->salesprice,
                    'points' => $user->points,
                    'Challenno' => $challenno,
                    'updatetime' =>  date('Y-m-d h:i:sa')
                    );

                     //  print_r($data2);
              $ids = DB::table('journal_entry')->where('je_id','=',$p_id)->update($data2);
              if($ids > 0)
              {
                echo "row change";
              }

        }

    }
    function deleteinfo(Request $request)
    {
        //  $id= $request->user_id;  
            $IDatuo = $request->get('user_id');

             $notification = array(
               'message' => 'Insert the Required Field',
               'alert-type' => 'info'
           );
        //  return back()->with($notification);
       //  return redirect('/acc_list')->with($notification);


                $qry = 'delete FROM journal_entry WHERE je_id ="'.$IDatuo.'"' ;
                $id = DB::select($qry);
                if($id > 0)
                {

                echo "Delete";
                }
                else
                {
                echo "Failed";
                }

        

         //echo json_encode($arr);
    }
    
}
