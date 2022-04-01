@include('cube.includes.header')
 
</head>
     <!-- Left Panel -->
    <body>
@include('cube.includes.side_bar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
@include('cube.includes.top_nav')
        <!-- /#header -->
@section('mini_top_nav')
@show
@section('content')
@show

@include('cube.includes.footer')

