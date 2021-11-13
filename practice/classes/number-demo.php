<?php

require 'Number.php';
require 'EvenNumber.php';
require "Degub.php";

$example1 = new Number(30);
$example_2 = new EvenNumber(20);

var_dump($example1->isValid());
var_dump($example_2->isValid());

$example1 -> test();

$debug = new Debug();
$debug->dump('Hello World');
