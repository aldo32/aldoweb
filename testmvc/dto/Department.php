<?php
require_once 'Person.php';

class Department extends Person {
    private $nameDepartment;

    /**
     * @return mixed
     */
    public function getNameDepartment()
    {
        return $this->nameDepartment;
    }

    /**
     * @param mixed $name
     */
    public function setNameDepartment($name)
    {
        $this->nameDepartment = $name;
    }
}