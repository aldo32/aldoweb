<?php
require_once 'Department.php';

class Job extends Department {
    private $nameJob;
    private $salary;
    private $vacations;

    /**
     * @return mixed
     */
    public function getNameJob()
    {
        return $this->nameJob;
    }

    /**
     * @param mixed $name
     */
    public function setNameJob($name)
    {
        $this->nameJob = $name;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getVacations()
    {
        return $this->vacations;
    }

    /**
     * @param mixed $vacations
     */
    public function setVacations($vacations)
    {
        $this->vacations = $vacations;
    }


}