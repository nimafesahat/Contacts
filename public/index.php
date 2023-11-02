<?php

require __DIR__ . '/../vendor/autoload.php';

use MyApp\Controllers\ContactController;

// Handle routing and dispatch to appropriate controller methods

$controller = new ContactController();

switch($_SERVER['REQUEST_URI']){
    case '/MyApp/editform':
        $controller->getContact();
        break;
    case '/MyApp/delete':
        $controller->deleteContact();
        break;
    case '/MyApp/create':
        $controller->addContact();
        break;
    case '/MyApp/edit':
        $controller->editContact();
        break;    
    case '/MyApp/contacts':
        $controller->listContacts();
        break;
    default :
    header('Location:'.'/MyApp/contacts');            
}


