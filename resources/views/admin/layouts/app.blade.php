<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Couponlandmark</title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/admin/bootstrap.min.css') !!}

    <!-- sb admin -->
    {!! Html::style('css/admin/sb-admin-2.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('css/admin/metisMenu.min.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('css/admin/font-awesome.min.css') !!}

    <!-- Customm CSS -->
    {!! Html::style('css/admin/custom.css') !!}

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- jQuery -->
    {!! Html::script('js/jquery.min.js') !!}

</head>
<body id="app-layout">

    @include('admin.partials.header')

    @yield('content')

   <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('js/metisMenu.min.js') !!}

    <!-- Custom Theme JavaScript -->
    {!! Html::script('js/sb-admin-2.js') !!}

    <!-- -->
    {!! Html::script('js/app.js') !!}
</body>
</html>
