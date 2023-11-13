<?php

/**
 * Database class
 * It is used to interact with a MySQL database. Here's a brief overview of its properties and methods:
 */

class Database
{    
    /**
     * conn
     *
     * @var mixed
     */
    private $conn;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->conn = new mysqli("localhost", "editorial", "editorial", "editorial");

        if ($this->conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $this->conn->connect_error);
        }

        $this->conn->set_charset('utf8');
    }
    
    /**
     * query
     *
     * @param  mixed $sql
     * @return mixed
     */
    public function query($sql)
    {
        return $this->conn->query($sql);
    }
    
    /**
     * escapeString
     *
     * @param  mixed $str
     * @return string
     */
    public function escapeString($str)
    {
        return $this->conn->real_escape_string($str);
    }
    
    /**
     * close
     *
     * @return void
     */
    public function close()
    {
        $this->conn->close();
    }
}
