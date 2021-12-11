@extends('templates.master')
@section('content')
    <!--Introduction Section-->
    @include('intro')
    <section class="gameSection"> 
        <img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo">
        <h2 class="name">ROSHAMBO</h2>
        <a test='return' class="link" href="/">Return to the Home page</a>
        <h2 test="round-history-h2">Game history</h2>
        @foreach ($rounds as $round) 
            <p>Round {{$round['id']}} - <a test = "round-count" class="round-link" href='/round?dateSaved={{$round['dateSaved']}}'>{{$round['dateSaved']}}</a></p>
        @endforeach
    </section>   
@endsection
