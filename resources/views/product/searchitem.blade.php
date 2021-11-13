<style>
.close_btn_umzugsgutliste img:hover {
    fill: red;
}
.groupis :hover{
background-color: yellow;
}
.allitemlist
{
border:3px soild black;
}
tr .allitemlist
{
padding-top:0px;
}
table .allitemlist
{
height:auto;
}
table .divhr tr:hover 
{
  background-color:#3C8DBC;

}
table tr
{
  border: 1px solid silver;
}
</style>
<?php
$search = $_GET['search'];
$bussid = $_GET['bussid'];
$id = DB::table('xproduct')
->where('bussid', 'like', '%'.$bussid.'%')
//->where('pcode', 'like', '%'.$search.'%')
->Where('pname', 'like', '%'.$search.'%')
->count('pname');
if($id>0)
{

?>
<table  class="divhr" style='position:absolute; z-index:9999; background:silver; overflow:scroll; border: 1px solid #aeaeae;
background: #fff;width: 400px;font-size: 14px;
box-shadow: 0 1px 2px rgba(0,0,0,.2);
margin: 0px;' cellspacing='0' cellpadding=\"3\">
<tr style=' border-bottom:0px solid #bbbbbb;'>
<td><span style='float: left;
    margin-left: 9px;
    font-size: 12px;
    color: #bbbbbb;

  '>Product List : Search By : <?php echo $_GET['search']; ?></span>
  </td><td>
  <div class='close_btn_umzugsgutliste' onClick="opensearch_closediv(<?php echo $_GET['s'] ?>)">
<i class="fa fa-trash-o pull-right" style="
    margin: 5px;
"></i>
  

</td></tr>
<tr style="background-color: #3C8DBC;">
<td>Proudct Code</td>
<td>Product Name</td>

</tr>
@foreach($data as $row)

<tr>
<td onclick="storeData({{ $row->pcode}},{{ $_GET['s']}})">
  <p style="padding: 4px;">{{ $row->pcode}}</p>

</td>
<td onclick="storeData({{ $row->pcode}},{{ $_GET['s']}})">  <p style="padding: 4px;">{{ $row->pname}}</p></td>

</tr>
@endforeach
  
</table>
<?php
}

else
{

}
?>

