@extends('templates.master')

@section('content')
    <!--Introduction Section-->
    @include('intro')
    <section class="gameSection"> 
        <img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo">
        <h2 class="name">ROSHAMBO</h2>
        <a class="link" href="/">Return to the Home page</a>
        <a class="link" href="/roundHistory">Round History</a> 
        <h2>Round details</h2>
        @foreach ($roundDetails as $roundDetail) 
            @if($roundDetail['dateSaved'] == $param)
                <p><span class="category">Played at: </span> {{$roundDetail['dateSaved']}}</p>
                <p><span class="category">Player Choice: </span> <span class='player-choice'>{{$roundDetail['playerChoice']}}</span></p>
                <p><span class="category">Computer Choice: </span> <span class='computer-choice'>{{$roundDetail['computerChoice']}}</span></p>
                <p><span class="category">Winner: </span><span class='winner'>{{$roundDetail['winner']}}</span></p>
            @endif
        @endforeach
    </section>   
@endsection