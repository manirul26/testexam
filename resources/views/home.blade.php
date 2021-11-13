@extends('layouts.app3')



@section('content')



            

                

                <!-- PAGE CONTENT WRAPPER -->

                <div class="page-content-wrap" style="background-color: white">

                    

                    <!-- START WIDGETS -->                    



				<div class="row">

					<div class="col-md-12"> <!-- here -->

       <!--start chart --->   

        <!-- Begin Page Content -->

        <div class="container-fluid" style=" margin-top: 15px;">

          <!-- Content Row -->
             <div class="row">
                    <div class="col-md-12">
                      
<?php
$user_id = Auth::user()->id;

$dataemails = DB::table('users')
->where('id',$user_id)
->first();
$email =  $dataemails->email;



$dataemail = DB::table('xverify')
->where('emailaddress',$email)
->where('type','Signup Verification')
->first();
$status =  $dataemail->status;

if($status == 'Not Verify')
{
?>
 <div class="alert alert-primary" role="alert" style="background-color: #F5F5F5">
 <a href=""> <b>Verify Email Address from your email.
 Verify Now ! </b></a>
</div>
<?php 
}
else
{
?>
 <div class="alert alert-primary" role="alert" style="background-color: #F5F5F5">
 <a href=""> <b>Verifed Account.
</b></a>
</div>
<?php
 } 

?>
                    </div>

             </div>
          <div class="row">



            <div class="col-xl-8 col-lg-7">



              <!-- Area Chart -->

              <div class="card shadow mb-4">

  <div class="panel panel-default">

                <div class="panel-heading">

                    <h3>Area Series</h3>

                </div>

                <div class="panel-body">

                  <div class="chart-area">

                    <canvas id="myAreaChart"></canvas>

                  </div>

                </div>

  </div>				



              </div>



              <!-- Bar Chart -->

              <div class="card shadow mb-4">

                <div class="card-body">

				  <div class="panel panel-default">

								<div class="panel-heading">

									<h3>Bar Chart</h3>

								</div>

								<div class="panel-body">

								  <div class="chart-bar">

									<canvas id="myBarChart"></canvas>

								  </div>

								</div>

				  </div>				

                 <!-- <hr>

                  Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.-->

                </div>

              </div>



            </div>



            <!-- Donut Chart -->

            <div class="col-xl-4 col-lg-5">

             

  <div class="panel panel-default">

                <div class="panel-heading">

                    <h3>Donut Chart</h3>

                </div>

                <div class="panel-body">

                  <div class="chart-pie pt-4">

                    <canvas id="myPieChart"></canvas>

                  </div>

                </div>

  </div>			

            <!-- -->    





            </div>

          </div>



        </div>

        <!-- /.container-fluid -->                

<!-- end chat --->                   



        </div>

     

    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3>Area Series</h3>

                </div>

                <div class="panel-body">

                    <div id="chart3"></div>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3>StepLine Series</h3>

                </div>

                <div id="chart4" class="panel-body">

                </div>

            </div>

        </div>

    </div>   

					</div> <!-- here -->

				</div>

                <!-- END PAGE CONTENT WRAPPER -->                                

            </div>            

            <!-- END PAGE CONTENT -->









@endsection

