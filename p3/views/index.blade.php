@extends('templates.master')

@section('content')
    <!--Introduction Section-->
    @include('intro')
    <!-- Game Section-->
    <section class="gameSection"> 
        <img id='logo' src='/images/game_logo.png' alt="game-logo" class="logo">
        <h2 class="name">ROSHAMBO</h2>
        {{--Form to input user's name--}}
        @if(!$havePlayerInfo)
        <form method = 'POST' action = '/user-name' class = 'form'>
            <div>
                <label for = 'namePlayer'>Can you please tell us your name?</label>
                <input type = 'text' id = 'namePlayer' name = 'namePlayer'>
                <button type = 'submit' name='submitName'>Let's go!</button>
            </div>
        </form>
        @endif
        <a class="link" href="/roundHistory">Round History</a> 
        {{--Display errors--}}
        @if ($app -> errorsExist())
            <ul class='error alert'>
                @foreach ($app->errors() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {{--Start the game after users input their name--}}
        @if($nameSaved)
        <h1>Hello {{$namePlayer}} </h1>
        <p> Rock, Paper or Scissors? What is your choice?</p> 
        @include('form')
        @endif
        {{--Display options for users to choose--}}
        @if($haveOptionInfo)
            @if($playerChoice != "playerErr")
                <h2>Results</h2> 
                <p>You chose <span class="options">{{$playerChoice}}</span> || Computer chose <span class="options"> {{$computerChoice}}</span>.</p>
                {{--Decide the winner--}}
                @if($winner == "computer")
                    <p class="results">Sorry, computer wins...</p>
                    <i class="fas fa-sad-tear"></i><hr>
                @elseif($winner == "player")
                    <p class="results"> Congrats! You wins!</p>
                    <i class="fas fa-laugh-wink" ></i><hr>
                @elseif($winner == "tie")
                    <p class="results">Ties!</p>
                    <i class="fas fa-meh"></i><hr>
                @endif
                {{--Ask the user if they want to play again--}}
                <h2>Play again?</h2>
                <p>Please click to choose your option!</p>
                @include('form')
                <input class="restart begin" type="button" onclick = "location.href='/';" value = "Restart?">
            @else
                <p>You must select one option below!</p>
                @include('form')
                <input class="restart back" type="button" onclick = "location.href='/';" value = "Go back?">
            @endif
        @endif
    </section>   
@endsection