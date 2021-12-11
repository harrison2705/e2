<?php

# Define the routes of your application

return [
    '/' => ['AppController', 'index'], #form to display the game
    '/user-name' => ['AppController', 'userName'],
    '/intro' => ['AppController', 'intro'], #show the intro for each page
    '/form' => ['AppController', 'form'], #show the repetitive form
    '/results' => ['AppController', 'results'], #determine results
    '/optionResults' => ['AppController', 'optionResults'],
    '/roundHistory' => ['AppController', 'roundHistory'], #show listing of all past rounds
    '/round' => ['AppController', 'show'], #show details for an individual round
    '/setupConnection' =>['AppController', 'show']
];