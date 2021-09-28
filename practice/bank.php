<?php
// This is a one line style comment
/*
This is a multi line comment
*/
# Define 4 different variables, which will
# each represent how much a given coin is worth
$penny_value = .01;
$nickel_value = .05;
$dime_value = .10;
$quarter_value = .25;
$half_dollar_value = 0.5;
$player = 2;

print $penny_value;
# Define 4 more variables, which will each
# represent how many of each coin is in the bank
$pennies = 300;
$nickels = 5;
$dimes = 0;
$quarters = 125;
$half_dollar = 33;

# Add up how much money is in the piggy bank
$total = ($half_dollar * $half_dollar_value) + ($pennies * $penny_value) + ($nickels * $nickel_value) + ($dimes * $dime_value) + ($quarters * $quarter_value);

require 'bank-view.php';

?>