<!DOCTYPE html>

<html lang="en">

    <head>        

        <title>Test</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/css/theme-default.css') }}"/>

                               

    </head>

    <body style="background-color: white;">

        <!-- START PAGE CONTAINER -->

        <div class="page-container" style="background-color: white;min-height: 700px; overflow: auto;">

        <div class="row">

             <div class="col-xs-12">

                <div style="

                font-size: 12px;width: 30%;

                margin: 0 auto; text-align: center; margin-top: 40px">

		    <!-- <img alt="Test" src="{{ asset('Asset/websitetemplate/img/logo/logo.png') }}" class=""> -->
			
				<a href="{{ route('logout') }}" style="font-size: 16px; margin-right: 5px">Add Product</a>
				<a href="{{ route('addproductlist') }}"  style="font-size: 16px; margin-right: 5px">Product List</a>
				
				<a class="nav-link" href="{{ route('logout') }}" class="btn btn-primary"

            onclick="event.preventDefault();

            document.getElementById('logout-form').submit();" style="font-size: 17px;">

            {{ __('Logout') }}

            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            @csrf

            </form>

                </div>

            </div>

            <div class="col-xs-12">

<div style="margin: 0 auto; height: 250px; width: 50%; border: 0px solid silver; margin-top: 20px;">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                         <div class="col-xs-12">
                            <a href="{{ route('home')}}" style="color: white; font-size: 14px;">
                                Back to Dashboard
                            </a>
                        </div>
                    @endif
                    @if (Session::has('failed'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('failed') }}</p>
                        </div>
                    @endif
    

@if(Session::has('global'))

<h3 style="color:red; font-size: 15px;text-align: center;">{{ Session::get('global') }}</p>

@endif


</div>            

                

                <table style="margin: 0 auto; margin-top:30px;">

                <tr>

                <td>

                    



                    

                </td>

                </tr>

                </table>    

            </div>

              </div>

</div>

        </div>           

<!-- END PAGE CONTENT -->

</div>

 <!-- START PRELOADS -->

        <audio id="audio-alert" src="{{ asset('Asset/audio/alert.mp3') }}" preload="auto"></audio>

        <audio id="audio-fail" src="{{ asset('Asset/audio/fail.mp3') }}" preload="auto"></audio>

        <!-- END PRELOADS -->                  

        

    <!-- START SCRIPTS -->

        <!-- START PLUGINS -->

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/jquery/jquery.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/jquery/jquery-ui.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/bootstrap/bootstrap.min.js') }}"></script>        

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

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/owl/owl.carousel.min.js')}}"></script>                 

        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/moment.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('Asset/js/plugins/daterangepicker/daterangepicker.js') }}"></script>

        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->

        <script type="text/javascript" src="{{ asset('Asset/js/settings.js') }}"></script>

        

        <script type="text/javascript" src="{{ asset('Asset/js/plugins.js') }}"></script>        

        <script type="text/javascript" src="{{ asset('Asset/js/actions.js') }}"></script>

        

        <script type="text/javascript" src="{{ asset('Asset/js/demo_dashboard.js') }}"></script>

       

        

<!--        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">-->

        <!-- END TEMPLATE -->

    <!-- END SCRIPTS -->   
  

    </body>

</html>