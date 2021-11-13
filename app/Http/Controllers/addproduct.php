<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; 

use DB;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Session;

use Illuminate\Support\Facades\Auth;

use Response;

class addproduct extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

    }

    public function index()

    {

        $data = DB::table('productgroup')->paginate(10);

        return view('inventory/createNewitem', compact('data'));

    }

    function adddatapost(Request $request)

    {

$bussid=$request->bussid; 

$pcode=$request->pcode; 

$pname=$request->pname; 

$Description=$request->Description; 

$unit=$request->unit; 

$Category=$request->Category; 

$SubCategory=$request->SubCategory; 

$status=$request->status; 

 

$expirydate=$request->expirydate; 

$currentbalance=$request->currentbalance; 

$salesprice=$request->salesprice; 

$Purchaseprice=$request->Purchaseprice; 

$Discount=$request->Discount; 

$Vat=$request->Vat; 

$Points=$request->Points; 

$alertstock=$request->alertstock; 

$level1 = $request->level1;

$openingbal = $request->openingbal;

$Openingbaldata=$request->Openingbaldata;



         if($pcode =="" ||  $pname=="" || $Description=="" || $SubCategory=="" || $Category=="" || $Points=="")

         {

            echo "Required";

         }

         else{

             $id = DB::table('xproduct')

            ->where('pcode','=',$pcode)

            ->where('bussid','=',session()->get('bussid'))

            ->count('pcode');

            if($id>0)

            {

                echo "warning";

            }

            else

			{

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

                    'xcolor' => 'x',

                    'EnteredBy' =>  $user_id,

                    'xsize' => 'x',

                    'Product_Subcategory' => 'x',

                    'assetacc' => $level1,

                    'points' => $Points,

                    'alertstock' => $alertstock,

                    'DPPrice' => $currentbalance,

                    'openingbal' => $openingbal,

                  'openingDate' => date('Y-m-d',strtotime($Openingbaldata)),

                    'Status' => $status,

                    'EnteredTime' =>  date('Y-m-d h:i:sa')

                    );

                    $id = DB::table('xproduct')->insert($data);

                    if($id > 0)

                    {

						echo "save";

                    }

					else

					{

						echo "failed";



					}

            }

                

         }



    }

    function autosearch(Request $request)

    {

        $bussid = $request->bussid;

        $search = $request->search;

        $data = DB::table('xproduct')

         ->where('bussid', '=', session()->get('bussid'))

        ->Where('pname', 'like', '%'.$search.'%')

        ->paginate(10);

       

         return view('inventory/searchitem', compact('data'))->render();

 

    }

	function autosearch1(Request $request)

    {

        $bussid = $request->bussid;

        $search = $request->search;

        $data = DB::table('xproduct')

         ->where('bussid', '=', session()->get('bussid'))

        ->Where('pname', 'like', '%'.$search.'%')

        ->paginate(10);

     

         return view('inventory/searchitem1', compact('data'))->render();

 

    }

    function autocustomer(Request $request)

    {

        $bussid = $request->bussid;

        $search = $request->search;

        $accountsource = $request->accountsource;

       

		if($accountsource=="Customer")

		{

        $data = DB::table('vendo')

         ->where('bussid', 'like', '%'.$bussid.'%')

        ->where('name', 'like', '%'.$search.'%')

        ->where('CustomerID', 'like', '%'.$search.'%')

		->where('Status_st', '=', 'Customer')

        ->paginate(10);

		}

		else if($accountsource=="Supplier")

		{

		$data = DB::table('vendo')

         ->where('bussid', 'like', '%'.$bussid.'%')

        ->where('name', 'like', '%'.$search.'%')

        ->where('CustomerID', 'like', '%'.$search.'%') 

		->where('Status_st', '=', 'Supplier')

        ->paginate(10);

		}

		else if($accountsource=="Employee")

		{

		$data = DB::table('vendo')

         ->where('bussid', 'like', '%'.$bussid.'%')

        ->where('name', 'like', '%'.$search.'%')

        ->where('CustomerID', 'like', '%'.$search.'%') 

		->where('Status_st', '=', 'Employee')

        ->paginate(10);

		}

		else if($accountsource=="Subaccount")

		{

			 $creditaccount = $request->creditaccount;

			 

		$data = DB::table('vendo')

         ->where('bussid', 'like', '%'.$bussid.'%')

        ->where('name', 'like', '%'.$search.'%')

        ->where('CustomerID', 'like', '%'.$search.'%') 

		->where('Status_st', '=', 'Subaccount')

		->where('CID', '=', $creditaccount)

        ->paginate(10);

		}

       

         return view('inventory/searchcustomer', compact('data'))->render();

 

    }

	function autocustomer2(Request $request)

    {

        $bussid = $request->bussid;

        $search = $request->search;

        $accountsource = $request->accountsource;

       

		if($accountsource=="Supplier")

		{

			$data = DB::table('vendo')

			->where('bussid', 'like', '%'.$bussid.'%')

			->where('name', 'like', '%'.$search.'%')

			->where('Status_st', '=', 'Supplier')

			->paginate(10);

		}

		else if($accountsource=="Customer")

		{

			

		}

		else if($accountsource=="Employee")

		{

			

		}

		else if($accountsource=="SubAccount")

		{

			 $creditaccount = $request->creditaccount;

			 

			 $user = DB::table('accounts')->where('accountno','=',$creditaccount)->where('bussid','=',session()->get('bussid'))->first();



			$data = DB::table('vendo')

			->where('bussid', 'like', '%'.$bussid.'%')

			->where('name', 'like', '%'.$search.'%')

			->where('Status_st', '=', 'Subaccount')

			->where('CID', '=', $user->id)

			->paginate(10);

		}

       

       

         return view('inventory/searchcustomer2', compact('data'))->render();

 

    }

    function autoaccount(Request $request)

    {

        $bussid = $request->bussid;

        echo "Account Name : ".$search = $request->search;

		

        $data = DB::table('accounts')

        ->where('bussid', '=', session()->get('bussid'))

        ->Where('account_name', 'like', $search.'%')

        ->orderBy('account_name', 'ASC')

        ->paginate(10);

      

        return view('inventory/searchaccount', compact('data'))->render();

 

    }

	function invoicetotal(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->Jno;

            $data = DB::table('journal_entry')

                     ->select(DB::raw('sum(GrandTotal) as GrandTotal'),DB::raw('sum(UnitPrice) as UnitPrice'),DB::raw('sum(Discount) as Discount'),DB::raw('sum(Vat) as Vat'),DB::raw('sum(points) as points'))

                     ->where('bussid','=',$bussid)

					 ->where('j_id','=',$m)

                     ->groupBy('j_id')

                     ->get();

			

			foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function getcode(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->pcode;

            $data = DB::table('xproduct')->where('bussid','=',$bussid)->where('pname','=',$m) 

            ->get();

            foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function textauto(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->pcode;

            $data = DB::table('xproduct')->where('bussid','=',$bussid) 

            ->get();

            foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function getsalesid(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->id;

            $data = DB::table('journal_entry')->where('bussid','=',$bussid)->where('je_id','=',$m) 

            ->get();

            foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function getcustomerdata(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->Supplier;

            $data = DB::table('vendo')->where('bussid','=',$bussid)->where('v_id','=',$m) 

            ->get();

            foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function getcustomerid(Request $request)

    {

      $bussid = $request->bussid;

      $Supplier = $request->Supplier;

            $data = DB::table('vendo')->where('bussid','=',$bussid)->where('v_id','=',$Supplier) 

            ->get();

            foreach($data as $row) {

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function getinvoiceno(Request $request)
    {

      $bussid = $request->bussid;

			$orderObj = DB::table('invoice_header')

			->select('jno')->where('bussid','=',session()->get('bussid'))

			->where( 'pagename','=','New Invoice')

			->where( 'invoicetype','=','Auto Invoice')

			->latest('jno')->first();

			if ($orderObj) {

			$orderNr = $orderObj->jno;

			$removed1char = substr($orderNr, 4);

			$data = $stpad = date('Y') . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);

			}

			else

			{

			$data = date('Y') . str_pad(1, 8, "0", STR_PAD_LEFT);

			}

            echo json_encode($data);

 

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

	

    function getaccdata(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->m;

            $data = DB::table('accounts')->where('bussid','=',$bussid)->where('accountno','=',$m) 

            ->get();

            foreach($data as $row) {

            //echo $row->Question;

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function get_vendorname(Request $request)

    {

      $bussid = $request->bussid;

        $m = $request->m;

            $data = DB::table('vendo')->where('v_id','=',$m) 

            ->get();

            foreach($data as $row) {

            //echo $row->Question;

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function get_creditaccount(Request $request)

    {

      $bussid = $request->bussid;

        $creditaccount = $request->creditaccount;

            $data = DB::table('accounts')->where('bussid','=',$bussid)->where('accountno','=',$creditaccount) 

            ->get();

            foreach($data as $row) {

            //echo $row->Question;

                  $data = $data;

            } 

            echo json_encode($data);

 

    }

	function get_cashbank(Request $request)

    {

      $bussid = session()->get('bussid');

      $cashtype = $request->cashtype;

?>

<select name="creditaccount" id="creditaccount" class="form-control"  style="width:200px">

<?php

			echo '<option value="-">Select-One</option>';

	   $data = DB::table('accounts')

       ->where('bussid','=',session()->get('bussid'))

        ->where('accountusage','=',$cashtype)

      

        ->get();

			// $data = DB::table('plhrc2')->where('bussid','=',$bussid)->orWhere('xhrc1','=',$level1) 

			// ->get();

			foreach($data as $row) {

			?>

			<option value="<?php echo $row->accountno ?>"><?php echo $row->account_name ?></option>

			<?php

			} 

			echo '</select>';

 

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

?>