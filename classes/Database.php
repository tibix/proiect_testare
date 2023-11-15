<?php

/**
 * Database class
 * It is used to interact with a MySQL database. Here's a brief overview of its properties and methods:
 */

class Database
{    
    
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "bookmarks";
    private $charset = "utf8";
    private $conn;
    
    public function __construct()
    {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset='.$this->charset;
        try{
            $this->conn = new PDO($dsn, $this->user, $this->pass);

            if($this->conn){
                echo "Connected";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
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
        return $this->conn->quote($str);
    }
    
   
    /**
     * Closes the database connection.
     *
     * @return void
     */
    public function close()
    {
        $this->conn = null;
    }
}
