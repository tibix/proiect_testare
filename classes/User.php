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

    /**
     * Creates a new user in the database.
     *
     * @param string $u_name The username of the user.
     * @param string $f_name The first name of the user.
     * @param string $l_name The last name of the user.
     * @param string $email The email address of the user.
     * @param string $password The password of the user.
     * @param string $date_created The date when the user was created.
     * @return bool Returns true if the user was successfully created, false otherwise.
     */
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

    /**
     * Checks if a user exists in the database.
     *
     * @param string $user The username to check.
     * @return bool Returns true if the user exists, false otherwise.
     */
    public function userExists($user)
    {
        $user = $this->db->escapeString($user);
        $sql = "SELECT user_name FROM users WHERE user_name = '$user'";
        $result = $this->db->query($sql);
        $rows = $result->num_rows;

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Checks if an email exists in the database.
     *
     * @param string $email The email to check.
     * @return bool Returns true if the email exists, false otherwise.
     */
    public function emailExists($email)
    {
        $email = $this->db->escapeString($email);
        $sql = "SELECT user_name FROM users WHERE email = '$email'";
        $result = $this->db->query($sql);
        $rows = $result->num_rows;

        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Retrieves a user from the database based on their login.
     *
     * @param string $login The login of the user.
     * @return array|null The user data as an associative array, or null if no user is found.
     */
    public function getUserByLogin($login)
    {
        $login = $this->db->escapeString($login);
        $sql = "SELECT * FROM users WHERE user_name = '$login' OR email = '$login'";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    /**
     * Retrieves a user from the database by their ID.
     *
     * @param int $id The ID of the user to retrieve.
     * @return array|null The user data as an associative array, or null if no user is found.
     */
    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    
    /**
     * Updates a user's information in the database.
     *
     * @param int $id The ID of the user to update.
     * @param string $u_name The new username.
     * @param string $f_name The new first name.
     * @param string $l_name The new last name.
     * @param string $email The new email address.
     * @param string $language The new language.
     * @return bool Returns true if the update was successful, false otherwise.
     */
    public function updateUser($id, $u_name, $f_name, $l_name, $email, $language)
    {
        $id = (int)$id;
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString($l_name);
        $email = $this->db->escapeString($email);
        $language = $this->db->escapeString($language);

        $sql = "UPDATE users SET user_name = '$u_name', first_name = '$f_name', last_name = '$l_name', email='$email'  language = '$language' WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Updates user's password.
     *
     * @param int $id The ID of the user.
     * @param string $password The new password for the user.
     * @return bool Returns true if the password is updated successfully, false otherwise.
     */
    public function updateUserPassword($id, $password)
    {
        $id = (int)$id;
        $password = md5($this->db->escapeString($password));

        $sql = "UPDATE users SET password='$password' WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Deletes a user from the database.
     *
     * @param int $id The ID of the user to delete.
     * @return bool True if the user was successfully deleted, false otherwise.
     */
    public function deleteUser($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM users WHERE id = $id";

        return $this->db->query($sql);
    }

    /**
     * Sets the token for a password reset action.
     *
     * @param int $id The ID of the user.
     * @return bool Returns true if the token was successfully set, false otherwise.
     */
    public function setToken($id)
    {
        $id = (int)$id;
        $token = generateToken();

        $sql = "UPDATE users SET token='$token' WHERE id = $id";

        return $this->db->query($sql);
    }

    /**
     * Retrieves the token associated with a user ID.
     *
     * @param int $id The ID of the user.
     * @return string The token associated with the user.
     */
    public function getToken($id)
    {
        $id = (int)$id;
        $sql = "SELECT token FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $token = $row['token'];
        
        return $token;
    }

    /**
     * Compares provided token with the token in the DB.
     *
     * @param int $id The ID of the user.
     * @param string $token The token to compare.
     * @return bool Returns true if the user has the specified token, false otherwise.
     */
    public function hasToken($id, $token)
    {
        $id = (int)$id;
        $token = $this->db->escapeString($token);
        $sql = "SELECT token FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        $user_token = $row['token'];

        if ($user_token == $token) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Deletes the token for a user after a password reset action was completed.
     *
     * @param int $id The ID of the user.
     * @return bool Returns true if the token was successfully deleted, false otherwise.
     */
    public function deleteToken($id)
    {
        $id = (int)$id;
        $sql = "UPDATE users SET token='' WHERE id = $id";

        return $this->db->query($sql);
    }
}
