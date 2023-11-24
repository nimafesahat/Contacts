<?php
require __DIR__ . '/vendor/autoload.php';

use App\Router\Routers;

$x = new Routers;

$x->addRoute('GET', '/home', 'App\\Controller\\ContactController@listContacts'); // show all user in home page
$x->addRoute('GET', '/', 'App\\Controller\\ContactController@listContacts'); // show all user in home page
$x->addRoute('POST', '/user/add', 'App\\Controller\\ContactController@addContact'); // add user 
$x->addRoute('GET', '/user/add', 'App\\Controller\\ContactController@addContact'); // open add form 
$x->addRoute('GET', '/user/show/{id}', 'App\\Controller\\ContactController@showContact'); // show a user information in edit form
$x->addRoute('POST', '/user/edit', 'App\\Controller\\ContactController@editContact'); // edit a contact
$x->addRoute('GET', '/user/delete/{id}', 'App\\Controller\\ContactController@deleteContact'); // delete a contact    

$x->matchRout('/Contacts');
$x->callController();

