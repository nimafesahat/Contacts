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
            $imgName = $this->profile->insert();
            $this->model->addContact($name, $email, $imgName);
            echo "Contact added - <a href='http://localhost/home'>back to home</a>";
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
            $imgName = $this->profile->insert();
            $this->profile->destroy($deleteImg);
            $this->model->updateContact($contactId, $name, $email, $imgName);
            echo "Contact edited - <a href='http://localhost/home'>back to home</a>";
        }
    }

    public function deleteContact($id)
    {
        $imgName = $this->model->getContactById($id[0]);
        $this->model->deleteContact($id[0]);
        $this->profile->destroy($imgName['profile']);
        echo "Contact deleted - <a href='http://localhost/home'>back to home</a>";
    }
}
