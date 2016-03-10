<?php

class Services {
    public function openDb() {
        if (!mysql_connect("localhost", "root", "")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("workers")) {
            throw new Exception("No database found on database server.");
        }
    }

    public function closeDb() {
        mysql_close();
    }
}