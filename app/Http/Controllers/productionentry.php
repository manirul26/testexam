<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;


class productionentry extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('productgroup')->paginate(10);
        return view('production/productionentry', compact('data'));
    }
   
    function adddatapost(Request $request)
    {
        $bussid=$request->bussid; 
        $jdate=$request->jdate; 
        $jno=$request->jno; 
        $xuser=$request->xuser; 
        $note=$request->note; 
        $Warehouse=$request->Warehouse;
        $jr=$request->jr; 

         if($jdate =="" ||  $jno=="" || $note=="" || $bussid=="" || $Warehouse=="")
         {
            echo "Required";
         }
         else{
        $orderObj = DB::table('journal')->select('jno')->where('bussid','=',session()->get('bussid'))->latest('jno')->first();
        if ($orderObj) 
        {
        $orderNr = $orderObj->jno;
        $removed1char = substr($orderNr, 4);
        $generateOrder_nr = $stpad = 'PRD-' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);
        }
        else
        {
        $generateOrder_nr = 'PRD-' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }

				$user_id = Auth::user()->id;

                    $data = array(
                    'jdate'    =>  date('Y-m-d',strtotime($jdate)),
                    'jno'    =>  $generateOrder_nr,
                    'note'    =>  $note,
                    'voucherType'    =>  'Journal Voucher',
                    'bussid' => session()->get('bussid'),
                    'xuser' =>  $user_id,
                    'Details' => 'x', 
                    'transactionid' => $generateOrder_nr,
                    'Status' => 'Stock',
                    'pagename' => 'production stock',
                    'voucherstatus' => 'hitinventory',
                    'warehouse' => $Warehouse,
                    //Warehouse 
                    'xtime' =>  date('Y-m-d h:i:sa')
                    );

                 //   print_r($data);
                    $id = DB::table('journal')->insert($data);
                    if($id > 0)
                    {
///////////////////////////////////////////////////////////////////////////////
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
                    'j_id' => $generateOrder_nr,
                    'voucherType' => 'Stock',
                    'Details' => 'Stock',
                    'transactionid' => $generateOrder_nr,
                    'accounttype' => 'Current Asset',
                    'pagename' => 'Stock',
                    'RecQty' => $u[5],
                    'IssQty' => '0',
                    'ReturnQty' => '0',
                    'DamageQty' => '0',
                    'points' => $user->points,
                    'custsupper' => '',
                    'pagename' => 'production stock',
                    'warehouse' => $Warehouse,
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

                     // $arr = array('message' => 'Update Successfully', 'title' => 'Successfully');
                    }



           // echo json_encode($arr);

                
         }
             
       // return back()->with($notification);
    }
    function findsubcategory(Request $request)
    {
        $bussid=$request->bussid; //::get('testname');
        $Category = $request->Category;
           

         if($bussid =="")
         {
            // echo "info";
            //
            $arr = array('message' => 'Required Field', 'title' => 'Information');
         }
         else{

                echo '<option value=""></option>';

                $data = DB::table('productsubcategory')
                ->where('bussid', '=', $bussid)
                ->where('PoductGroupID','=', $Category)
                ->get();

               // $data = DB::table('plhrc2')->where('bussid','=',$bussid)->orWhere('xhrc1','=',$level1) 
               // ->get();
                foreach($data as $row) {
                ?>
                <option value="<?php echo $row->ID ?>"><?php echo $row->productsubcategoryname ?></option>
                <?php
                } 
               // print_r($data);
               // $queries = DB::getQueryLog();
              //  print_r($queries);
                    
         }
    }
    function findlevel3(Request $request)
    {
        $bussid=$request->bussid; //::get('testname');
        $level1 = $request->AccountType;
        $level2 = $request->level2;   

         if($bussid =="")
         {
            // echo "info";
            //
            $arr = array('message' => 'Required Field', 'title' => 'Information');
         }
         else{

                echo '<option value=""></option>';

                $data = DB::table('plhrc3')
                ->where('bussid', '=', $bussid)
                ->where('xhrc1','=', $level1)
                ->where('xhrc2','=', $level1)
                ->get();

               // $data = DB::table('plhrc2')->where('bussid','=',$bussid)->orWhere('xhrc1','=',$level1) 
               // ->get();
                foreach($data as $row) {
                ?>
                <option value="<?php echo $row->xhrc2 ?>"><?php echo $row->xhrc2 ?></option>
                <?php
                } 
               // print_r($data);
               // $queries = DB::getQueryLog();
              //  print_r($queries);
                    
         }
    }
    
    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('productgroup')
                    ->where('ID', 'like', '%'.$query.'%')
                    ->orWhere('PoductGroupName', 'like', '%'.$query.'%')
                 //   ->orWhere('post_description', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(10);
      return view('inventory/pagination_data', compact('data'))->render();
     }
    }
	function test(Request $request)
    {
       $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('productgroup')
                  //  ->where('ID', 'like', '%'.$query.'%')
                  //  ->orWhere('PoductGroupName', 'like', '%'.$query.'%')
                 //   ->orWhere('post_description', 'like', '%'.$query.'%')
                 //   ->orderBy($sort_by, $sort_type)
                  //   ->orderBy('ID ASC')
                  ->orderBy('ID', 'DESC')
                    ->paginate(10);
      return view('inventory/pagination_data', compact('data'))->render();

    }
    function update_data(Request $request)
    {
       $FullNameEdit=$request->FullNameEdit; //::get('testname');
       $IDEdit=$request->IDEdit; //::get('testname');
        $status_edit=$request->status_edit; //::get('testname');

         if($FullNameEdit =="" || $IDEdit == "")
         {
            // echo "info";
            //
            $arr = array('message' => 'Required Field', 'title' => 'Information');
         }
         else{

  
                    $user_id = Auth::user()->id;
                    $data = array(
                    'PoductGroupName'    =>  $FullNameEdit,
                    'BussId' => '10000',
                    'BranchId' => '100',
                    'UpdateBy' =>  $user_id,
                    'UpdateTime' =>  date('Y-m-d h:i:sa'),
                    'Status' =>  $status_edit
    
                    );
                    print_r($data);
                    $sqlupdate = DB::table('productgroup')->where('ID',$IDEdit)->update($data);
                    if($sqlupdate > 0)
                    {
///////////////////////////////////////////////////////////////////////////////
                      $arr = array('message' => 'Update Successfully', 'title' => 'Successfully');
                    }
          
            

                
         }
         echo json_encode($arr);
             
       // return back()->with($notification);
    }
    function finddata(Request $request)
    {
        //  $id= $request->user_id;  
            $IDatuo = $request->post('user_id');
       // $userData['data'] = DB::table('productgroup')->where('ID',$IDatuo)->get();
        //  return view('inventory/category_edit', $userData);

          // echo json_encode($userData);

            $itemstestname = array(
            'itemlisttestname' =>  DB::table('productgroup')->where('ID',$IDatuo)->get()
          );
            return view('inventory/category_edit', $itemstestname);

    }
    function deleteinfo(Request $request)
    {
        //  $id= $request->user_id;  
            $IDatuo = $request->get('user_id');
            $data = array(
            'ID'    =>  $IDatuo
            );
              print_r($data);
                    $sqlupdate = DB::table('productgroup')->where('ID',$IDatuo)->delete($data);
                    if($sqlupdate > 0)
                    {
///////////////////////////////////////////////////////////////////////////////
                     echo "Delete Successfully";
                    }
                    else
                    {
                      echo "Failed to Delete";
                    }
         //echo json_encode($arr);
    }
    function yesdelete(Request $request)
    {
         $IDatuo = $request->get('user_id');
         echo '';
    }


    
}
