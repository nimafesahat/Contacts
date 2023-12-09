<?php

namespace App\Controller;

use App\Controller\ContactProfile;
use App\Model\ContactModel;


class ContactController
{
    private $model;
    private $profile;

    public function __construct()
    {
        $this->model = new ContactModel();
        $this->profile = new ContactProfile();
    }

    private function validate()
    {
        htmlspecialchars($_POST['name']);
        htmlspecialchars($_POST['email']);

        if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
            echo "Only letters and white space";
        }elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email";
        }elseif($this->profile->checkFile() == 2) {
            echo "only JPG, JPEG, PNG files format is allowed.";
        }else {
            return 1;
        }

    }

    public function listContacts()
    {
        $contacts = $this->model->getAllContacts();
        require __DIR__ . '/../View/Home.php';
    }

    public function addContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            if($this->validate()) {
                $imgName = $this->profile->insert();
                $this->model->addContact($name, $email, $imgName);
                echo "Contact added - <a href='/Contacts/home'>back to home</a>";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . '/../View/AddForm.php';
        }
    }

    public function showContact($id)
    {
        $contact = $this->model->getContactById($id[0]);
        require __DIR__ . '/../View/EditForm.php';
    }

    public function editContact()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactId = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $deleteImg = $_POST['img-name'];
            if($this->validate()) {
                $imgName = $this->profile->insert();
                $this->profile->destroy($deleteImg);
                $this->model->updateContact($contactId, $name, $email, $imgName);
                echo "Contact edited - <a href='/Contacts/home'>back to home</a>";
            }
            
        }
    }

    public function deleteContact($id)
    {
        $imgName = $this->model->getContactById($id[0]);
        $this->model->deleteContact($id[0]);
        $this->profile->destroy($imgName['profile']);
        echo "Contact deleted - <a href='/Contacts/home'>back to home</a>";
    }
}
