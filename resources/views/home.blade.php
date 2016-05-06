@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-8-24 flog_hero_text">
        <div class="l-box">
            <h1 class="subheading">Get a load of this flog:</h1>
            <h1 class="big">{!! $current_flog->name !!}</h1>
            <p class="flog_stats">Flog #{{$current_flog->formatted_id}}</p>
            <p>{!!$current_flog->reason!!}</p>
            <p class="flog_stats"><span id="upvotes_count">{{$upvotes}}</span> lol trus &middot; <span id="downvotes_count">{{$downvotes}}</span> no fams</p>
            <div class="pure-u-1 hero_vote_wrap">
                <a id="hero_vote_up" class="pure-button"><i class="em em-fire"></i> lol tru</a>
                <a id="hero_vote_down" class="pure-button"><i class="em em-fearful"></i> no fam</a>
            </div>
            <script>
            $(document).ready(function() {
                $('#hero_vote_up').click(function() {
                    $.post("/api/flogs/{{$current_flog->id}}/vote", {_token: '{{csrf_token()}}', vote_direction: '1'}, function(data) {
                        $('#upvotes_count').html(data.upvotes);
                    });
                });
                $('#hero_vote_down').click(function() {
                    $.post("/api/flogs/{{$current_flog->id}}/vote", {_token: '{{csrf_token()}}', vote_direction: '0'}, function(data) {
                        $('#downvotes_count').html(data.downvotes);
                    });
                });
            });
            </script>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-16-24 flog_hero">
        <img class="pure-img" src="https://s3-ap-southeast-2.amazonaws.com/fotw/{{$current_flog->flog_hash}}.jpg"/>
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
-->
@endsection
