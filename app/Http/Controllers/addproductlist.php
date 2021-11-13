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
		if($request->ajax())
		{
			//$sort_by = $request->get('sortby');
			$prdtype = $request->get('prdtype');
			//$sort_type = $request->get('sorttype');
			$query = $request->get('query');
			//$query = str_replace(" ", "%", $query);
			if($prdtype=="P.Code")
			{
				$data = DB::table('xproduct')
				->where('bussid', '=', session()->get('bussid'))
				->where('pcode', 'like', '%'.$query.'%')
				//->Where('pname', 'like', '%'.$query.'%')
				->orderBy('id', 'DESC')
				->paginate(10);
			}
			else
			{
			
				$data = DB::table('xproduct')
				->where('bussid', '=', session()->get('bussid'))
				//->where('pcode', 'like', '%'.$query.'%')
				->Where('pname', 'like', '%'.$query.'%')
				->orderBy('id', 'DESC')
				->paginate(10);
			}
		
     // DB::enableQueryLog(); 


			return view('inventory/itemlist_pagination_data', compact('data'))->render();
		}
    }

    function fetch_data(Request $request)
    {
		if($request->ajax())
		{
			$sort_by = $request->get('sortby');
			$prdtype = $request->get('prdtype');
			$sort_type = $request->get('sorttype');
			$query = $request->get('query');
			$query = str_replace(" ", "%", $query);
			if($prdtype=="P.Code")
			{
				$data = DB::table('xproduct')
				->where('bussid', '=', session()->get('bussid'))
				->where('pcode', 'like', '%'.$query.'%')
				//->Where('pname', 'like', '%'.$query.'%')
				->orderBy('id', 'DESC')
				->paginate(10);
			}
			else
			{
			
				$data = DB::table('xproduct')
				->where('bussid', '=', session()->get('bussid'))
				//->where('pcode', 'like', '%'.$query.'%')
				->Where('pname', 'like', '%'.$query.'%')
				->orderBy('id', 'DESC')
				->paginate(10);
			}
		
     // DB::enableQueryLog(); 


			return view('inventory/itemlist_pagination_data', compact('data'))->render();
		}
    }
	function test(Request $request)
    {
		$sort_by = $request->get('sortby');
		$sort_type = $request->get('sorttype');
		$query = $request->get('query');
		$query = str_replace(" ", "%", $query);
		$data = DB::table('xproduct')
		 ->where('bussid', '=', session()->get('bussid'))
		->orderBy('id', 'DESC')
		->paginate(10);
      return view('inventory/itemlist_pagination_data', compact('data'))->render();

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
            $user = DB::table('xproduct')->where('id','=',$IDatuo)->where('bussid','=',session()->get('bussid'))->first();
            $productcode = $user->pcode;

            $id = DB::table('journal_entry')
            ->where('pcode','=',$productcode)
            ->where('bussid','=',session()->get('bussid'))
            ->count('pcode');
            if($id>0)
            {
            echo "Exits";
            }
            else
            {
                $data = array(
                'ID'    =>  $IDatuo
                );
                // print_r($data);
                $sqlupdate = DB::table('xproduct')->where('id',$IDatuo)->delete($data);
                if($sqlupdate > 0)
                {
                echo "Delete";
                }
                else
                {
                echo "Failed";
                }
            }


         //echo json_encode($arr);
    }
    function yesdelete(Request $request)
    {
         $IDatuo = $request->get('user_id');
         echo '';
    }
    
}
