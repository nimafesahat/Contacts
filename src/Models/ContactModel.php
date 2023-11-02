<?php

namespace MyApp\Models;

class ContactModel
{
    private $db; // Database connection

    public function __construct()
    {
        // Modify these credentials to match your database
        $dbHost = 'localhost';
        $dbName = 'myapp';
        $dbUser = 'root';
        $dbPass = '';

        // Create a PDO database connection
        try {
            $this->db = new \PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getAllContacts()
    {
        $query = "SELECT * FROM contacts";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addContact($name, $email , $profile)
    {
        $query = "INSERT INTO contacts (name, email , profile ) VALUES (:name, :email , :profile)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile',$profile);
        $stmt->execute();
    }

    public function getContactById($contactId)
    {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $contactId);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateContact($contactId, $name, $email , $profile)
    {
        $query = "UPDATE contacts SET name = :name, email = :email, profile = :profile WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $contactId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile', $profile);
        $stmt->execute();
    }

    public function deleteContact($contactId)
    {
        $query = "DELETE FROM contacts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $contactId);
        $stmt->execute();
    }

}
