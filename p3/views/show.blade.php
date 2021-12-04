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
            <p>Time: {{$roundDetail['dateSaved']}}</p>
            <p>Player Choice: {{$roundDetail['playerChoice']}}</p>
            <p>Computer Choice: {{$roundDetail['computerChoice']}}</p>
            <p>Winner{{$roundDetail['winner']}}</p>
        @endforeach
    </section>   
    
@endsection