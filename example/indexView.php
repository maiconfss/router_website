<?php

require __DIR__."/vendor/autoload.php";

use App\Controllers\Aplicattion;

$route = new Aplicattion;
$route->route('/','index','','GET');
$route->route('home','home','','GET');
$route->route('contact','contact','','GET');
$route->route('about','about','','GET');
$route->route('services','services','','GET');
$route->error('oops','404','','GET');

$route->dispatch();