<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Flog of the Week</title>
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
          <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-min.css&pure/0.6.0/buttons-min.css">
        <!--<![endif]-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/buttons.css')}}"/>
        <script src="https://use.typekit.net/hci6zrn.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        @yield('additional_head')
    </head>
    <body>
        <div class="container">
            <div class="pure-u-1">
                <div class="l-box">
                    <p><span class="logo">FLOG OF THE WEEK</span> <span class="current_flog">Week of: <span>7th September</span></span></span></p>
                </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>
