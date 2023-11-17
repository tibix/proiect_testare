<?php

/**
 * User class
 */

class User
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function createUser($u_name, $f_name, $l_name, $email, $password, $date_created)
    {
        $u_name       = $this->db->escapeString($u_name);
        $f_name       = $this->db->escapeString($f_name);
        $l_name       = $this->db->escapeString($l_name);
        $email        = $this->db->escapeString($email);
        $password     = md5($this->db->escapeString($password));
        $date_created = $this->db->escapeString($date_created);

        $sql = "INSERT INTO 
                users  (user_name, first_name, last_name, email, password, date_created) 
                VALUES ('$u_name', '$f_name', '$l_name', '$email', '$password', '$date_created')";

        return $this->db->query($sql);
    }

    public function getUserByLogin($login)
    {
        $login = $this->db->escapeString($login);
        $sql = "SELECT * FROM users WHERE user_name = '$login' OR email = '$login'";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function updateUser($id, $u_name, $f_name, $l_name, $email)
    {
        $id = (int)$id;
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString($l_name);
        $email = $this->db->escapeString($email);

        $sql = "UPDATE users SET user_name = '$u_name', first_name = '$f_name', last_name = '$l_name', email='$email'  WHERE id = $id";
        return $this->db->query($sql);
    }

    public function updateUserPassword($id, $password)
    {
        $id = (int)$id;
        $password = md5($this->db->escapeString($password));

        $sql = "UPDATE users SET password='$password' WHERE id = $id";
        return $this->db->query($sql);
    }

    public function deleteUser($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM users WHERE id = $id";

        return $this->db->query($sql);
    }

    public function setToken($id)
    {
        $id = (int)$id;
        $token = generateToken();

        $sql = "UPDATE users SET token='$token' WHERE id = $id";

        return $this->db->query($sql);
    }

    public function getToken($id)
    {
        $id = (int)$id;
        $sql = "SELECT token FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $token = $row['token'];
        
        return $token;
    }

    public function hasToken($id)
    {
        $id = (int)$id;
        $sql = "SELECT token FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $token = $row['token'];

        if ($token) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteToken($id)
    {
        $id = (int)$id;
        $sql = "UPDATE users SET token='' WHERE id = $id";

        return $this->db->query($sql);
    }
}
