<!DOCTYPE html>

<html lang="en">

    <head>        

        <!-- META SECTION -->

        <title>Test</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        

        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/css/theme-default.css') }}"/>

        <!-- EOF CSS INCLUDE -->                                    

    </head>

    <body>

        <!-- START PAGE CONTAINER -->

        <div class="page-container">

            

            <!-- START PAGE SIDEBAR -->

            <div class="page-sidebar">

                <!-- START X-NAVIGATION -->

                <ul class="x-navigation">

                    <li class="xn-logo">

                        <a href="{{ route('home') }}" style="font-size: 14px;">Test</a>

                        <a href="#" class="x-navigation-control"></a>

                    </li>

                     <li class="active">

                        <a href="{{ route('home') }}"><span class="fa fa-desktop"></span> <span class="xn-text" >Dashboard 

						<?php //$username = session()->get('username'); 

						

						$user_id = Auth::user()->id;

						$user = DB::table('users')->where('id','=',$user_id)->first();

						$username = $user->email;

						

						?>

						</span></a>                        

                    </li> 

                          
<li><a href="{{ route('addproductlist') }}"><span class="fa fa-image"></span>Product</a></li>


</ul>
</li>                            
	
 <li class="xn-openable">

                        <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">Contact</span></a>

                        <ul>
    

                                                     

                        </ul>

                    </li>	
       		

                    <li class="xn-openable">

                        <a href="{{ route('logout') }}"> <span class="xn-text">Log Out</span></a>

                      

                    </li>

                  

                    

                </ul>

                <!-- END X-NAVIGATION -->

            </div>

            <!-- END PAGE SIDEBAR -->

            

            <!-- PAGE CONTENT -->

        <div class="page-content"  style="background-color: white">

            

            

                            <!-- START X-NAVIGATION VERTICAL -->

                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">

                    <!-- TOGGLE NAVIGATION -->

                    <li class="xn-icon-button">

                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent">

                            



                        </span></a>

                    </li>

                    <!-- END TOGGLE NAVIGATION -->

                    <!-- SEARCH -->

                    <li class="xn-search">

                        <form role="form">

                            <input type="text" name="search" placeholder="Search..."/>

                        </form>

                    

                    </li> 

                    <li style="padding: 15px;color: white;">

                       User Name : {{ Auth::user()->name }}

                    </li>  

                    <!-- END SEARCH -->

                    <!-- SIGN OUT -->

                    <li class="xn-icon-button pull-right">

                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        

                    </li> 

                    <!-- END SIGN OUT -->

                    <!-- MESSAGES -->

                    <li class="xn-icon-button pull-right">

                        <a href="#"><span class="fa fa-comments"></span></a>

                        <div class="informer informer-danger">0</div>

                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">

                            <div class="panel-heading">

                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                

                                <div class="pull-right">

                                    <span class="label label-danger">0 new</span>

                                </div>

                            </div>


                            <div class="panel-footer text-center">

                                <a href="pages-messages.html">Show all messages</a>

                            </div>                            

                        </div>                        

                    </li>



                    <!-- END TASKS -->

                </ul>



            



                

                @yield('content')

        </div>

        <!-- END PAGE CONTAINER -->



        <!-- MESSAGE BOX-->

        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">

            <div class="mb-container">

                <div class="mb-middle">

                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>

                    <div class="mb-content">

                        <p>Are you sure you want to log out?</p>                    

                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>

                    </div>

                    <div class="mb-footer">

                        <div class="pull-right">

						

						 <a class="nav-link" href="{{ route('logout') }}" class="btn btn-success btn-lg"

            onclick="event.preventDefault();

            document.getElementById('logout-form').submit();">

            {{ __('Logout') }} Yes

            </a>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            @csrf

            </form>

						

                            <!--<a href="{{ route('logout') }}" class="btn btn-success btn-lg">Yes</a>-->

                            <button class="btn btn-default btn-lg mb-control-close">No</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- END MESSAGE BOX-->



        <!-- START PRELOADS -->

        <audio id="audio-alert" src="{{ asset('Asset/audio/alert.mp3') }}" preload="auto"></audio>

        <audio id="audio-fail" src="{{ asset('Asset/audio/fail.mp3') }}" preload="auto"></audio>

        <!-- END PRELOADS -->                  

        

    <!-- START SCRIPTS -->

        <!-- START PLUGINS -->

		

<script type="text/javascript" src="{{ asset('Asset/js/plugins/jquery/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('Asset/js/plugins/jquery/jquery-ui.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap.min.js') }}"></script>



<!-- this is for auto complete text box -->

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- this is for auto complete text box -->

<!--

auto complete suggesstion



<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->

		

        <!-- END PLUGINS -->



        <!-- START THIS PAGE PLUGINS-->        

        <script type='text/javascript' src="{{ asset('Asset/js/plugins/icheck/icheck.min.js') }}"></script>        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>

        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/morris/raphael-min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/morris/morris.min.js') }}"></script>       

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/rickshaw/d3.v3.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/rickshaw/rickshaw.min.js') }}"></script>

        <script type='text/javascript' src="{{ asset('Asset/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>

<script type='text/javascript' src="{{ asset('Asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>                

<script type='text/javascript' src="{{ asset('Asset/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script> 

<script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap-colorpicker.js')}}"></script>





        <script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap-timepicker.min.js')}}"></script>		

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/owl/owl.carousel.min.js')}}"></script>                 

        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/moment.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <!-- END THIS PAGE PLUGINS-->        



        <!-- START TEMPLATE -->

        <script type="text/javascript" src="{{ asset('Asset/js/settings.js') }}"></script>

        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins.js') }}"></script>        

        <script type="text/javascript" src="{{ asset('Asset/js/actions.js') }}"></script>

        

        <script type="text/javascript" src="{{ asset('Asset/js/demo_dashboard.js') }}"></script>

	

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>

      <!--  <script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap-select.js')}}"></script> -->

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>

        <!-- END THIS PAGE PLUGINS -->       

        

        <!-- START TEMPLATE -->

          <script type='text/javascript' src="{{ asset('Asset/js/plugins/validationengine/languages/jquery.validationEngine-en.js')}}"></script>

        <script type='text/javascript' src="{{ asset('Asset/js/plugins/validationengine/jquery.validationEngine.js')}}"></script>        



        <script type='text/javascript' src="{{ asset('Asset/js/plugins/jquery-validation/jquery.validate.js')}}"></script>

			 



		<!-- HOme Page Chart -->

		<!--<script src="{{ asset('Asset/js/chartJS/Chart.min.js') }}"></script> -->

		<!-- Page level custom scripts -->

	<!--	<script src="{{ asset('Asset/js/chartJS/chart-area-demo.js') }}"></script>

		<script src="{{ asset('Asset/js/chartJS/chart-pie-demo.js') }}"></script>

		<script src="{{ asset('Asset/js/chartJS/chart-bar-demo.js') }}"></script>	-->

		<!-- End Home page chart -->

		





    <script>

$(document).ready(function() {

//alert('DDDDfff');

});

</script>      

    </body>

</html>













