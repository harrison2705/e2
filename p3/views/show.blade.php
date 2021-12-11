@extends('templates.master')

@section('content')
    <!--Introduction Section-->
    @include('intro')
    <section class="gameSection"> 
        <img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo">
        <h2 class="name">ROSHAMBO</h2>
        <a class="link" href="/">Return to the Home page</a>
        <a class="link" href="/roundHistory">Game History</a> 
        <h2>Round details</h2>
        @foreach ($roundDetails as $roundDetail) 
            @if($roundDetail['dateSaved'] == $param)
                <p><i class="fas fa-dice"></i> <span class="category">Round: #</span>{{$roundDetail['id']}}</p>
                <p><i class="fas fa-clock"></i> <span class="category">Played at: </span>{{$roundDetail['dateSaved']}}</p>
                <p><i class="fas fa-user"></i> <span class="category">Player Choice: </span> <span class='player-choice'>{{$roundDetail['playerChoice']}}</span></p>
                <p><i class="fas fa-tv"></i> <span class="category">Computer Choice: </span> <span class='computer-choice'>{{$roundDetail['computerChoice']}}</span></p>
                <p><i class="fas fa-trophy"></i> <span class="category">Winner: </span><span class='winner'>{{$roundDetail['winner']}}</span></p>
            @endif
        @endforeach
    </section>   
@endsection