@extends('templates.master')

@section('content')
    <!--Introduction Section-->
    @include('intro')
    <section class="gameSection"> 
        <img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo">
        <h2 class="name">ROSHAMBO</h2>
        <a class="link" href="/">Return to the Home page</a>
        <h2>Round history</h2>
        @foreach ($rounds as $round) 
            <p>Round {{$round['id']}} - <a class="round-link" href='/round?dateSaved={{$round['dateSaved']}}'>{{$round['dateSaved']}}</a></p>
        @endforeach
    </section>   
@endsection
