<?php

/**
 * User class
 */

class User
{
    /**
     * @var object $db The database connection object.
     */
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Creates a new user with the given parameters.
     *
     * @param string $u_name The username of the user.
     * @param string $f_name The first name of the user.
     * @param string $l_name The last name of the user.
     * @param string $email The email address of the user.
     * @param string $password The password of the user.
     * @param string $date_created The date the user was created.
     *
     * @return bool Returns true if the user was created successfully, false otherwise.
     */

    public function createUser($u_name, $f_name, $l_name, $email, $password, $language, $date_created)
    {
        $u_name       = $this->db->escapeString($u_name);
        $f_name       = $this->db->escapeString($f_name);
        $l_name       = $this->db->escapeString($l_name);
        $email        = $this->db->escapeString($email);
        $password     = $this->db->escapeString($password);
        $language     = $this->db->escapeString($language);
        $date_created = $this->db->escapeString($date_created);

        $sql = "INSERT INTO 
                users  (user_name, first_name, last_name, email, password, language, date_created) 
                VALUES ('$u_name', '$f_name', '$l_name', '$email', md5('$password'), '$language', '$date_created')";

        return $this->db->query($sql);
    }

    /**
     * Retrieves a user from the database by their email or username.
     *
     * @param string $login The user's login credentials (username or email).
     * @return array|null Returns an associative array representing the user's data if found, or null if not found.
     */
    public function getUserByLogin($login)
    {
        $login = $this->db->escapeString($login);
        $sql = "SELECT * FROM users WHERE user_name = '$login' OR email = '$login'";
        $result = $this->db->query($sql);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a user from the database by their ID.
     *
     * @param int $id The ID of the user to retrieve.
     * @return array|null The user data as an associative array, or null if no user was found.
     */
    public function getUserById($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Updates a user in the database.
     *
     * @param int $id The ID of the user to update.
     * @param string $u_name The new username.
     * @param string $f_name The new first name.
     * @param string $l_name The new last name.
     * @param string $email The new email address.
     * 
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateUser($id, $u_name, $f_name, $l_name, $email)
    {
        $id = (int)$id;
        $u_name = $this->db->escapeString($u_name);
        $f_name = $this->db->escapeString($f_name);
        $l_name = $this->db->escapeString($l_name);
        $email = $this->db->escapeString($email);

        $sql = "UPDATE users SET u_name='$u_name', f_name='$f_name', l_name='$l_name', email='$email' WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Updates the password of a user with the given ID.
     *
     * @param int $id The ID of the user to update.
     * @param string $password The new password for the user.
     * @return bool True on success, false on failure.
     */
    public function updateUserPassword($id, $password)
    {
        $id = (int)$id;
        $password = $this->db->escapeString($password);

        $sql = "UPDATE users SET password=md5('$password') WHERE id = $id";
        return $this->db->query($sql);
    }

    /**
     * Deletes a user from the database.
     *
     * @param int $id The id of the user to be deleted.
     * @return bool True on success, false on failure.
     */
    public function deleteUser($id)
    {
        $id = (int)$id;
        $sql = "DELETE FROM users WHERE id = $id";

        return $this->db->query($sql);
    }

    /**
     * Set a token for the user with the given ID.
     *
     * @param int $id The ID of the user. Token will be user to reset user's password when they forget it.
     * @return bool True on success, false on failure.
     */
    public function setToken($id)
    {
        $id = (int)$id;
        $token = generateToken();

        $sql = "UPDATE users SET token='$token' WHERE id = $id";

        return $this->db->query($sql);
    }

    /**
     * Retrieves the token of a user by their ID.
     *
     * @param int $id The ID of the user. Token will be used to validate user's authenticity.
     * @return string The token of the user.
     */
    public function getToken($id)
    {
        $id = (int)$id;
        $sql = "SELECT token FROM users WHERE id = $id";

        $result = $this->db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $token = $row['token'];
        
        return $token;
    }

    /**
     * Check if a user has a token by their ID.
     *
     * @param int $id The ID of the user to check. Method is used with getToken() to validate user's authenticity.
     * @return bool Returns true if the user has a token, false otherwise.
     */
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

    /**
     * Deletes the token for a user with the given ID.
     *
     * @param int $id The ID of the user. This method will remove a token after it has been used.
     * @return bool True on success, false on failure.
     */
    public function deleteToken($id)
    {
        $id = (int)$id;
        $sql = "UPDATE users SET token='' WHERE id = $id";

        return $this->db->query($sql);
    }
}
