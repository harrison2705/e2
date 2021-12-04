<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/user-name' => ['AppController', 'userName'],
    '/intro' => ['AppController', 'intro'],
    '/form' => ['AppController', 'form'],
    '/results' => ['AppController', 'results'],
    '/optionResults' => ['AppController', 'optionResults'],
    '/roundHistory' => ['AppController', 'roundHistory'],
    '/round' => ['AppController', 'show']
];