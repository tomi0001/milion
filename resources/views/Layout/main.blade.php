<html>
    <head>
        <title>Twój milion @yield('title')</title>
      
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
        
        <script src="{{ asset('./js/app.js')}}"></script>

       <link href="{{ asset('./default/css/app.css') }}" rel="stylesheet">
    </head>
    
    
    <div class="main">
          @yield('content')
    </div>