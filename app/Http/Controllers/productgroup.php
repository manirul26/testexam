<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Auth;

class productgroup extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('productgroup')->paginate(10);
        return view('inventory/category', compact('data'));
    }
    
    function adddatapost(Request $request)
    {
        $FullName=$request->FullName; 
           
         if($FullName =="")
         {
             echo "info";
            $arr = array('message' => 'Required Field', 'title' => 'Information');
         }
         else{
             $id = DB::table('productgroup')
            ->where('PoductGroupName','=',$FullName)
            ->where('BussId','=',session()->get('bussid'))
            ->count('PoductGroupName');
            if($id>0)
            {
                echo "warning";
				$arr = array('message' => 'Already Exits', 'title' => 'warning');
            }
            else{
				$user_id = Auth::user()->id;
                    $data = array(
                    'PoductGroupName'    =>  $FullName,
                    'BussId' => session()->get('bussid'),
                    'BranchId' => '100',
                    'EnteredBy' =>  $user_id,
                    'EnteredTime' =>  date('Y-m-d h:i:sa'),
                    'Status' =>  '1'
                    );
                    $id = DB::table('productgroup')->insert($data);
                    if($id > 0)
                    {
						  echo "success";
						  $arr = array('message' => 'Update Successfully', 'title' => 'Successfully');
                    }
            }
                
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
			->where('BussId', '=', session()->get('bussid'))
			->orderBy('ID', 'DESC')
			->paginate(10);
      return view('inventory/pagination_data', compact('data'))->render();

    }
    function update_data(Request $request)
    {
       $FullNameEdit=$request->FullNameEdit; 
       $IDEdit=$request->IDEdit; 
        $status_edit=$request->status_edit; 
         if($FullNameEdit =="" || $IDEdit == "")
         {
            $arr = array('message' => 'Required Field', 'title' => 'Information');
         }
         else{
  
                    $user_id = Auth::user()->id;
                    $data = array(
                    'PoductGroupName'    =>  $FullNameEdit,
                    'BussId' => session()->get('bussid'),
                    'BranchId' => '100',
                    'UpdateBy' =>  $user_id,
                    'UpdateTime' =>  date('Y-m-d h:i:sa'),
                    'Status' =>  $status_edit
    
                    );

                    $sqlupdate = DB::table('productgroup')->where('ID',$IDEdit)->update($data);
                    if($sqlupdate > 0)
                    {
                      $arr = array('message' => 'Update Successfully', 'title' => 'success');
                    }
          
            
                
         }
         echo json_encode($arr);
    }
    function finddata(Request $request)
    {
		$IDatuo = $request->post('user_id');
		$itemstestname = array(
		'itemlisttestname' =>  DB::table('productgroup')->where('ID',$IDatuo)->get()
		);
		return view('inventory/category_edit', $itemstestname);
    }
    function deleteinfo(Request $request)
    {
      
            $IDatuo = $request->get('user_id');
      		$id = DB::table('xproduct')
			->where('Productgroup','=',$IDatuo)
			->where('bussid','=',session()->get('bussid'))
			->count('Productgroup');
			if($id>0)
			{
	            echo "Cannot Delete";

			}
			else
			{
				  $data = array(
					'ID'    =>  $IDatuo
					);
                    $sqlupdate = DB::table('productgroup')->where('ID',$IDatuo)->delete($data);
                    if($sqlupdate > 0)
                    {
                     echo "Delete Successfully";
                    }
                    else
                    {
                      echo "Failed to Delete";
                    }
			}
					
    }
    function yesdelete(Request $request)
    {
         $IDatuo = $request->get('user_id');
         echo '';
    }
    
}
?>