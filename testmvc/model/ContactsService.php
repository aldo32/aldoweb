<?php

require_once 'model/ContactsGateway.php';
require_once 'model/ValidationException.php';


class ContactsService {
    
    private $contactsGateway    = NULL;
    
    private function openDb() {
        if (!mysql_connect("localhost", "root", "")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("contacts")) {
            throw new Exception("No mvc-crud database found on database server.");
        }
    }
    
    private function closeDb() {
        mysql_close();
    }
  
    public function __construct() {
        $this->contactsGateway = new ContactsGateway();
    }
    
    public function getAllContacts($order) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAll($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function getContact($id) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectById($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->contactsGateway->find($id);
    }
    
    private function validateContactParams( $name, $phone, $email, $address ) {
        $errors = array();
        if ( !isset($name) || empty($name) ) {
            $errors[] = 'Name is required';
            $errors[] = 'Aldo';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    public function createNewContact( $name, $phone, $email, $address ) {
        try {
            $this->openDb();
            $this->validateContactParams($name, $phone, $email, $address);
            $res = $this->contactsGateway->insert($name, $phone, $email, $address);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function deleteContact( $id ) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->delete($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    
}

?>
