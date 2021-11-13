<!Doctype html>
<html>
<head>
<title>Invoice</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>	
</head>
<style>
.pagesetup {
width:8.3in;
height:11.7in;
border:0px solid red;
page-break-after: always; border-bottom:0px solid green;
background-color:white;
padding:10px;
size: A4 landscape;

}
@page { margin: 2cm; size:A4 landscape;} -->
</style>
<body>
<div class="container">
<div style="margin:0 auto; width:100%; border:1px solid silver; padding: 10px;">
	<table><tr><td>
	
	<a href="#" onclick="javascript:printDiv('printablediv')">
<span class="fa fa-print" title="Print"></span></a>
<a href="{{ route('productreport') }}">
<span class="glyphicon glyphicon-step-backward" title="Back"></span>
</a>
	</td>
	<td>
	
	</td>
	</tr></table>
</div>
<div id="printablediv" style="margin-top:20px; width: 100%;">
<div class="pagesetup_">
<table id="example1" class="table table-bordered table-striped" style="font-size:12px; margin-top:20px;">
<tr class='trHeader' style='background-color: #C6CEE7;'>
<th>SL No</th>
<th>Date</th>
<th>Product Code</th>

<th>Proudct Name</th>
<th>Des</th>
<th>Color</th>
<th>Size</th>
<th>Qty</th>

<th>Purchase Price</th>
<th>DPPrice</th>
<th>Sales Price</th>
<th>Discount</th>
<th>Vat</th>
<th>Point</th>
<th>Grand Total</th>


</tr>
<?php $i=0;$gtotalQty=0; $gtotalunitcose=$gtotalGrd=0; 
$gtotalDPPrice=$gtotalsalesprice=$gtotalDiscount=$gtotalvat=$gtotalpoints=0;
?>
@foreach($data as $row)
<?php $i++; 

$gtotalQty += $row->RecQty;
$gtotalunitcose += $row->unitcose;
$gtotalDPPrice += $row->DPPrice;
$gtotalsalesprice += $row->salesprice;
$gtotalDiscount += $row->Discount;
$gtotalvat += $row->Vat;
$gtotalpoints += $row->points;
$gtotalvat += $row->Vat;
$gtotalGrd += $row->RecQty*$row->DPPrice;
?>
<tr>
	<td>{{$i}}</td>
	<td><?php echo date('d-m-Y',strtotime($row->xdate)) ?></td>
<td>{{ $row->pcode }}</td>

<td>{{ $row->pname}}</td>
<td>{{ $row->Description }}</td>

<td>{{ $row->xcolor}}</td>
<td>{{ $row->xsize }}</td>
<td>{{ $row->RecQty }}</td>
<td>{{ $row->unitcose}}</td>
<td>{{ $row->DPPrice}}</td>
<td>{{ $row->salesprice }}</td>

<td>{{ $row->Discount}}</td>
<td>{{ $row->Vat }}</td>
<td>{{ $row->points }}</td>
<td>
	{{ $row->RecQty*$row->DPPrice}}
</td>

</tr>
@endforeach

<tr>
	<td colspan="7"> Grand Total</td>
<td><?php echo $gtotalQty; ?></td>
<td><?php echo $gtotalunitcose ?></td>
<td><?php echo $gtotalDPPrice ?></td>
<td><?php echo $gtotalsalesprice ?></td>

<td><?php echo $gtotalDiscount ?></td>
<td><?php echo $gtotalvat ?></td>
<td><?php echo $gtotalpoints ?></td>
<td>
	<?php echo $gtotalGrd ?>
</td>

</tr>
</table>
</div>
</div>

</body>
</html>