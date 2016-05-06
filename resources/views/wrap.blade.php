<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$current_flog->name}} &#8212; Flog of the Week</title>
        <meta property="og:site_name" content="Flog of the Week"/>
        <meta property="og:title" content="{{$current_flog->name}}: What a flog."/>
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/g/pure@0.6.0(pure-min.css+base-min.css+grids-responsive-min.css+grids-min.css+buttons-min.css)">
        <!--<![endif]-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/buttons.css')}}"/>
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://use.typekit.net/hci6zrn.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        @yield('additional_head')
    </head>
    <body>
        <div class="container">
            <div class="pure-u-1">
                <div class="l-box">
                    <p><span class="logo">FLOG OF THE WEEK</span> <span class="current_flog"><i class="em em-fist"></i></span></span></p>
                </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>
