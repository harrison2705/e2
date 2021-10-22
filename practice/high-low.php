<?php 

// A function to compare two numbers

function checkNumber($guess, $mysteryNumber) {
    
    if ($guess == $mysteryNumber) {
        return 'correct';
    } elseif ($guess > $mysteryNumber) {
        return 'high';
    } else {
        return 'low';
    }
}
var_dump(checkNumber(3,6));