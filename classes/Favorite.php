<?php

/**
 *
 */
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
     * Retrieves all favorites for a given user ID and limit results is argument is supplied
     *
     * @param int $id The user ID.
     * @return array|null The fetched favorites as an associative array, or null if no favorites found.
     */
    public function getAllFavorites($id, $limit=null)
    {
        $id = (int)$id;
        $limit = (int)$limit ? $limit : null;

        $results = array();

        if($limit) {
            $sql = "SELECT favorites.id, favorites.owner_id, favorites.bookmark_id, bookmarks.title, bookmarks.URL, bookmarks.owner_id, bookmarks.description FROM favorites
                    JOIN bookmarks
                    ON favorites.bookmark_id = bookmarks.id
                    WHERE favorites.owner_id = $id
                    ORDER BY favorites.bookmark_id
                    LIMIT $limit";
        } else {
            $sql = "SELECT favorites.id, favorites.owner_id, favorites.bookmark_id, bookmarks.title, bookmarks.URL, bookmarks.owner_id, bookmarks.description FROM favorites
                    JOIN bookmarks
                    ON favorites.bookmark_id = bookmarks.id
                    WHERE favorites.owner_id = $id
                    ORDER BY favorites.bookmark_id";
        }

        $row = $this->db->query($sql);

        while($result = $row->fetch_assoc()){
            $results[] = $result;
        }

        return $results;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getCountFavorites($id)
    {
        $id = (int)$id;
        $sql = "SELECT COUNT(id) AS count FROM favorites WHERE owner_id = $id";

        $row = $this->db->query($sql);
        $result = $row->fetch_assoc();

        return $result['count'];
    }


    /**
     * @param $id
     * @return bool
     */
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