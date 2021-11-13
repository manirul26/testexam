<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;


class addproductlist extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product/createNewitemlist');
    }
    function finddatalist(Request $request)
    {
    }

    function fetch_data(Request $request)
    {
		if($request->ajax())
		{
	$sort_by = $request->get('sortby');		$sort_type = $request->get('sorttype');		$query = $request->get('query');		$query = str_replace(" ", "%", $query);		$data = DB::table('product')		->orderBy('productid', 'DESC')		->paginate(10);

			return view('product/itemlist_pagination_data', compact('data'))->render();
		}
    }
	function test(Request $request)
    {
		$sort_by = $request->get('sortby');
		$sort_type = $request->get('sorttype');
		$query = $request->get('query');
		$query = str_replace(" ", "%", $query);
		$data = DB::table('product')
		->orderBy('productid', 'DESC')
		->paginate(10);
      return view('product/itemlist_pagination_data', compact('data'))->render();

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

            $IDatuo = $request->get('user_id');
               $data = array(
                'productid'    =>  $IDatuo
                );
                // print_r($data);
                $sqlupdate = DB::table('product')->where('productid',$IDatuo)->delete($data);
                if($sqlupdate > 0)
                {
                echo "Delete";
                }
                else
                {
                echo "Failed";
                }
    }
    function yesdelete(Request $request)
    {
         $IDatuo = $request->get('user_id');
         echo '';
    }
    
}
