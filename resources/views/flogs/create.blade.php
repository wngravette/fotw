@extends('wrap')
@section('additional_head')
<link rel="stylesheet" href="{{asset('css/backend.css')}}"/>
@section('content')
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-16-24 flog_hero_text">
        <div class="l-box">
            <h1>Make a new flog:</h1>
            {!! Form::open(['url' => '/flogs', 'files' => true]) !!}
            <dl class="form">
                <dt>{!! Form::label('name', 'Flog\'s Name', array('class' => '')) !!}</dt>
                <dd>{!! Form::text('name') !!}</dd>
            </dl>
            <dl class="form">
                <dt>{!! Form::label('reason', 'Reason for Flogocity', array('class' => '')) !!}</dt>
                <dd>{!! Form::text('reason') !!}</dd>
            </dl>
            <dl class="form">
                <dt>{!! Form::label('picture', 'Picture of Flog', array('class' => '')) !!}</dt>
                <dd>{!! Form::file('picture') !!}</dd>
            </dl>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Make a Flog</button>
                <button type="button" class="btn">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
