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

      //  $data = DB::table('productgroup')->paginate(10);

        return view('product/createNewitem');

    }

    function adddatapost(Request $request)

    {


$pcode=$request->pcode; 

$pname=$request->pname; 

$brand=$request->brand; 
$proudctqty=$request->proudctqty; 



         if($pcode =="" ||  $pname=="" || $brand=="" || $proudctqty =="")

         {

            echo "Required";

         }

         else{

             $id = DB::table('product')

            ->where('productid','=',$pcode)

            ->count('productid');

            if($id>0)

            {

                echo "warning";

            }

            else

			{

				    $user_id = Auth::user()->id;

                    $data = array(

                    'productid'    =>  $pcode,

                   'proudctname'    =>  $pname,
                   'productbrand'    =>  $brand,
                   'productquantity'    =>  $proudctqty,
                   'galleryimage'    =>  '',
                   'EnteredBy'    =>  $user_id,
                   'UpdateBy'    =>  '',

                    'uploaddatetime' =>  date('Y-m-d h:i:sa')

                    );

                    $id = DB::table('product')->insert($data);

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




    function yesdelete(Request $request)

    {

         $IDatuo = $request->get('user_id');

         echo '';

    }

    

}

?>