@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-8-24 flog_hero_text">
        <div class="l-box">
            <h1 class="big">The FOTW Archives:</h1>
        </div>
    </div>
    <div class="pure-g">
    @foreach ($flogs as $flog)
        <div class="pure-u-4-24">
            <img class="pure-img" src="https://s3-ap-southeast-2.amazonaws.com/fotw/{{$flog->flog_hash}}.jpg"/>
        </div>
        <div class="pure-u-20-24">
            <div class="l-box">
                <p class="flog_stats">Flog #{{$flog->formatted_id}}</p>
                <a href="/archive/{{$flog->id}}"><h1 class="subheading">{{$flog->name}}</h1></a>
            </div>
        </div>
    @endforeach
    </div>
</div>
<!--
<div class="pure-g">
    <div class="pure-u-10-24 prev_flogs">
        <div class="l-box">
            <h1 class="subheading">Previous F'sOTW</h1>
        </div>
    </div>
    <div class="pure-u-14-24" style="height:300px"></div>
</div>
<div class="pure-g">
    <div class="pure-u-10-24 flogspots">
        <div class="l-box">
            <h1 class="subheading">FlogSpots</h1>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        // Provide your access token
        L.mapbox.accessToken = 'pk.eyJ1Ijoid25ncmF2ZXR0ZSIsImEiOiJjaWVqaHdjYjUwMHY5czZtMzBheWJjZGNmIn0.FntqnTZO0rP3KzWBJZraIQ';
        // Create a map in the div #map
        L.mapbox.map('map', 'mapbox.streets', {
            zoomControl: false
        });
    });
    </script>
    <div class="pure-u-14-24" id="map" style="height:300px"></div>
</div>
<div class="pure-g footer">
    <div class="pure-u-1">
        <h1 class="subheading">PREVIOUS FLOGS <i class="em em-arrow_right"></i></h1>
        <h1 class="subheading">FlogAPI <i class="em em-arrow_right"></i></h1>
    </div>
</div>
-->
@endsection
