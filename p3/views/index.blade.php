@extends('templates.master')

@section('content')
    <!--Introduction Section-->
    @include('intro')
    <!-- Game Section-->
    <section test='instruction' class="gameSection"> 
        <a href="/" class="link-logo"><img test='logo' id='logo' src='/images/game_logo.png' alt="game-logo" class="logo"></a>
        <h2 class="name">ROSHAMBO</h2>
        {{--Form to input user's name--}}
        @if(!$havePlayerInfo)
        <form method = 'POST' action = '/user-name' class = 'form'>
            <div>
                <label for = 'namePlayer'>Can you please tell us your name?</label>
                <input test='player-name-input' type = 'text' id = 'namePlayer' name = 'namePlayer'>
                <button test ='player-submit-button' type = 'submit' name='submitName'>Let's go!</button>
            </div>
        </form>
        @endif
        <a class="link" href="/roundHistory">View Game History</a> 
        {{--Display errors--}}
        @if ($app -> errorsExist())
            <ul test="validation-output" class='error alert'>
                @foreach ($app->errors() as $error )
                    <li>Your name cannot be empty and can only contain letters. Please input your name again!</li>
                @endforeach
            </ul>
        @endif
        {{--Start the game after users input their name--}}
        @if($nameSaved)
        <h1 test= 'player-name-confirmation'>Hello {{$namePlayer}} </h1>
        <p> Rock, Paper or Scissors? What is your choice?</p> 
        @include('form')
        @endif
        {{--Display options for users to choose--}}
        @if($haveOptionInfo)
            @if($playerChoice != "playerErr")
                <h2 test='results-h2'>Results</h2> 
                <p>You chose <span test ="player-outcome" class="options">{{$playerChoice}}</span> || Computer chose <span test ="computer-outcome" class="options"> {{$computerChoice}}</span>.</p>
                {{--Decide the winner--}}
                @if($winner == "computer")
                    <p test ='computer-wins' class="results">Sorry, computer wins...</p>
                    <i class="fas fa-sad-tear"></i><hr>
                @elseif($winner == "player")
                    <p test ='player-wins' class="results"> Congrats! You wins!</p>
                    <i class="fas fa-laugh-wink" ></i><hr>
                @elseif($winner == "tie")
                    <p test ='ties' class="results">Ties!</p>
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