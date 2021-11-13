@extends('layouts.app3')

@section('content')
<?php $userid = session()->get('bussid'); ?>
<div class="content-wrapper" style="background-color: #d7eff5; margin-bottom: 50px; min-height: 700px">
    <div class="container-fluid">

    <div class="row">
        <div class="col-md-12" style="background-color: white;padding: 17px;">
         <form action="productreportview" method="post" style="">
            @csrf
              <div class="form-group col-md-12" style="text-align: center;"> 
                <h3>Product Report</h3>
              </div>             
				      <div class="form-group">
                      <label for="firstname" class="col-md-2 control-label">From Date</label>
                      <div class="col-md-2">
                      <input type="date" name="fromdate" id="fromdate" class="form-control" value="" required="" />
                     
                      </div>
                      <label for="firstname" class="col-md-2 control-label">To Date</label>
                      <div class="col-md-2">
                      <div id='journalautono'>
                      <input type="date" name="todate" id="todate" value="" class="form-control todate" required="" />  
                      </div>  


                      </div>  
                      <label for="firstname" class="col-md-1 control-label"></label>
                      <div class="col-md-4">
                          <input type="submit" name="insert" class="btn btn-primary addcategory" value="Show">
                     
                      </div> 
        </form>
      </div>
        </div>
    </div>
   <div class="row">
        <div class="col-xs-12"> 
          <div class="form-group" style="margin-top: 20px;">

              <div class="box-body table-responsive">
              
                <div id="flash"></div>
                <div id="showdata"></div>
              </div>
          </div>
        </div>
    </div>
		</div>
		</div>
</div>
<script type="text/javascript" src="{{ asset('Asset/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Asset/js/toastr.min.js') }}"></script>
<link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/js/toastr.min.css') }}"/>
<link href="{{ asset('Asset/sweetAlert/sweetalert.css')}}" rel="stylesheet">
<script src="{{ asset('Asset/sweetAlert/sweetalert.js')}}"></script>






<!------ Include the above in your HEAD tag ---------->



@endsection
