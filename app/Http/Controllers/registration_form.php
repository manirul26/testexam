<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; 

use DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Session;

use App\Http\Controllers\Redirect;

use Illuminate\Support\Facades\Auth;

use Response;

use Mail;

class registration_form extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

    }

    public function index()

    {

        return view('registration/register');

    }

    function store(Request $request)

    {

	$address = addslashes($request->address);

	$MobileNo=addslashes($request->MobileNo);

	$username=addslashes($request->MobileNo);

	$busstype=addslashes($request->busstype);

	$Currency=addslashes($request->Currency);

	$country=addslashes($request->country);

	$paymenttype=addslashes($request->paymenttype);

		if($address=="" || $MobileNo=="" || $busstype=="" || $Currency=="" || $paymenttype=="")

         {

			$arr = array('message' => 'Insert the Required Fields', 'title' => 'warning');

              return back()->with($arr);

         }

         else{

			$user_id = Auth::user()->id;

			

             $id = DB::table('companyinformation')

            ->where('c_phone','=',$MobileNo)

            ->count('c_phone');

            if($id>0)

            {

				$arr = array('message' => 'Phone No Already Exits', 'title' => 'warning');

              return back()->with($arr);

            }

            else{

				

				

				$data = DB::table('users')

				->where('id','=',$user_id)

				->get();

				foreach($data as $row) 
				{

				$companyname =  $row->name;

				$email =  $row->email;

				}

$date= date('Y-m-d');

$date4 = str_replace('-', '/', $date);		

$expairdate = date('Y-m-d',strtotime($date4 . "+7 days"));
$code = substr(mt_rand(), 0, 6);		


	


						$data = array(

						'c_name'    =>  $companyname,

						'c_legalName'    =>  $companyname,

						'c_street1'    =>  $address,

						'c_phone'    =>  $MobileNo,

						'xuser'    =>  $MobileNo,

						'currency'    =>  $Currency,

						'pinno'    =>  $code,

						'c_taxid'    =>  'c_taxid',

						'c_country'    =>  $country,

						'c_state'    =>  'BD',

						'c_street2'    =>  'BD',

						'c_city'    =>  $busstype,

						'c_zipcode'    =>  'BD',

						'c_fax'    =>  $paymenttype,

						'c_email'    =>  $email,

						'c_web'    =>  'www',

						'c_timezone'    =>  'www',

						'CompanyList'    =>  '0',

						'companylimit'    =>  '1',

						'termonoly_customer'    =>  '0',

						'termonoly_vendor'    =>  '0',

						'UserAutoID'    =>  $user_id,

						'exparieddate'    =>  $expairdate,

						'xdate' =>  date('Y-m-d'),

						'xtime' =>  date('Y-m-d h:i:sa')

						); 

						$ids = DB::table('companyinformation')->insert($data);

						if($ids > 0)

						{

							$data_user = array(

							'companyname'    =>  $MobileNo,

							'UserType' =>  'Admin'

							);

							$iduser = DB::table('users')->where('id','=',$user_id)->update($data_user);

							

							 session()->put('bussid', $MobileNo);

						

							$datas = DB::table('category') 

							->get();

							foreach($datas as $row) {

								

								$datass = array(

								'UserID'    =>  $email,

								'CategoryID' =>  $row->id,

								'EnteredBy' =>$email

								);

								$ids = DB::table('usercategory')->insert($datass);

							}

							

							    $pagename_date = DB::table('pagename')->get();

								foreach($pagename_date as $row) {

									$data_page = array(

									'xuser'    =>  $email,

									'module' =>  $row->id,

									'enterby' =>$email

									);

									$idsg = DB::table('xpermision')->insert($data_page);

									

								}

$date = date('Y-m-d');

$data_Customer = array(

'CustomerID'=>'ACC-00000',

'Date'=>$date,

'name'=>'Rahim Enterprize',

'vendosince'=>$date,

'status'=>'Active',

'bussid' =>$username,

'EnteredBy' => $username,

'balance' => "0", 

'balanceas' => "000",

'bal' => '0',

'addr' => 'xxxx',

'phone' => 'x', 

'Mobile' => 'x',

'District' => 'x',

'Thana' => 'x',

'fax' => 'x',

'mail' => 'x',

'web' => 'x',

'EnteredTime' => date('Y-m-d h:i:sa'),

'time' =>  date('Y-m-d h:i:sa'),

'Status_st' => 'Customer',

'billtype' =>'x',

'VoucherID' =>'',

'comments' =>'xxxx');

$idsg = DB::table('vendo')->insert($data_Customer);	

$data_supplier = array(

'CustomerID'=>'SUP-00000',

'Date'=>$date,

'name'=>'Rahim Enterprize',

'vendosince'=>$date,

'status'=>'Active',

'bussid' =>$username,

'EnteredBy' => $username,

'balance' => "0", 

'balanceas' => "000",

'bal' => '0',

'addr' => 'xxxx',

'phone' => 'x', 

'Mobile' => 'x',

'District' => 'x',

'Thana' => 'x',

'fax' => 'x',

'mail' => 'x',

'web' => 'x',

'EnteredTime' => date('Y-m-d h:i:sa'),

'time' =>  date('Y-m-d h:i:sa'),

'Status_st' => 'Supplier',

'billtype' =>'x',

'VoucherID' =>'',

'comments' =>'xxxx');

$idsg = DB::table('vendo')->insert($data_supplier);	

$data_product = array(

'pcode'=>'1000',

'Productgroup'=>'General',

'Productcategory'=>'General',

'pname'=>'Software Sales',

'Unit'=>'PCS',

'vat'=>'0',

'unitcose'=>'2000',

'salesprice'=>'2000',

'Discount'=>'5',

'bussid'=>$username,

'Description'=>'x',

'xcolor'=>'x',

'EnteredBy'=>$username,

'xsize'=>'x',

'Product_Subcategory'=>'x',

'assetacc'=>'x',

'points'=>'0',

'alertstock'=>'0',

'DPPrice'=>'2000',

'openingbal'=>'0',

'openingDate'=>date('Y-m-d'),

'Status'=>'Active',

'EnteredTime'=>$date

);

$idsgd = DB::table('xproduct')->insert($data_product);	

$data_Sales = array(

'accounttype'=>'Direct Income',

'accountno'=>'1000',

'account_name'=>'Sales Income',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>$date,

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Ledger',

'accountsource'=>'None',
'systemaccount'=>'System Account',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idsgd = DB::table('accounts')->insert($data_Sales);

$dataexpences = array(

'accounttype'=>'Direct Expense',

'accountno'=>'1001',

'account_name'=>'Office Rent',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>$date,

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Ledger',

'accountsource'=>'None',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idsgd = DB::table('accounts')->insert($dataexpences);

$datacashbook= array(

'accounttype'=>'Current Asset',

'accountno'=>'1002',

'account_name'=>'Cash',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>date('Y-m-d'),

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Cash',

'accountsource'=>'None',
'systemaccount'=>'System Account',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idsgd = DB::table('accounts')->insert($datacashbook);	

$databankbook= array(

'accounttype'=>'Current Asset',

'accountno'=>'1003',

'account_name'=>'Dutch Bangla Bank',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>date('Y-m-d'),

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Bank',

'accountsource'=>'None',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idsgd = DB::table('accounts')->insert($databankbook);

$dataaccountreceive= array(

'accounttype'=>'Current Asset',

'accountno'=>'1004',

'account_name'=>'Customer Receivable',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>date('Y-m-d'),

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Ledger',

'accountsource'=>'None',
'systemaccount'=>'System Account',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idsgdd = DB::table('accounts')->insert($dataaccountreceive);	

$dataaccountpayment= array(

'accounttype'=>'Direct Expense',

'accountno'=>'1005',

'account_name'=>'Supplier Payable',

'Status'=>'Active',

'subaccount'=>'',

'op_bal'=>'0',

'as_of_date'=>date('Y-m-d'),

'cur_bal'=>'0',

'comments'=>'x',

'bussid'=>$username,

'level1'=>'',

'level2'=>'',

'level3'=>'',

'xuser'=>$username,

'zuser'=>$username,

'accountusage'=>'Ledger',

'accountsource'=>'None',
'systemaccount'=>'System Account',

'EnteredTime'=>date('Y-m-d h:i:sa')

);

$idpay = DB::table('accounts')->insert($dataaccountpayment);			

return redirect('/home');

							

						}

                    

            }

                

         }



    }

   

    

}

?>