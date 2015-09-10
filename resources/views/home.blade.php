@extends('wrap')
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-8-24 flog_hero_text">
        <div class="l-box">
            <h1>Get a load of this flog:</h1>
            <h1 class="flog_name">Tom D'ath</h1>
            <p class="flog_stats">Flog #001</p>
            <p>This flog built this website, and last week he let it go offline for <b>two, whole, fucking days</b>, Absolute flog.</p>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-16-24 flog_hero">
        <img class="pure-img" src="{{asset('img/flog2.jpg')}}"/>
    </div>
</div>
@endsection
