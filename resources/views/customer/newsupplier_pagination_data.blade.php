<?php
$user_id = Auth::user()->id;
$user = DB::table('users')->where('id','=',$user_id)->first();
$username = $user->email;
?>
@foreach($data as $row)
<?php
$CustomerID = $row->CustomerID;

?>
<tr>
	<td>{{ $row->v_id}}</td>
<td>{{ $row->CustomerID}}</td>
<td>{{ $row->name }}</td>

<td>{{ $row->addr}}</td>
<td>{{ $row->phone }}</td>


<td>{{ $row->vendosince }}</td>
<td>

<?php
// Opening balance
$crdata = DB::table('customerledger')
->select(DB::raw('(sum(`debit`)) as debit'), DB::raw('(sum(`credit`)) as credit'))
->where('accountname','=','Opening balance')
->where('CustomerID','=',$CustomerID)
->where('bussid','=',session()->get('bussid'))
->first();	
if( $crdata)
{
 // $opcredit = $crdata->credit;
  $opdebit = $crdata->debit;
  //$op_balance = $opcredit - $opdebit;
 
}
//Adjust Amount
$opdata = DB::table('customerledger')
->select(DB::raw('(sum(`debit`)) as debit'), DB::raw('(sum(`credit`)) as credit'))
->where('accountname','=','Adjust Amount')
->where('CustomerID','=',$CustomerID)
->where('bussid','=',session()->get('bussid'))
->first();	
if( $opdata)
{
 $opbalanceadjust = $opdata->credit;
 if($opbalanceadjust=="")
 {
	$opbalanceadjust = 0;
 }
}
//pending Invoice
$opendingData = DB::table('pending_invoice')
->select(DB::raw('(sum(`packageamount`)) as packageamount'))
->where('CustomerID','=',$CustomerID)
->first();	
if( $opendingData)
{
 $gpendinginvocie = $opendingData->packageamount;
 if($gpendinginvocie=="")
 {
	$gpendinginvocie = 0;
 }
}
///////////////////////

$openings = $opdebit - $opbalanceadjust - $gpendinginvocie;
echo number_format($openings);

?>	


</td>

<td>
<?php
$editpermission = DB::table('usercategory')
->where('CategoryID','=','31')
->where('UserID','=',$username)
->count('UserID');
if($editpermission>0)
{	
?>
	<a href="{{ url('newcustomer_listEdit/'.$row->VoucherID.'/edit') }}">
	{{ $row->VoucherID}}
	</a>
<?php 
} 
?>
</td>
<!-- <td>
<a href="{{ url('newcustomer_op/'.$row->v_id.'/edit') }}">Opening Balance</a>
</td> -->
<td><a href="{{ url('paymentvoucher') }}">Payment</a></td>
<td>
<?php
$editpermission = DB::table('usercategory')
->where('CategoryID','=','31')
->where('UserID','=',$username)
->count('UserID');
if($editpermission>0)
{	

?>
<a href="{{ url('newcustomer_listEdit/'.$row->v_id.'/edit') }}">Edit</a>
<?php
}
?>

</td>
<td>
<?php
$deletepermission = DB::table('usercategory')
->where('CategoryID','=','32')
->where('UserID','=',$username)
->count('UserID');
if($deletepermission>0)
{	
?>  
  <button id="{{ $row->v_id}}" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </button>
<?php 
}
?>  
</td>
</tr>
@endforeach
<tr>
<td colspan="11" align="center">
{!! $data->links() !!}
</td>
</tr>
