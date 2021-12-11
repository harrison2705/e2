@extends('templates.master')
@section('content')
    <!--Introduction Section-->
    @include('intro')
    <section class="gameSection"> 
         <a href="/" class="link-logo"><img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo"></a>
        <h2 class="name">ROSHAMBO</h2>
        <a test='return' class="link" href="/">Return to the Home page</a>
        <h2 test="round-history-h2">Game history</h2>
        @foreach ($roundCounts as $roundCount)
            <p>The game has been played <b><span class='count'> {{$roundCount['COUNT(id)']}}</span></b> times</p>
        @endforeach
        
        @foreach ($playerWinCounts as $playerWinCount)
            <p>Player won <b><span class='count'>{{$playerWinCount['COUNT(winner)']}}</span></b> times.</p>
        @endforeach

        @foreach ($computerWinCounts as $computerWinCount)
            <p>Computer won <b><span class='count'>{{$computerWinCount['COUNT(winner)']}}</span></b> times.</p>
        @endforeach
    <hr>
        @foreach ($rounds as $round) 
            <p>Round {{$round['id']}} - <a test = "round-count" class="round-link" href='/round?dateSaved={{$round['dateSaved']}}'>{{$round['dateSaved']}}</a></p>
        @endforeach
    </section>   
@endsection
