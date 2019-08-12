@extends('layout')
@section('title', 'tweet')

@section('content')
    <script async="" src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    @foreach($tweets as $tweet)
        @component('components.embed-tweet', ['tweet' => $tweet])
        @endcomponent

    @endforeach
@endsection
