<?php
require 'Catalog.php';

$catalog = new Catalog('products.json'); //create a new and unique object from the class Catalog.
$catalog->getById(9);

//var_dump($catalog->getAll());
var_dump($catalog->searchByName("Greens"));