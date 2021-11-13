@extends('layouts.app3')



@section('content')

<?php $bussid = session()->get('bussid'); ?>

<div class="content-wrapper" style="margin-bottom: 50px; min-height: 700px">





   



		</div>

		</div>

</div>

<script type="text/javascript" src="{{ asset('Asset/js/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('Asset/js/toastr.min.js') }}"></script>

<link rel="stylesheet" type="text/css" id="theme" href="{{ asset('Asset/js/toastr.min.css') }}"/>

<link href="{{ asset('Asset/sweetAlert/sweetalert.css')}}" rel="stylesheet">

<script src="{{ asset('Asset/sweetAlert/sweetalert.js')}}"></script>





<script>

$(document).ready(function() {

   

});







    @if(Session::has('message'))

        var type="{{Session::get('alert-type','info')}}"



        switch(type){

            case 'info':

                 toastr.info("{{ Session::get('message') }}");

                 break;

            case 'success':

                toastr.success("{{ Session::get('message') }}");

                break;

            case 'warning':

                toastr.warning("{{ Session::get('message') }}");

                break;

            case 'error':

                toastr.error("{{ Session::get('message') }}");

                break;

        }

    @endif

</script>



<!------ Include the above in your HEAD tag ---------->





<script>



$(document).ready(function () {



       //cmdClear

        $('#cmdClear').click(function () {

            location.reload();



        });







});





    

   

    

</script>

@endsection

