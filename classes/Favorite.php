<?php

class Favorite
{

    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    /**
     * Adds a bookmark to the user's favorites.
     *
     * @param int $user_id The ID of the user.
     * @param int $bookmark_id The ID of the bookmark.
     * @return bool True if the bookmark was added successfully, false otherwise.
     */
    public function addToFavorites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "INSERT INTO favorites (owner_id, bookmark_id) VALUES ($user_id, $bookmark_id)";

        return $this->db->query($sql);
    }

    /**
     * Removes a bookmark from the user's favorites.
     *
     * @param int $user_id The ID of the user.
     * @param int $bookmark_id The ID of the bookmark.
     * @return bool Returns true if the bookmark was successfully removed, false otherwise.
     */
    public function removeFromFavorites($user_id, $bookmark_id)
    {
        $user_id = (int)$user_id;
        $bookmark_id = (int)$bookmark_id;

        $sql = "DELETE FROM favorites WHERE owner_id = $user_id AND bookmark_id = $bookmark_id";

        return $this->db->query($sql);
    }

    /**
     * Retrieves all favorites for a given user ID.
     *
     * @param int $id The user ID.
     * @return array|null The fetched favorites as an associative array, or null if no favorites found.
     */
    public function getAllFavorites($id)
    {
        $id = (int)$id;
        $sql = "SELECT * FROM favorites WHERE user_id = $id";

        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function isFavorite($id)
    {
        $id = (int)$id;
        $sql = "SELECT bookmark_id FROM favorites WHERE bookmark_id = $id";
        $result = $this->db->query($sql);
        $row = $result->fetch_assoc();
        if($row)
        {
            return true;
        }

        return false;
    }
}