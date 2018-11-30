<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coffee') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/m.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/iconfont.css') }}">
</head>
<body data-spy="scroll" data-target="#nav-prodOrder-list">
<div id="app" class="wrap">
    <router-view></router-view>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/m.js') }}"></script>
{{--<script src="http://hammerjs.github.io/dist/hammer.min.js"></script>--}}
<script>



    // var arr = ["size","temp","sugar","milk"]
    // for($i=0;$i<arr.length;$i++){
    //     do_click(arr[$i]);
    // }
    // function do_click($obj){
    //     $("."+$obj).click(function(){
    //         if($(this).hasClass("active")){
    //             $(this).removeClass("active")
    //         }else{
    //             $("."+$obj).removeClass("active");
    //             $(this).addClass("active")
    //         }
    //     })
    // }
</script>


</body>
</html>
