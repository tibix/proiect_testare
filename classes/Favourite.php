<?php

class Favourite
{

    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Adds a bookmark to the user's favourites.
     *
     * @param int $user_id The ID of the user.
     * @param int $bookmark_id The ID of the bookmark.
     * @return bool True if the bookmark was added successfully, false otherwise.
     */
    public function addToFavourites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "INSERT INTO 
                favourites (user_id, bookmark_id) 
                VALUES ($user_id, $bookmark_id)";

        return $this->db->query($sql);
    }

    /**
     * Removes a bookmark from the user's favorites.
     *
     * @param int $user_id The ID of the user.
     * @param int $bookmark_id The ID of the bookmark.
     * @return bool Returns true if the bookmark was successfully removed, false otherwise.
     */
    public function removeFromFavourites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "DELETE FROM favourites WHERE user_id = $user_id AND bookmark_id = $bookmark_id";

        return $this->db->query($sql);
    }

    /**
     * Retrieves all favourites for a given user ID.
     *
     * @param int $id The user ID.
     * @return array|null The fetched favourites as an associative array, or null if no favourites found.
     */
    public function getAllFavourites($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM favourites WHERE user_id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }
}