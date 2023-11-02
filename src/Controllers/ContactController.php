<?php

namespace MyApp\Controllers;

use MyApp\Models\ContactModel;

class ContactController
{
    private $model;

    public function __construct()
    {
        $this->model = new ContactModel();
    }

    public function listContacts()
    {
        $contacts = $this->model->getAllContacts();
        require __DIR__ . '/../Views/contact-list.php';
    }

    public function addContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $profile = 'null';
            $profile = $this->uploadProfile();
            $this->model->addContact($name, $email , $profile);
        }
        require __DIR__ . '/../Views/contact-form.php';
    }

    public function getContact()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $id = $_POST['info-edit'];
           $name = $_POST['info-name'];
           $email = $_POST['info-email'];
           $profile = $_POST['info-profile'];
           require __DIR__ . '/../Views/contact-edit.php';    
        }
    }

    public function editContact()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $deleteProfile = $_POST['img-link'];
            $contactId = $_POST['editid'];
            $this->deleteProfile($deleteProfile);
            $profile = $this->uploadProfile();
            $this->model->updateContact($contactId,$name,$email,$profile);
            header('Location:'.'/MyApp/contacts');
        }
        
    }

    public function deleteContact()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $contactId = $_POST['deleteid'];
            $deleteProfile = $_POST['del-profile'];
            $this->deleteProfile($deleteProfile);
            $this->model->deleteContact($contactId);
            header('Location:'.'/MyApp/contacts');
        }
        
    }
   
    private function uploadProfile()
    {
        $targetFile = __DIR__ . "/../../img/" . basename($_FILES["img"]["name"]);
        $fileType = $_FILES['img']['type'];
        
         
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            $errorUpload = "only JPG, JPEG, PNG files format is allowed.";   
            $uploadOk = "FALSE";
        }else{
            $uploadOk = "TRUE";
        }

        if(file_exists($_FILES['img']['name'])) {
            $errorUpload = "This file already exists"; 
            $uploadOk = "FALSE";
        }

        if($uploadOk == TRUE ){
            move_uploaded_file($_FILES['img']['tmp_name'],$targetFile);
            // Returning a link of the image for store in database and use in html <img>tag
            return "http://localhost/MyApp/img/".$_FILES['img']['name'];
        }elseif($uploadOk == FALSE){
            echo $errorUpload;
        }
    }

    public function deleteProfile($imgLink){
        $delete = __DIR__ . "/../.." . substr($imgLink,22);  
        unlink($delete);
    }
}

