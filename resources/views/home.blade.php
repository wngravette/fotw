@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-8-24 flog_hero_text">
        <div class="l-box">
            <h1 class="subheading">Get a load of this flog:</h1>
            <h1 class="big">{!! $current_flog->name !!}</h1>
            <p class="flog_stats">Flog #{{$current_flog->id}}</p>
            <p>{{$current_flog->reason}}</p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-16-24 flog_hero">
        <img class="pure-img" src="https://s3-ap-southeast-2.amazonaws.com/fotw/{{$current_flog->flog_hash}}.jpg"/>
    </div>
</div>
<div class="pure-g">
    <div class="pure-u-10-24 prev_flogs">
        <div class="l-box">
            <h1 class="subheading">Previous F'sOTW</h1>
        </div>
    </div>
@endsection
