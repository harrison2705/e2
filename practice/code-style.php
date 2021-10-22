<?php

function getCelsius($temperature = null, $includeUnit = true) 
{
    # https://en.wikipedia.org/wiki/Fahrenheit#Definition_and_conversion

    $results = ($temperature - 32) / 1.8;

    if ($includeUnit) {
        $results .= ' C';
        return $tempCelsuis;
    } else {
        return $results;
    }
}

