@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-8-24 flog_hero_text">
        <div class="l-box">
            <h1 class="subheading">Get a load of this flog:</h1>
            <h1 class="big">{!! $current_flog->name !!}</h1>
            <p class="flog_stats">Flog #{{$current_flog->formatted_id}}
                @if ($archived == true)
                &middot;
                <span class="comment blue">from the archive</span>
                @endif
                &middot; {{$current_flog->created_at->diffForHumans()}}
            </p>
            <p>{!!$current_flog->reason!!}</p>
            <div class="pure-u-1 hero_vote_wrap">
                <a id="hero_vote_up" class="pure-button"><i class="em em-fire"></i> lol tru</a>
                <a id="hero_vote_down" class="pure-button"><i class="em em-fearful"></i> no fam</a>
            </div>
            <p class="flog_stats"><span id="upvotes_count">{{$upvotes}}</span> lol trus &middot; <span id="downvotes_count">{{$downvotes}}</span> no fams &middot;
                @if ($flog_number < 0.5)
                <span class="comment blue">not a flog...?</span>
                @elseif ($flog_number >= 0.5 && $flog_number < 1.2)
                <span class="comment yellow">close one</span>
                @else
                <span class="comment red">clearly a flog</span>
                @endif
            </p>
            <script>
            $(document).ready(function() {
                $('#hero_vote_up').click(function() {
                    $.post("/api/flogs/{{$current_flog->id}}/vote", {_token: '{{csrf_token()}}', vote_direction: '1'}, function(data) {
                        $('#upvotes_count').html(data.upvotes);
                        var upvotes_total = data.upvotes;
                    });
                });
                $('#hero_vote_down').click(function() {
                    $.post("/api/flogs/{{$current_flog->id}}/vote", {_token: '{{csrf_token()}}', vote_direction: '0'}, function(data) {
                        $('#downvotes_count').html(data.downvotes);
                    });
                });
                var ctx = $("#myChart");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Flog", "Non-flog"],
                        datasets: [{
                            label: '# of Votes',
                            data: [88,5]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }],
                            height: 200,
                        }
                    }
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
<div class="pure-g footer">
    <div class="pure-u-1">
        <h1 class="subheading">PREVIOUS FLOGS <i class="em em-arrow_right"></i></h1>
        <h1 class="subheading">FlogAPI <i class="em em-arrow_right"></i></h1>
    </div>
</div>
-->
@endsection
