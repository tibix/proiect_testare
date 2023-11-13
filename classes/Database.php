<?php

/**
 * Database class
 * It is used to interact with a MySQL database. Here's a brief overview of its properties and methods:
 */

class Database
{    
    
    /**
     * @var object $conn The database connection object.
     */
    private $conn;
    
    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "bookmarks");

        if ($this->conn->connect_error) {
            die("DB connection failed: " . $this->conn->connect_error);
        }

        $this->conn->set_charset('utf8');
    }
    
    /**
     * Executes a SQL query on the database.
     *
     * @param string $sql The SQL query to execute.
     * @return mixed The result of the query.
     */
    public function query($sql)
    {
        return $this->conn->query($sql);
    }
    
    /**
     * Escapes special characters in a string for use in an SQL statement. Basic SQL injection prevention.
     *
     * @param string $str The string to be escaped.
     * @return string The escaped string.
     */
    public function escapeString($str)
    {
        return $this->conn->real_escape_string($str);
    }
    
   
    /**
     * Closes the database connection.
     *
     * @return void
     */
    public function close()
    {
        $this->conn->close();
    }
}
