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

    public function createUser($u_name, $f_name, $l_name, $email, $password, $date_created, $role=NULL)
    {
        $u_name       = $this->db->escapeString($u_name);
        $f_name       = $this->db->escapeString($f_name);
        $l_name       = $this->db->escapeString($l_name);
        $email        = $this->db->escapeString($email);
        $password     = $this->db->escapeString($password);
        $role         = $this->db->escapeString($role);
        $date_created = $this->db->escapeString($date_created);

        if($role == NULL){
            $role = 1;
        }

        $sql = "INSERT INTO 
                users  (u_name, f_name, l_name, email, password, date_created, role_id) 
                VALUES ('$u_name', '$f_name', '$l_name', '$email', md5('$password'), '$date_created', '$role')";

        return $this->db->query($sql);
    }

    public function getUserByLogin($login)
    {
        $login = $this->db->escapeString($login);
        $sql = "SELECT u.*, r.role_type FROM users u JOIN roles r ON u.role_id = r.id WHERE u_name = '$login' OR email = '$login'";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getAuthorById($id)
    {
        $id = (int)$id;
        $sql = "SELECT f_name, l_name FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result;
    }

    public function getUsers($role = NULL)
    {
        if ($role) {
            $role = $this->db->escapeString($role);
            $sql = "SELECT u*, r.role_type FROM users u JOIN roles r on u.role_id= r.id WHERE role_id = '$role'";
        } else {
            $sql = "SELECT u.*, r.role_type FROM users u JOIN roles r ON u.role_id = r.id";
        }

        $result = $this->db->query($sql);
        $users = array();

        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function updateUser($id, $u_name, $f_name, $l_name, $email, $role)
    {
        $id = (int)$id;
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString($l_name);
        $email = $this->db->escapeString($email);
        $role = $this->db->escapeString($role);

        $sql = "UPDATE users SET u_name='$u_name', email='$email', role_id='$role' WHERE id = $id";
        return $this->db->query($sql);
    }

    public function updateUserPassword($id, $password)
    {
        $id = (int)$id;
        $password = $this->db->escapeString($password);

        $sql = "UPDATE users SET password=md5('$password') WHERE id = $id";
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
