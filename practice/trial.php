<?php
#Set up cards - use 10 so you have an even number of cards to distribute
$cards = [1,2,3,4,5,6,7,8,9,10]; 
shuffle($cards);

#Initialize empty arrays for playerCards and computerCards
$playerCards = [];
$computerCards = [];


#
# Your code to distribute the cards in an alternating fashion to playerCards and computerCards would go here
foreach ($cards as $key => $value) {
    if($key % 2 == 0) {
        array_push($playerCards, $value);
    } else { 
        array_push($computerCards, $value);
    }
}

//Verify results
var_dump($playerCards); #Should yield 5 random cards
var_dump($computerCards); #Should yield 5 difference random cards

if (str_contains('abc', '')) {
    echo "Checking the existence of the empty string will always return true";
}
?>