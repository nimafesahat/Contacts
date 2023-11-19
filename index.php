<?php
require __DIR__ . '/vendor/autoload.php';

use MyApp\Router\Routers;

$x = new Routers;

$x->addRoute('POST','/user/add','MyApp\\Controller\\ContactController@addContact'); // add user 
$x->addRoute('GET','/user/add','MyApp\\Controller\\ContactController@addContact'); // open add form 
$x->addRoute('GET','/home','MyApp\\Controller\\ContactController@listContacts'); // show all user in home page
$x->addRoute('GET','/user/show/{id}','MyApp\\Controller\\ContactController@showContact'); // show a user information in edit form
$x->addRoute('POST','/user/edit','MyApp\\Controller\\ContactController@editContact'); // edit a contact
$x->addRoute('GET','/user/delete/{id}','MyApp\\Controller\\ContactController@deleteContact'); // delete a contact    

$x->matchRout();
$x->callController();



