<?php 
require __DIR__ . '/vendor/autoload.php';

use MyApp\Router\Routers;

$x = new Routers;
$x->callurls();

for($x=0;$x<=1000;$x++){
    echo $x . '<br>';
}